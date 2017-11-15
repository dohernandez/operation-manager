<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Stock;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Stock controller.
 *
 */
class StockController extends CRUDController
{
    use EntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Stock';

    /**
     * Lists all stock entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'key' => 'symbol', 'col_with' => '150' ],
                [ 'key' => 'company', 'col_with' => '200' ],
                [ 'key' => 'description', 'col_with' => '' ],
            ],
            [
                'new_url' => $this->generateUrl('stocks_new'),
                'edit_route' => 'stocks_edit',
                'delete_route' => 'stocks_delete',
            ]
        );
    }

    /**
     * Creates a new stock entity.
     *
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new ActionType(), [
            'page_title' => 'Manager stock',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'cancel_url' => $this->generateUrl('stocks_index'),
        ]);
    }

    /**
     * Displays a form to edit an existing stock entity.
     *
     */
    public function editAction(Request $request, ActionType $actionType): Response
    {
        return $this->edit($request, $actionType, [
            'page_title' => 'Manager stock',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'cancel_url' => $this->generateUrl('stocks_index'),
        ]);
    }

    /**
     * Deletes a stock entity.
     *
     */
    public function deleteAction(Request $request, ActionType $actionType)
    {
        return $this->delete($request, $actionType);
    }

    /**
     * Creates a form to delete a stock entity.
     *
     * @param Stock $stock The stock entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createDeleteForm($stock): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('stocks_delete', array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
