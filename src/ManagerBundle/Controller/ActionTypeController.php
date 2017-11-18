<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\ActionType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Actiontype controller.
 *
 */
class ActionTypeController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'ActionType';

    /**
     * Lists all actionType entities.
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->index([[ 'key' => 'type' ]], [
            'new_url' => $this->generateUrl('actiontypes_new'),
            'edit_route' => 'actiontypes_edit',
            'delete_route' => 'actiontypes_delete',
        ]);
    }

    /**
     * Creates a new actionType entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new ActionType(), [
            'page_title' => 'Manager action type',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'cancel_url' => $this->generateUrl('actiontypes_index'),
        ]);
    }

    /**
     * Displays a form to edit an existing actionType entity.
     *
     * @param Request $request
     * @param ActionType $actionType
     *
     * @return Response
     */
    public function editAction(Request $request, ActionType $actionType): Response
    {
        return $this->edit($request, $actionType, [
            'page_title' => 'Manager action type',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'cancel_url' => $this->generateUrl('actiontypes_index'),
        ]);
    }

    /**
     * Deletes a actionType entity.
     *
     */
    public function deleteAction(Request $request, ActionType $actionType)
    {
        return $this->delete($request, $actionType);
    }

    /**
     * Creates a form to delete a actionType entity.
     *
     * @param ActionType $actionType The actionType entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($actionType): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actiontypes_delete', array('id' => $actionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
