<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\ActionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Actiontype controller.
 *
 */
class ActionTypeController extends Controller
{
    /**
     * Lists all actionType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $actionTypes = $em->getRepository('ManagerBundle:ActionType')->findAll();

        return $this->render('actiontype/index.html.twig', array(
            'actionTypes' => $actionTypes,
        ));
    }

    /**
     * Creates a new actionType entity.
     *
     */
    public function newAction(Request $request)
    {
        $actionType = new Actiontype();
        $form = $this->createForm('ManagerBundle\Form\ActionTypeType', $actionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actionType);
            $em->flush();

            return $this->redirectToRoute('actiontypes_show', array('id' => $actionType->getId()));
        }

        return $this->render('actiontype/new.html.twig', array(
            'actionType' => $actionType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a actionType entity.
     *
     */
    public function showAction(ActionType $actionType)
    {
        $deleteForm = $this->createDeleteForm($actionType);

        return $this->render('actiontype/show.html.twig', array(
            'actionType' => $actionType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing actionType entity.
     *
     */
    public function editAction(Request $request, ActionType $actionType)
    {
        $deleteForm = $this->createDeleteForm($actionType);
        $editForm = $this->createForm('ManagerBundle\Form\ActionTypeType', $actionType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('actiontypes_edit', array('id' => $actionType->getId()));
        }

        return $this->render('actiontype/edit.html.twig', array(
            'actionType' => $actionType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a actionType entity.
     *
     */
    public function deleteAction(Request $request, ActionType $actionType)
    {
        $form = $this->createDeleteForm($actionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($actionType);
            $em->flush();
        }

        return $this->redirectToRoute('actiontypes_index');
    }

    /**
     * Creates a form to delete a actionType entity.
     *
     * @param ActionType $actionType The actionType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ActionType $actionType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actiontypes_delete', array('id' => $actionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
