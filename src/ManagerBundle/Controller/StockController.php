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
    protected $prefix_route = 'products_stock_product';

    /**
     * Lists all stock entities.
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        // If stocks is empty, parent will trigger stock repository find all
        $stocks = [];

        return $this->index(
            [
                [ 'name' => 'symbol', 'col_with' => '80' ],
                [ 'name' => 'company', 'col_with' => '200' ],
                [ 'name' => 'description', 'render' => 'slice', 'truncate' => '60'],
            ],
            $stocks,
            [
                'extra_buttons' => [
                    [
                        'route'  => $this->getEntityCRUDRoute('show'),
                    ],
                ],
            ]
        );
    }

    /**
     * Finds and displays a entity.
     *
     * @param Stock $stock
     *
     * @return Response
     */
    public function showAction(Stock $stock)
    {
        return $this->render('ManagerBundle:stock:show.html.twig', array(
            'stock' => $stock,
        ));
    }

    /**
     * Creates a new stock entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Stock(), [
            'page_title' => 'Manage stock',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ], 'ManagerBundle:product:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing stock entity.
     *
     * @param Request $request
     * @param Stock $stock
     *
     * @return Response
     */
    public function editAction(Request $request, Stock $stock): Response
    {
        return $this->edit($request, $stock, [
            'page_title' => 'Manage stock',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ], 'ManagerBundle:product:edit.form.html.twig');
    }

    /**
     * Deletes a stock entity.
     *
     * @param Request $request
     * @param Stock $stock
     *
     * @return Response
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
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $stock->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
