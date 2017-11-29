<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Cryptocurrency;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Cryptocurrency controller.
 *
 */
class CryptocurrencyController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Cryptocurrency';

    /**
     * @var string
     */
    protected $prefix_route = 'products_cryptocurrency_product';

    /**
     * Lists all cryptocurrency entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'name' => 'alias', 'col_with' => '80' ],
                [ 'name' => 'name' ],
                [ 'name' => 'symbol', 'col_with' => '80' ],
                [ 'name' => 'description', 'render' => 'slice', 'truncate' => '60'],
            ]
        );
    }

    /**
     * Creates a new cryptocurrency entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Cryptocurrency(), [
            'page_title' => 'Manage cryptocurrency',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ], 'ManagerBundle:product:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing cryptocurrency entity.
     *
     * @param Request $request
     * @param Cryptocurrency $cryptocurrency
     *
     * @return Response
     */
    public function editAction(Request $request, Cryptocurrency $cryptocurrency): Response
    {
        return $this->edit($request, $cryptocurrency, [
            'page_title' => 'Manage cryptocurrency',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ], 'ManagerBundle:product:edit.form.html.twig');
    }

    /**
     * Deletes a cryptocurrency entity.
     *
     * @param Request $request
     * @param Cryptocurrency $cryptocurrency
     *
     * @return Response
     */
    public function deleteAction(Request $request, Cryptocurrency $cryptocurrency)
    {
        return $this->delete($request, $cryptocurrency);
    }

    /**
     * Creates a form to delete a cryptocurrency entity.
     *
     * @param Cryptocurrency $cryptocurrency The cryptocurrency entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($cryptocurrency): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl(
                $this->getEntityCRUDRoute('delete'),
                ['id' => $cryptocurrency->getId()]
            ))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
