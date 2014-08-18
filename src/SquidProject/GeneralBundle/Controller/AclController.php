<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;

use SquidProject\GeneralBundle\Entity\Acl;
use Symfony\Component\HttpFoundation\Response;

use SquidProject\GeneralBundle\Entity\EtatMAS;



class AclController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }

    public function turnEtatToZero(){
        $em = $this->getDoctrine()->getManager();
        $etat=$em->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
        $etat[0]->setEtat("0");
        $em->flush();
        $em->clear();
    }

    public function aclAccueilAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	return $this->render('SquidProjectGeneralBundle:Acl:acl.html.twig',array('pseudo'=>$pseudo));
    }

    public function getNomByIdAction($id){
        $doctrine = $this->getDoctrine();
        $acl=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
        return new Response($acl->getNom());
    }   

    public function aclNewAction(){

    	$pseudo=$this->init()->getUsername();
    	 $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();
           $acl = new Acl();
            $acl->setIdSource($_POST['src']);
            $acl->setIdTime($_POST['horaire']);
            $acl->setNom($_POST['nom']);
            $acl->setRedirectLink($_POST['rdct']);
            $acl->setEtat($_POST['etat']);

            $em->persist($acl);
            $em->flush();
            $this->turnEtatToZero();

           return $this->render('SquidProjectGeneralBundle:Acl:success.html.twig',array('pseudo'=>$pseudo));
        } 
    	else{
	    	$doctrine = $this->getDoctrine();
	        $srcs=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();
	        $hs=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findAll();
	        
	        return $this->render('SquidProjectGeneralBundle:Acl:aclNew.html.twig',array('pseudo'=>$pseudo, "srcs"=>$srcs,"horaires"=>$hs));
	   	}
    }

    public function aclAllAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	$doctrine = $this->getDoctrine();
	    $acls=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findAll();
	        
    	return $this->render('SquidProjectGeneralBundle:Acl:aclAll.html.twig',array('pseudo'=>$pseudo,'acls'=>$acls));
    }

    public function buildConfigAction($id){
    	$doctrine = $this->getDoctrine();
	    $acl=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
	    if($acl->getIdTime()!=-1){
            $time=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($acl->getIdTime())->getNom();
        }
        else { $time=-1;}
        $config="";
	    $config.="\t".$acl->getNom();
        if($time!=-1){
             $config.=" within  ".$time."{ \r\n" ;
        }
        else {
             $config.="{ \r\n" ;
        }
	    $config.="\t\t"."pass all "."\r\n" ;
	    $config.="\t"."} else { \r\n";
	    $config.="\t\t"."pass none \r\n" ;
	    $config.="\t\t"."redirect ".$acl->getRedirectLink()." \r\n" ;
	    $config.="\t"."} \r\n" ;
	    /*chdir("/var/www");
	    $a=getcwd();
	    file_put_contents("a.conf", $config);*/
	    return new Response( nl2br($config) );

    }

    public function aclDeleteAction($id)
    {   
    	$pseudo=$this->init()->getUsername();
    	$em = $this->getDoctrine()->getManager();
	    $acl=$em->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
	    $em->remove($acl);
	    $em->flush();
        $this->turnEtatToZero();
    	return $this->render('SquidProjectGeneralBundle:Acl:success.html.twig',array('pseudo'=>$pseudo));
    }

    public function aclUpdateAction($id){

    	$pseudo=$this->init()->getUsername();
    	 $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();
           $acl =$em->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
            $acl->setIdSource($_POST['src']);
            $acl->setIdTime($_POST['horaire']);
            $acl->setNom($_POST['nom']);
            $acl->setRedirectLink($_POST['rdct']);
            $acl->setEtat($_POST['etat']);

            $em->persist($acl);
            $em->flush();
            $this->turnEtatToZero();
           return $this->render('SquidProjectGeneralBundle:Acl:success.html.twig',array('pseudo'=>$pseudo));
        } 
    	else{
	    	$doctrine = $this->getDoctrine();
	        $srcs=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();
	        $hs=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findAll();
	        $a=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
	        
	        return $this->render('SquidProjectGeneralBundle:Acl:aclUpdate.html.twig',
	        				array('pseudo'=>$pseudo, "srcs"=>$srcs,"horaires"=>$hs, 'a'=>$a ));
	   	}
    }

}