<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Restriction;

use SquidProject\GeneralBundle\Entity\Acl;
use Symfony\Component\HttpFoundation\Response;



class RestrictionController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }

    public function restAccueilAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	return $this->render('SquidProjectGeneralBundle:Restriction:rest.html.twig',array('pseudo'=>$pseudo));
    }

    public function restNewAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	$request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();
           
            
           return $this->render('SquidProjectGeneralBundle:Acl:success.html.twig',array('pseudo'=>$pseudo));
        } 
    	else{
	    	$doctrine = $this->getDoctrine();
	        $acls=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();
	        $dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findAll();
	        
	        return $this->render('SquidProjectGeneralBundle:Restriction:restNew.html.twig',
	        					array('pseudo'=>$pseudo, "acls"=>$acls,"dest"=>$dest));
	   	}
    }
}
