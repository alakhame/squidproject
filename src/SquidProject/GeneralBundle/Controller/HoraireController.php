<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\WeekSquid;
use SquidProject\GeneralBundle\Entity\TimeSquid;
use SquidProject\GeneralBundle\Entity\DateSquid;
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

    public function horaireNewAction()
    {   
    	$pseudo=$this->init()->getUsername();
    	$request = $this->get('request');
        if ('POST' === $request->getMethod()) {

          $em = $this->getDoctrine()->getManager();
          $h=new TimeSquid();
          $h->setNom($_POST['nom']);
          $em->persist($h);
          $em->flush();
          $em->clear();

          /******* week *******/
          $i=0; $nw=$_POST['countweek']; $week="";
      
	      	if(isset($_POST['tlj1'])){
	      		$week.="*";
	      	}
	      	else{
	      		$j=0;
	      		for($j=1;$j<=7;$j++){
	      			if(isset($_POST['j1_'.$j])) {
		          		$week.=$_POST['j1_'.$j];
		          	}
	      		}
	      		
	      	}
	      	$week.="  ";

	      	if(!isset($_POST['tlh1'])){
	      		$week.=$_POST['selwh1']."-".$_POST['selwh1bis'];
	      	}

	      	$w=new WeekSquid();
	      	$w->setIdTime($h->getId());
	      	$w->setWeekly($week);
	      	$em->persist($w);
          	$em->flush();
          	$em->clear();

	      	if($nw==2){
	      		$week="";
      
	      	if(isset($_POST['tlj2'])){
	      		$week.="*";
		      	}
		      	else{
		      		$j=0;
		      		for($j=1;$j<=7;$j++){
		      			if(isset($_POST['j2_'.$j])) {
			          		$week.=$_POST['j2_'.$j];
			          	}
		      		}
		      		$week.="  ";
		      	}

		      	if(!isset($_POST['tlh2'])){
		      		$week.=$_POST['selwh2']."-".$_POST['selwh2bis'];
		      	}

		      	$w2=new WeekSquid();
		      	$w2->setIdTime($h->getId());
		      	$w2->setWeekly($week);
		      	$em->persist($w2);
	          	$em->flush();
	          	$em->clear();
	      	}

          /******* date *******/
          $i=0; $nd=$_POST['countdate']; $date="";
          $date=$_POST['seldan1'].".".$_POST['seldmois1'].".".$_POST['seldjour1'];	
          $d=new DateSquid();
          $d->setIdTime($h->getId());
          $d->setDate($date);
          $em->persist($d);
	      $em->flush();
	  	  $em->clear();

	  	  if($nd==2){
	  	  	  $date2="";
          	  $date2=$_POST['seldan2'].".".$_POST['seldmois2'].".".$_POST['seldjour2'];	
	          $d2=new DateSquid();
	          $d2->setIdTime($h->getId());
	          $d2->setDate($date2);
	          $em->persist($d2);
		      $em->flush();
		  	  $em->clear();
	  	  }
          

           return $this->render('SquidProjectGeneralBundle:Horaire:success.html.twig',array('pseudo'=>$pseudo));
        } 
        else {
    	return $this->render('SquidProjectGeneralBundle:Horaire:horaireNew.html.twig',array('pseudo'=>$pseudo));
    	}
    }

    public function horaireAllAction()
    {   
        $pseudo=$this->init()->getUsername();
        $doctrine = $this->getDoctrine();
        $horaires=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findAll();
        return $this->render('SquidProjectGeneralBundle:Horaire:horaireAll.html.twig',array('pseudo'=>$pseudo,
                                                                    'hs'=>$horaires));
    }

    public function detailsByTimeIDAction($idTime){
    	$ch="";
    	$doctrine = $this->getDoctrine();
        $weeks=$doctrine->getRepository('SquidProjectGeneralBundle:WeekSquid')->findBy(array('idTime'=>$idTime));
        $dates=$doctrine->getRepository('SquidProjectGeneralBundle:DateSquid')->findBy(array('idTime'=>$idTime));
         
        foreach ($weeks as $w) {
        	$ch.="  Week   ".$w->getWeekly()."<br/>";
        }
        foreach ($dates as $d) {
        	$ch.="  Date   ".$d->getDate()."<br/>";
        }
        


    	return new Response($ch);
    }

    public function horaireDeleteAction($id){
    	$pseudo=$this->init()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $dates=$em->getRepository('SquidProjectGeneralBundle:DateSquid')->findBy(array('idTime'=>$id));
        $weeks=$em->getRepository('SquidProjectGeneralBundle:WeekSquid')->findBy(array('idTime'=>$id));
        foreach ($weeks as $w) {
        	$wp=$em->getRepository('SquidProjectGeneralBundle:WeekSquid')->find($w->getId());
        	$em->remove($wp);
        	$em->flush();
        	$em->clear();
        } 
        foreach ($dates as $d) {
        	$dp=$em->getRepository('SquidProjectGeneralBundle:DateSquid')->find($d->getId());
        	$em->remove($dp);
        	$em->flush();
        	$em->clear();
        } 
        $h=$em->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($id);
        $em->remove($h);
       	$em->flush();
       	$em->clear();
        
    	return $this->render('SquidProjectGeneralBundle:Horaire:success.html.twig',array('pseudo'=>$pseudo));
    }
}