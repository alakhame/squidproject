<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;
use Symfony\Component\HttpFoundation\Response;



class HoraireController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }

    public function horaireAccueilAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	return $this->render('SquidProjectGeneralBundle:Horaire:horaire.html.twig',array('pseudo'=>$pseudo));
    }
}