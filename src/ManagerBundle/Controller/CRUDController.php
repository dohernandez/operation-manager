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
     *
     * @return Response
     */
    protected function index(array $fields): Response
    {
        $delete_forms = [];
        
        $entities = $this->getEntityRepository()->findAll();

        /* @var Entity $entity */
        foreach ($entities as $entity) {
            $delete_forms[$entity->getId()] = $this->createDeleteForm($entity)->createView();
        }

        return $this->render('ManagerBundle:crud:index.html.twig', [
            'entities' => $entities,
            'fields' => $fields,
            'entity_type' => implode(' ', preg_split('/(?=[A-Z])/', $this->getEntityClass())),
            'new_url' => $this->getEntityCRUDUrl('new'),
            'edit_route' => $this->getEntityCRUDRoute('edit'),
            'delete_route' => $this->getEntityCRUDRoute('delete'),
            'delete_forms' => $delete_forms,
        ]);
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
     *
     * @return Response
     */
    public function edit(Request $request, Entity $entity, $options): Response
    {
        $form = $this->createForm(sprintf('ManagerBundle\Form\%sType', $this->getEntityClass()), $entity);
        $form->handleRequest($request);
        // $entity has been updated with the form inputs at this point when the form is submitted.

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getEntityRepository()->save($entity);

            return $this->redirectToRoute(sprintf('%ss_index', strtolower($this->getEntityClass())));
        }

        return $this->render('ManagerBundle:crud:edit.form.twig', [
            'form' => $form->createView(),
            'page_title' => $options['page_title'],
            'page_subtitle' => $options['page_subtitle'] ?: 'info',
            'box_type' => $options['box_type'] ?: 'info',
            'submit_type' => $options['submit_type'] ?: 'Info',
            'cancel_url' => $this->getEntityCRUDUrl('cancel'),
        ]);
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
