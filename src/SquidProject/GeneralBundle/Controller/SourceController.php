<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;


class SourceController extends Controller
{
    private $user;

    public function init(){
        $this->user=$this->container->get('security.context')->getToken()->getUser();
    }
    

     public function sourceAccueilAction()
    {   
        $this->init();
        $pseudo=$this->user->getUsername();
        return $this->render('SquidProjectGeneralBundle:General:source.html.twig',array('pseudo'=>$pseudo));
    }
    public function sourceNewIPAction()
    {   
        $this->init();
        $pseudo=$this->user->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();

               $ip= new Ip();
               $ip->setType($_POST['type']);
               if($_POST['type']==1) $ip->setIpListFile($_POST['fichierip']);
               else if($_POST['type']==2) $ip->setIpRange($_POST['plageip']);
               else if($_POST['type']==3)$ip->setIpCidr($_POST['cidr']);

            $em->persist($ip);
            $em->flush();

           return "hhhhhhhh";
        } 
        else return $this->render('SquidProjectGeneralBundle:General:sourceNewIP.html.twig',array('pseudo'=>$pseudo));
    }

}


