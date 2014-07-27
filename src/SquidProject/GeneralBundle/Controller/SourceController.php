<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;


class SourceController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }
    

     public function sourceAccueilAction()
    {   
        
        $pseudo=$this->init()->getUsername();
        return $this->render('SquidProjectGeneralBundle:Source:source.html.twig',array('pseudo'=>$pseudo));
    }
    public function sourceNewIPAction()
    {   
        $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();

               $ip= new Ip();
               $ip->setType($_POST['type']);
               if($_POST['type']==1) $ip->setIp($_POST['fichierip']);
               else if($_POST['type']==2) $ip->setIp($_POST['plageip']);
               else if($_POST['type']==3)$ip->setIp($_POST['cidr']);

            $em->persist($ip);
            $em->flush();

           return $this->render('SquidProjectGeneralBundle:Source:success.html.twig',array('pseudo'=>$pseudo));
        } 
        else return $this->render('SquidProjectGeneralBundle:Source:sourceNewIP.html.twig',array('pseudo'=>$pseudo));
    }

     public function sourceNewAction()
    {   
       $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();

               $ip= new Ip();
               $ip->setType($_POST['type']);
               if($_POST['type']==1) $ip->setIp($_POST['fichierip']);
               else if($_POST['type']==2) $ip->setIp($_POST['plageip']);
               else if($_POST['type']==3)$ip->setIp($_POST['cidr']);

            $em->persist($ip);
            $em->flush();

           return $this->render('SquidProjectGeneralBundle:Source:success.html.twig',array('pseudo'=>$pseudo));
        } 
        else {
                
            $doctrine = $this->getDoctrine();
            $ips=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findAll();
            return $this->render('SquidProjectGeneralBundle:Source:sourceNew.html.twig',array('pseudo'=>$pseudo, 'ips'=>$ips));

        }
    }

}


