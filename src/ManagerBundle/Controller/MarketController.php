<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Market;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Market controller.
 *
 */
class MarketController extends CRUDController
{
    use EntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Market';

    /**
     * Lists all market entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'key' => 'symbol', 'col_with' => '150' ],
                [ 'key' => 'name' ],
            ],
            [
                'new_url' => $this->generateUrl('markets_new'),
                'edit_route' => 'markets_edit',
                'delete_route' => 'markets_delete',
            ]
        );
    }

    /**
     * Creates a new market entity.
     *
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Market(), [
            'page_title' => 'Manager market',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'cancel_url' => $this->generateUrl('markets_index'),
        ]);
    }

    /**
     * Displays a form to edit an existing market entity.
     *
     */
    public function editAction(Request $request, Market $market): Response
    {
        return $this->edit($request, $market, [
            'page_title' => 'Manager market',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'cancel_url' => $this->generateUrl('markets_index'),
        ]);
    }

    /**
     * Deletes a market entity.
     *
     */
    public function deleteAction(Request $request, Market $market)
    {
        return $this->delete($request, $market);
    }

    /**
     * Creates a form to delete a market entity.
     *
     * @param Market $market The market entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($market): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('markets_delete', array('id' => $market->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
