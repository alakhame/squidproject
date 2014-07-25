<?php

namespace SquidProject\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SquidProjectUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
