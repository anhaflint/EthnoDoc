<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function homeAction() {
        return $this->render('EthnoDocPublicationBundle:Page:home.html.twig', array(

        ));
    }

    public function projectsAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:projects.html.twig', array(
                // ...
            ));    }

    public function calendarAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:calendar.html.twig', array(
                // ...
            ));    }

    public function partnersAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:partners.html.twig', array(
                // ...
            ));    }

    public function networkAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:network.html.twig', array(
                // ...
            ));    }

    public function missionsAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:missions.html.twig', array(
                // ...
            ));    }

    public function volunteerAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:volunteer.html.twig', array(
                // ...
            ));    }

    public function registerAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:register.html.twig', array(
                // ...
            ));    }

}
