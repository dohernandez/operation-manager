<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\OperationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function indexAction()
    {
//        $em = $this->getDoctrine()->getManager();
//
//        $operationTypes = $em->getRepository('ManagerBundle:OperationType')->findAll();

        $operationTypes = [];

        return $this->render('operationtype/index.html.twig', array(
            'operationTypes' => $operationTypes,
        ));
    }

    /**
     * Creates a new operationType entity.
     *
     */
    public function newAction(Request $request)
    {
        $operationType = new Operationtype();
        $form = $this->createForm('ManagerBundle\Form\OperationTypeType', $operationType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operationType);
            $em->flush();

            return $this->redirectToRoute('operationtypes_show', array('id' => $operationType->getId()));
        }

        return $this->render('operationtype/new.html.twig', array(
            'operationType' => $operationType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operationType entity.
     *
     */
    public function showAction(OperationType $operationType)
    {
        $deleteForm = $this->createDeleteForm($operationType);

        return $this->render('operationtype/show.html.twig', array(
            'operationType' => $operationType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operationType entity.
     *
     */
    public function editAction(Request $request, OperationType $operationType)
    {
        $deleteForm = $this->createDeleteForm($operationType);
        $editForm = $this->createForm('ManagerBundle\Form\OperationTypeType', $operationType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operationtypes_edit', array('id' => $operationType->getId()));
        }

        return $this->render('operationtype/edit.html.twig', array(
            'operationType' => $operationType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operationType entity.
     *
     */
    public function deleteAction(Request $request, OperationType $operationType)
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
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OperationType $operationType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operationtypes_delete', array('id' => $operationType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
