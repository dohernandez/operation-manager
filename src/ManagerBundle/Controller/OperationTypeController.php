<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\OperationType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Operationtype controller.
 *
 */
class OperationTypeController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'OperationType';

    /**
     * @var string
     */
    protected $prefix_route = 'operationtypes';


    /**
     * Lists all operationType entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index([
            [ 'key' => 'type' ]
        ]);
    }

    /**
     * Creates a new operationType entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Operationtype(), [
            'page_title' => 'Manager operation type',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ]);
    }

    /**
     * Displays a form to edit an existing operationType entity.
     *
     * @param Request $request
     * @param OperationType $operationType
     *
     * @return Response
     */
    public function editAction(Request $request, OperationType $operationType): Response
    {
        return $this->edit($request, $operationType, [
            'page_title' => 'Manager operation type',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ]);
    }

    /**
     * Deletes a operationType entity.
     *
     * @param Request $request
     * @param OperationType $operationType
     *
     * @return Response
     */
    public function deleteAction(Request $request, OperationType $operationType): Response
    {
        return $this->delete($request, $operationType);
    }

    /**
     * Creates a form to delete a operationType entity.
     *
     * @param OperationType $operationType The operationType entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($operationType): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operationtypes_delete', array('id' => $operationType->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
