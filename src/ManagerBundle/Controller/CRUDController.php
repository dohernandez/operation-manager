<?php declare(strict_types=1);

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Entity;
use ManagerBundle\Event\CRUDEvent;
use ManagerBundle\Event\CRUDEvents;
use ManagerBundle\Repository\CRUDRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class CRUDController extends Controller
{
    /**
     * Lists all entities.
     *
     * @param array $fields
     *      {
     *          'render': <value>, (text| ManagerBundle:Macros:render.html.twig)
     *          'name': <value>, # required
     *          'label': <value>,
     *          'col_with': <value>,
     *          'truncate': '<value>',
     *          'date_format': '<value>',
     *          'currency': '<value>',
     *      }
     *
     *      1. When 'render' defined how to render the field. Default value text
     *      2. When 'truncate' exists, the value of the field will be slice until the truncate value
     *      3. When 'date_format' exists, the value of the field will be formatted as a date.
     *      4. When 'currency' exists, the value of the field will be formatted as a currency.
     *
     * @param array $entities
     * @param array $options
     * @param string $view
     *
     * @return Response
     */
    protected function index(array $fields, array $entities = [], array $options = [], $view = 'ManagerBundle:List:index.html.twig'): Response
    {
        $delete_forms = [];
        
        $entities = !empty($entities) ? $entities : $this->getEntityRepository()->findAll();

        /* @var Entity $entity */
        foreach ($entities as $entity) {
            $delete_forms[$entity->getId()] = $this->createDeleteForm($entity)->createView();
        }

        return $this->render($view, [
            'entities' => $entities,
            'fields' => $fields,
            'entity_type' => trim(implode(' ', preg_split('/(?=[A-Z])/', $this->getEntityClass()))),
            'new_url' => $this->getEntityCRUDUrl('new'),
            'edit_route' => $this->getEntityCRUDRoute('edit'),
            'delete_route' => $this->getEntityCRUDRoute('delete'),
            'delete_forms' => $delete_forms,
        ] + $options);
    }

    /**
     * @return CRUDRepository
     */
    protected function getEntityRepository(): CRUDRepository
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository(sprintf('ManagerBundle:%s', $this->getEntityClass()));
    }

    abstract protected function getEntityClass(): string;

    protected function getEntityCRUDUrl(string $action): string
    {
        return $this->generateUrl($this->getEntityCRUDRoute($action));
    }

    protected function getEntityCRUDRoute(string $action): string
    {
        return sprintf('%s_%s', strtolower($this->getEntityPrefixRoute()), $action);
    }

    abstract protected function getEntityPrefixRoute(): string;

    abstract protected function createDeleteForm($entity): Form;

    /**
     * Creates a new operationType entity.
     *
     * @param Request $request
     * @param Entity $entity
     * @param $options {page_title: info|<value>, page_subtitle: info|<value>, box_type: info|<value>, submit_type: info|<value>}
     * @param string $view
     *
     * @return Response
     */
    public function edit(Request $request, Entity $entity, $options, $view = 'ManagerBundle:Form:edit.form.html.twig'): Response
    {
        $form = $this->createForm(sprintf('ManagerBundle\Form\%sType', $this->getEntityClass()), $entity);
        $form->handleRequest($request);
        // $entity has been updated with the form inputs at this point when the form is submitted.

        if ($form->isSubmitted() && $form->isValid()) {
            $this->dispatch(
                sprintf('%s.%s', CRUDEvents::PRE_SAVED, $this->getEntityClass()),
                new CRUDEvent($entity, $form)
            );

            $this->getEntityRepository()->save($entity);

            $this->dispatch(
                sprintf('%s.%s', CRUDEvents::POST_SAVED, $this->getEntityClass()),
                new CRUDEvent($entity, $form)
            );

            return $this->redirectToRoute($this->getEntityCRUDRoute('index'));
        }


        $options['page_subtitle'] = $options['page_subtitle'] ?: 'info';
        $options['page_subtitle'] = $options['box_type'] ?: 'info';
        $options['page_subtitle'] = $options['submit_type'] ?: 'Info';

        return $this->render($view, [
            'form' => $form->createView(),
            'page_title' => $options['page_title'],
            'cancel_url' => $this->getEntityCRUDUrl('cancel'),
        ] + $options);
    }

    private function dispatch(string $eventName, CRUDEvent $event)
    {
        if ($this->container->has('event_dispatcher')) {
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch($eventName, $event);
        }
    }

    /**
     * Deletes a entity entity.
     *
     * @param Request $request
     * @param Entity $entity
     *
     * @return Response
     */
    public function delete(Request $request, Entity $entity): Response
    {
        $form = $this->createDeleteForm($entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getEntityRepository()->remove($entity);

            $this->dispatch(
                sprintf('%s.%s', CRUDEvents::POST_DELETED, $this->getEntityClass()),
                new CRUDEvent($entity)
            );
        }

        return $this->redirectToRoute($this->getEntityCRUDRoute('index'));
    }
}
