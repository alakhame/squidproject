<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;
use Symfony\Component\HttpFoundation\Response;



class AclController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }

    public function aclAccueilAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	return $this->render('SquidProjectGeneralBundle:Acl:acl.html.twig',array('pseudo'=>$pseudo));
    }
}