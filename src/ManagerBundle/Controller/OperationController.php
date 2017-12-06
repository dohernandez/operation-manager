<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Operation;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Operation controller.
 *
 */
class OperationController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Operation';

    /**
     * @var string
     */
    protected $prefix_route = 'operations';

    /**
     * Lists all operation entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'name' => 'type', 'col_with' => '80' ],
                [ 'name' => 'size', 'col_with' => '80' ],
                [ 'name' => 'ratio', 'col_with' => '100' ],
                [ 'name' => 'goal', 'col_with' => '100' ],
                [ 'name' => 'stop', 'label' => 'Stop loss', 'col_with' => '100' ],
                [ 'name' => 'start', 'label' => 'Enter', 'col_with' => '100' ],
                [ 'name' => 'breakeven', 'col_with' => '100' ],
                [ 'name' => 'benefitsAfterTaxes', 'label' => 'Benefits After Taxes' ],
            ]
        );
    }

    /**
     * Creates a new operation entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Operation(), [
            'page_title' => 'Manage operation',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'box_class' => 'col-md-10 col-md-offset-1',
        ], 'ManagerBundle:operation:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing operation entity.
     *
     * @param Request $request
     * @param Operation $operation
     *
     * @return Response
     */
    public function editAction(Request $request, Operation $operation): Response
    {
        return $this->edit($request, $operation, [
            'page_title' => 'Manage operation',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ]);
    }

    /**
     * Deletes a operation entity.
     *
     * @param Request $request
     * @param Operation $operation
     *
     * @return Response
     */
    public function deleteAction(Request $request, Operation $operation)
    {
        return $this->delete($request, $operation);
    }

    /**
     * Creates a form to delete a operation entity.
     *
     * @param Operation $operation The operation entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($operation): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $operation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
