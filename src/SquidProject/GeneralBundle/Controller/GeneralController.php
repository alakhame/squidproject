<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GeneralController extends Controller
{
    public function accueilAction()
    {	
    	$user=$this->container->get('security.context')->getToken()->getUser();
    	$pseudo=$user->getUsername();
        return $this->render('SquidProjectGeneralBundle:General:accueil.html.twig',array('pseudo'=>$pseudo));
    }
	public function loginAction()
    {
        return $this->render('SquidProjectGeneralBundle:General:login.html.twig');
    }
}
