<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\CryptocurrencyMarket;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CryptocurrencyMarket controller.
 *
 */
class CryptocurrencyMarketController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'CryptocurrencyMarket';

    /**
     * @var string
     */
    protected $prefix_route = 'markets_cryptocurrency_market';

    /**
     * Lists all cryptocurrency market entities.
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
     * Creates a new cryptocurrency market entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new CryptocurrencyMarket(), [
            'page_title' => 'Manage cryptocurrency market',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'box_class' => 'col-md-8 col-md-offset-2',
        ], 'ManagerBundle:market:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing market entity.
     *
     * @param Request $request
     * @param CryptocurrencyMarket $cryptocurrencyMarket
     *
     * @return Response
     */
    public function editAction(Request $request, CryptocurrencyMarket $cryptocurrencyMarket): Response
    {
        return $this->edit($request, $cryptocurrencyMarket, [
            'page_title' => 'Manage cryptocurrency market',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'box_class' => 'col-md-8 col-md-offset-2',
        ], 'ManagerBundle:market:edit.form.html.twig');
    }

    /**
     * Deletes a market entity.
     *
     * @param Request $request
     * @param CryptocurrencyMarket $cryptocurrencyMarket
     *
     * @return Response
     */
    public function deleteAction(Request $request, CryptocurrencyMarket $cryptocurrencyMarket)
    {
        return $this->delete($request, $cryptocurrencyMarket);
    }

    /**
     * Creates a form to delete a market entity.
     *
     * @param Market $cryptocurrencyMarket The market entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($cryptocurrencyMarket): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $cryptocurrencyMarket->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
