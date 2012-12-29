<?php

namespace Rswork\GuestbookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RsworkGuestbookBundle:Default:index.html.twig', array('name' => $name));
    }
}
