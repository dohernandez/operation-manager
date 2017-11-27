<?php

namespace ManagerBundle\Controller;

use ManagerBundle\Entity\Broker;
use ManagerBundle\Entity\Market;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Broker controller.
 *
 */
class BrokerController extends CRUDController
{
    use CRUDEntityController;

    /**
     * @var string
     */
    protected $entityClass = 'Broker';

    /**
     * @var string
     */
    protected $prefix_route = 'brokers';

    /**
     * Lists all broker entities.
     *
     */
    public function indexAction(): Response
    {
        // If brokers is empty, parent will trigger broker repository find all
        $brokers = [];

        return $this->index(
            [
                [ 'name' => 'name' ],
                [ 'name' => 'type', 'col_with' => '200' ],
                [ 'name' => 'capital', 'col_with' => '100', 'render' => 'currency' ],
                [ 'name' => 'investment', 'col_with' => '100', 'render' => 'currency' ],
            ],
            $brokers,
            [
                'extra_buttons' => [
                    [
                        'route'  => $this->getEntityCRUDRoute('commissions'),
                        'icon' => 'money',
                        'action' => 'commissions',
                        'type' => 'warning',
                        'modal' => false,
                    ],
                ],
            ]
        );
    }

    /**
     * Creates a new broker entity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new Broker(), [
            'page_title' => 'Manage broker',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'form_theme' => 'ManagerBundle:broker:theme-form.html.twig',
            'box_class' => 'col-md-10 col-md-offset-1',
        ], 'ManagerBundle:broker:new.form.html.twig');
    }

    /**
     * Displays a form to edit an existing broker entity.
     *
     * @param Request $request
     * @param Broker $broker
     *
     * @return Response
     */
    public function editAction(Request $request, Broker $broker): Response
    {
        $cryptoBox = [];
        $view = 'ManagerBundle:broker:edit.form.html.twig';

        if ($broker->getType() == 'cryptocurrencies') {
            $cryptoBox = [
                'commission_parent' => 'broker'
            ];

            $view = 'ManagerBundle:broker:edit.crypto.form.html.twig';
        }

        return $this->edit($request, $broker, [
            'page_title' => 'Manage broker',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'form_theme' => 'ManagerBundle:broker:theme-form.html.twig',
            'box_class' => 'col-md-10 col-md-offset-1',
        ] + $cryptoBox, $view);
    }

    /**
     * Deletes a broker entity.
     *
     * @param Request $request
     * @param Broker $broker
     *
     * @return Response
     */
    public function deleteAction(Request $request, Broker $broker)
    {
        return $this->delete($request, $broker);
    }

    /**
     * Creates a form to delete a broker entity.
     *
     * @param Broker $broker The broker entity
     *
     * @return Form The form
     */
    protected function createDeleteForm($broker): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($this->getEntityCRUDRoute('delete'), array('id' => $broker->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Creates a new broker entity.
     *
     * @param Request $request
     * @param Broker $broker
     *
     * @return Response
     */
    public function commissionsAction(Request $request, Broker $broker): Response
    {
        $form = $this->createForm('ManagerBundle\Form\BrokerMarketCommissionType', $broker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($broker->getMarkets() as $market) {
                $this->getEntityRepository()->saveCommissions($market->getCommissions());
            }

            return $this->redirectToRoute($this->getEntityCRUDRoute('index'));
        }

        return $this->render('ManagerBundle:broker:commission.form.html.twig', [
                'form' => $form->createView(),
                'page_title' => 'Manage broker',
                'page_subtitle' => 'commissions',
                'box_type' => 'warning',
                'submit_type' => 'Edit',
                'box_title' => $broker,
                'cancel_url' => $this->getEntityCRUDUrl('cancel'),
                'form_theme' => 'ManagerBundle:broker:theme-form.html.twig',
                'box_class' => 'col-md-10 col-md-offset-1',
            ]);
    }
}
