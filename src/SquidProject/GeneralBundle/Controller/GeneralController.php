<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GeneralController extends Controller
{
    private $user;

    public function init(){
        $this->user=$this->container->get('security.context')->getToken()->getUser();
    }
    public function accueilAction()
    {	
    	$this->init();
    	$pseudo=$this->user->getUsername();
        return $this->render('SquidProjectGeneralBundle:General:accueil.html.twig',array('pseudo'=>$pseudo));
    }
	public function loginAction()
    {
        return $this->render('SquidProjectGeneralBundle:General:login.html.twig');
    }

     

}


