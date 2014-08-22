<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ValidationController extends Controller
{
    public function validateIPAction($ip)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $ipRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findOneBy(array("ip"=>$ip));
        if(!$ipRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Cette adresse existe déja!</span>");
        }
		
    }

    public function validateSourceAction($src)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $srcRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findOneBy(array("nom"=>$src));
        if(!$srcRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }

    public function validateDestinationAction($dest)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $destRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findOneBy(array("nom"=>$dest));
        if(!$destRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }

    public function validateDestinationDBAction($destDB)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $destDBRslt=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findOneBy(array("nom"=>$destDB));
        if(!$destDBRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }

    public function validateAclAction($acl)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $aclRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findOneBy(array("nom"=>$acl));
        if(!$aclRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }

    public function validateAclSourceAction($src)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $srcRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findOneBy(array("idSource"=>$src));
        if(!$srcRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Cette source a déja été affectée à une ACL!</span>");
        }
		
    }

    public function validateHoraireAction($h)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $hRslt=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findOneBy(array("nom"=>$h));
        if(!$hRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }

    public function validateConfigurationAction($conf)
    {
        //$champs=$_POST['champs'];
        $doctrine = $this->getDoctrine();
        $confRslt=$doctrine->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array("nom"=>$conf));
        if(!$confRslt){
        	return new Response("<span style=\"color:green\">OK !</span>");
        }
        else{
        	return new Response("<span style=\"color:red\">Ce nom existe déja!</span>");
        }
		
    }
	 
}
