<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Transfer;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Transfer controller.
 *
 */
class TransferController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Transfer';

    /**
     * @var string
     */
    protected $prefix_route = 'transfers';

    /**
     * Lists all transfer entities.
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [
                    'name' => 'transferredAt',
                    'label' => 'date',
                    'col_with' => '100',
                    'render' => 'date',
                    'date_format' => 'm/d/Y'
                ],
                [ 'name' => 'reference'],
                [ 'name' => 'beneficiary'],
                [ 'name' => 'amount', 'col_with' => '100', 'render' => 'currency'],
            ]
        );
    }

    /**
     * Finds and displays a entity.
     *
     * @param Transfer $transfer
     *
     * @return Response
     */
    public function showAction(Transfer $transfer)
    {
        return $this->render('ManagerBundle:transfer:show.html.twig', array(
            'transfer' => $transfer,
        ));
    }

    /**
     * Creates a new transfer entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Transfer(), [
            'page_title' => 'Manage transfer',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ], 'ManagerBundle:transfer:edit.form.html.twig');
    }

    /**
     * Displays a form to edit an existing transfer entity.
     *
     * @param Request $request
     * @param Transfer $transfer
     *
     * @return Response
     */
    public function editAction(Request $request, Transfer $transfer): Response
    {
        return $this->edit($request, $transfer, [
            'page_title' => 'Manage transfer',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ], 'ManagerBundle:transfer:edit.form.html.twig');
    }

    /**
     * Deletes a transfer entity.
     *
     * @param Request $request
     * @param Transfer $transfer
     *
     * @return Response
     */
    public function deleteAction(Request $request, Transfer $transfer)
    {
        return $this->delete($request, $transfer);
    }

    /**
     * Creates a form to delete a transfer entity.
     *
     * @param Transfer $transfer The transfer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    protected function createDeleteForm($transfer): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $transfer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
