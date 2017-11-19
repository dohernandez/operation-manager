<?php declare(strict_types=1);

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Entity;
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
     * @param array $fields {name: <value>, col_with: <value>}
     * @param array $options {}
     * @param string $view
     *
     * @return Response
     */
    protected function index(array $fields, array $entities = [], array $options = [], $view = 'ManagerBundle:crud:index.html.twig'): Response
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
            'entity_type' => implode(' ', preg_split('/(?=[A-Z])/', $this->getEntityClass())),
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
    public function edit(Request $request, Entity $entity, $options, $view = 'ManagerBundle:crud:edit.form.html.twig'): Response
    {
        $form = $this->createForm(sprintf('ManagerBundle\Form\%sType', $this->getEntityClass()), $entity);
        $form->handleRequest($request);
        // $entity has been updated with the form inputs at this point when the form is submitted.

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getEntityRepository()->save($entity);

            return $this->redirectToRoute(sprintf('%ss_index', strtolower($this->getEntityClass())));
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
        }

        return $this->redirectToRoute($this->getEntityCRUDRoute('delete'));
    }
}
