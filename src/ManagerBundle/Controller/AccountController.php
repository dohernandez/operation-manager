<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Account;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Account controller.
 *
 */
class AccountController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Account';

    /**
     * @var string
     */
    protected $prefix_route = 'accounts';

    /**
     * Lists all account entities.
     *
     */
    public function indexAction(): Response
    {
        return $this->index(
            [
                [ 'name' => 'name', 'col_with' => '200' ],
                [ 'name' => 'iban' ],
            ]
        );
    }

    /**
     * Creates a new account entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Account(), [
            'page_title' => 'Manage account',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
        ]);
    }

    /**
     * Displays a form to edit an existing account entity.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return Response
     */
    public function editAction(Request $request, Account $account): Response
    {
        return $this->edit($request, $account, [
            'page_title' => 'Manage account',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
        ]);
    }

    /**
     * Deletes a account entity.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return Response
     */
    public function deleteAction(Request $request, Account $account)
    {
        return $this->delete($request, $account);
    }

    /**
     * Creates a form to delete a account entity.
     *
     * @param Account $account The account entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($account): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $account->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
