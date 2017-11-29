<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\StockMarket;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * StockMarket controller.
 *
 */
class StockMarketController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'StockMarket';

    /**
     * @var string
     */
    protected $prefix_route = 'markets_stock_market';

    /**
     * Lists all stock market entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'name' => 'alias', 'col_with' => '80' ],
                [ 'name' => 'name' ],
                [ 'name' => 'symbol', 'col_with' => '80' ],
                [ 'name' => 'region', 'col_with' => '100' ],
                [ 'name' => 'country', 'col_with' => '200' ],
            ]
        );
    }

    /**
     * Creates a new stock market entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new StockMarket(), [
            'page_title' => 'Manage stock market',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ], 'ManagerBundle:market:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing market entity.
     *
     * @param Request $request
     * @param StockMarket $stockMarket
     *
     * @return Response
     */
    public function editAction(Request $request, StockMarket $stockMarket): Response
    {
        return $this->edit($request, $stockMarket, [
            'page_title' => 'Manage stock market',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ], 'ManagerBundle:market:edit.form.html.twig');
    }

    /**
     * Deletes a market entity.
     *
     * @param Request $request
     * @param StockMarket $stockMarket
     *
     * @return Response
     */
    public function deleteAction(Request $request, StockMarket $stockMarket)
    {
        return $this->delete($request, $stockMarket);
    }

    /**
     * Creates a form to delete a market entity.
     *
     * @param Market $stockMarket The market entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($stockMarket): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $stockMarket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
