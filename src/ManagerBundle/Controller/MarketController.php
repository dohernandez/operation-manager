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
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Market';

    /**
     * @var string
     */
    protected $prefix_route = 'markets';

    /**
     * Lists all market entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'name' => 'name' ],
            ]
        );
    }

    /**
     * Creates a new market entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Market(), [
            'page_title' => 'Manager market',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ]);
    }

    /**
     * Displays a form to edit an existing market entity.
     *
     * @param Request $request
     * @param Market $market
     *
     * @return Response
     */
    public function editAction(Request $request, Market $market): Response
    {
        return $this->edit($request, $market, [
            'page_title' => 'Manager market',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ]);
    }

    /**
     * Deletes a market entity.
     *
     * @param Request $request
     * @param Market $market
     *
     * @return Response
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
