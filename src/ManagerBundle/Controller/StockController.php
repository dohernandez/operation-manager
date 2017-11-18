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
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Stock';

    /**
     * @var string
     */
    protected $prefix_route = 'stocks';

    /**
     * Lists all stock entities.
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'key' => 'symbol', 'col_with' => '80' ],
                [ 'key' => 'market', 'col_with' => '200'],
                [ 'key' => 'company', 'col_with' => '200' ],
                [ 'key' => 'description'],
            ]
        );
    }

    /**
     * Creates a new stock entity.
     *
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Stock(), [
            'page_title' => 'Manager stock',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ]);
    }

    /**
     * Displays a form to edit an existing stock entity.
     *
     */
    public function editAction(Request $request, Stock $stock): Response
    {
        return $this->edit($request, $stock, [
            'page_title' => 'Manager stock',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ]);
    }

    /**
     * Deletes a stock entity.
     *
     */
    public function deleteAction(Request $request, Stock $stock)
    {
        return $this->delete($request, $stock);
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
