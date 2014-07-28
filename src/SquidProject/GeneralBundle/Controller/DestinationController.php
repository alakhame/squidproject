<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;
use Symfony\Component\HttpFoundation\Response;



class DestinationController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }
    
    public function getIpByIpSource($id){
        $doctrine = $this->getDoctrine();
        $ip=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findOneBy(array('id'=>$id));
        return $ip;
    }

     

    public function ipsForSourceAction($id){
        $doctrine = $this->getDoctrine();
        $ipSourceTab=$doctrine->getRepository('SquidProjectGeneralBundle:IpSource')->findBy(array('idSource'=>$id));
        $s="";
        foreach ($ipSourceTab as $ipSource) {
          $ip=$this->getIpByIpSource($ipSource->getIdIp());
          $s.=$ip->getIp()."<br/>" ;
        }
        return  new Response($s);
    }


    
    public function getSourceById($id){
        $doctrine = $this->getDoctrine();
        $s=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findOneBy(array('id'=>$id ));
        return $s;
    }

    public function destAccueilAction()
    {  
        $pseudo=$this->init()->getUsername();
        return $this->render('SquidProjectGeneralBundle:Destination:destination.html.twig',array('pseudo'=>$pseudo));
    }

}


