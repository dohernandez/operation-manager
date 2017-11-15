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
     * @param array $fields
     * @param array $options
     *
     * @return Response
     */
    protected function index(array $fields, array $options): Response
    {
        $entities = $this->getEntityRepository()->findAll();

        return $this->render('ManagerBundle:crud:index.html.twig', [
            'entities' => $entities,
            'fields' => $fields,
            'entity_type' => implode(' ', preg_split('/(?=[A-Z])/', $this->getEntityClass())),
            'new_url' => $options['new_url'],
            'delete_form' => $this->createDeleteForm()->createView(),
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

    /**
     * Creates a new operationType entity.
     *
     * @param Request $request
     * @param Entity $entity
     * @param $options
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
            'cancel_url' => $options['cancel_url'],
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

        return $this->redirectToRoute(sprintf('%ss_index', strtolower($this->getEntityClass())));
    }

    /**
     * Creates a form to delete a entity.
     *
     * @param Entity $entity
     *
     * @return Form The form
     */
    private function createDeleteForm(Entity $entity = null): Form
    {
        return $this->createFormBuilder()
            ->setAction(
                $this->generateUrl(
                    sprintf('%ss_delete', strtolower($this->getEntityClass())),
                    [
                        'id' => $entity ? $entity->getId() : 'id',
                    ]
                )
            )
            ->setMethod('DELETE')
            ->getForm();
    }
}