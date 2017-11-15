<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\OperationType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Operationtype controller.
 *
 */
class OperationTypeController extends CRUDController
{
    use EntityController;

    /**
     * @var string
     */
    protected $entityClass = 'OperationType';

    /**
     * Lists all operationType entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(['type'], [
            'new_url' => $this->generateUrl('operationtypes_new')
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
            'cancel_url' => $this->generateUrl('operationtypes_index'),
        ]);
    }

    /**
     * Displays a form to edit an existing operationType entity.
     *
     */
    public function editAction(Request $request, OperationType $operationType): Response
    {
        return $this->edit($request, $operationType, [
            'page_title' => 'Manager operation type',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'cancel_url' => $this->generateUrl('operationtypes_index'),
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
}
