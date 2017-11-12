<?php

namespace ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(): Response
    {
        return $this->render('ManagerBundle:default:index.html.twig');
    }
}
