<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;
use Symfony\Component\HttpFoundation\Response;



class SourceController extends Controller
{
    public function init(){
       return $this->container->get('security.context')->getToken()->getUser();
    }
    
    public function getIpByIpSource($id){
        $doctrine = $this->getDoctrine();
        $ip=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findOneBy(array('id'=>$id));
        return $ip;
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
          $source=new Source();
          $source->setNom($_POST['nom']);
          $em->persist($source);
          $em->flush();
          $em->clear();

          $i=0; $n=$_POST['count'];
          for($i=1;$i<=$n;$i++){
            $ipsource=new IpSource();
            $ipsource->setIdIp($_POST['sel'.$i]);
            $ipsource->setIdSource($source->getId());
            $em->persist($ipsource);
            $em->flush();
            $em->clear();
          }
          

           return $this->render('SquidProjectGeneralBundle:Source:success.html.twig',array('pseudo'=>$pseudo));
        } 
        else {
                
            $doctrine = $this->getDoctrine();
            $ips=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findAll();
            return $this->render('SquidProjectGeneralBundle:Source:sourceNew.html.twig',array('pseudo'=>$pseudo, 'ips'=>$ips));

        }
    }

    public function sourceAllAction()
    {   
        $pseudo=$this->init()->getUsername();
        $doctrine = $this->getDoctrine();
        $sources=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();
        return $this->render('SquidProjectGeneralBundle:Source:sourceAll.html.twig',array('pseudo'=>$pseudo,
                                                                    'sources'=>$sources));
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

    public function deleteIpSourceEntities($id){
        $em = $this->getDoctrine()->getManager();
        $ipSources=$em->getRepository('SquidProjectGeneralBundle:IpSource')->findAll();
        foreach ($ipSources as $ipsource) {
          if($ipsource->getIdSource()==$id){
            $em->remove($ipsource);
            $em->flush();
            $em->clear();
          }
        }
    }

    public function SourceUpdateAction($id){
        $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
          $this->deleteIpSourceEntities($_POST['id']);
          $em = $this->getDoctrine()->getManager();
          $s=$em->getRepository('SquidProjectGeneralBundle:Source')->find($_POST['id']);
          $s->setNom($_POST['nom']);
          $i=0; $n=$_POST['count'];
           $em->flush();
            $em->clear();

          for($i=1;$i<=$n;$i++){
            $ipsource=new IpSource();
            $ipsource->setIdIp($_POST['sel'.$i]);
            $ipsource->setIdSource($_POST['id']);
            $em->persist($ipsource);
            $em->flush();
            $em->clear();
          }
          return $this->render('SquidProjectGeneralBundle:Source:success.html.twig',array('pseudo'=>$pseudo));
      
        }
        else {
            $doctrine = $this->getDoctrine();
            $source=$this->getSourceById($id);
            $ips=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->findAll();
            return $this->render('SquidProjectGeneralBundle:Source:sourceUpdate.html.twig',array('s'=>$source,'pseudo'=>$pseudo, 'ips'=>$ips));
        }
    }

    public function getSourceById($id){
        $doctrine = $this->getDoctrine();
        $s=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findOneBy(array('id'=>$id ));
        return $s;
    }

    public function sourceDeleteAction($id){
        $pseudo=$this->init()->getUsername();
          $em = $this->getDoctrine()->getManager();
          $s=$em->getRepository('SquidProjectGeneralBundle:Source')->find($id);
          $em->remove($s);
          $em->flush();
          $em->clear();
          return $this->render('SquidProjectGeneralBundle:Source:success.html.twig',array('pseudo'=>$pseudo));
    }

}


