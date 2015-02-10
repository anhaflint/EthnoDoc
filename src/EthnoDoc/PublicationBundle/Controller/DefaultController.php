<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EthnoDocPublicationBundle:Default:index.html.twig', array('name' => $name));
    }
}
