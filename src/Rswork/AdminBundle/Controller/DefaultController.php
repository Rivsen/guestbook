<?php

namespace Rswork\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RsworkAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
