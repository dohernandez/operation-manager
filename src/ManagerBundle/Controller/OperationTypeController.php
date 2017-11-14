<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\OperationType;
use ManagerBundle\Repository\OperationTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Operationtype controller.
 *
 */
class OperationTypeController extends Controller
{
    /**
     * Lists all operationType entities.
     *
     */
    public function indexAction(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $operationTypes = $em->getRepository('ManagerBundle:OperationType')->findAll();

        return $this->render('ManagerBundle:operationtype:index.html.twig', [
            'operationTypes' => $operationTypes,
        ]);
    }

    /**
     * Creates a new operationType entity.
     *
     */
    public function newAction(Request $request): Response
    {
        $operationType = new Operationtype();

        $form = $this->createForm('ManagerBundle\Form\OperationTypeType', $operationType);
        $form->handleRequest($request);
        // $operationType has been updated with the form inputs at this point when the form is submitted.

        if ($form->isSubmitted() && $form->isValid()) {
            /* @var OperationTypeRepository $repository */
            $repository = $this->getDoctrine()->getManager()->getRepository('ManagerBundle:OperationType');

            $repository->save($operationType);

            return $this->redirectToRoute('operationtypes_show', ['id' => $operationType->getId()]);
        }

        return $this->render('ManagerBundle:crud:edit.form.twig', [
            'operationType' => $operationType,
            'form' => $form->createView(),
            'page_title' => 'Manager operation type',
            'page_subtitle' => 'create',
            'boxtype' => 'success',
            'submittype' => 'Create',
            'cancelurl' => $this->generateUrl('operationtypes_index'),
        ]);
    }

    /**
     * Finds and displays a operationType entity.
     *
     */
    public function showAction(OperationType $operationType): Response
    {
        $deleteForm = $this->createDeleteForm($operationType);

        return $this->render('ManagerBundle:operationtype:show.html.twig', [
            'operationType' => $operationType,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing operationType entity.
     *
     */
    public function editAction(Request $request, OperationType $operationType): Response
    {
        $deleteForm = $this->createDeleteForm($operationType);
        $editForm = $this->createForm('ManagerBundle\Form\OperationTypeType', $operationType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operationtypes_edit', ['id' => $operationType->getId()]);
        }

        ($editForm);
        return $this->render('ManagerBundle:crud:edit.form.twig', [
            'operationType' => $operationType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'page_title' => 'Manager operation type',
            'page_subtitle' => 'edit',
            'boxtype' => 'primary',
            'submittype' => 'Edit',
            'cancelurl' => $this->generateUrl('operationtypes_index'),
        ]);
    }

    /**
     * Deletes a operationType entity.
     *
     */
    public function deleteAction(Request $request, OperationType $operationType): Response
    {
        $form = $this->createDeleteForm($operationType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operationType);
            $em->flush();
        }

        return $this->redirectToRoute('operationtypes_index');
    }

    /**
     * Creates a form to delete a operationType entity.
     *
     * @param OperationType $operationType The operationType entity
     *
     * @return Form The form
     */
    private function createDeleteForm(OperationType $operationType): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operationtypes_delete', ['id' => $operationType->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
