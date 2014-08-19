<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\EtatMAS;
use SquidProject\GeneralBundle\Entity\Config;

class ConfigController extends Controller
{
    public function accueilAction()
    {	
    	$doctrine = $this->getDoctrine();
        $configs=$doctrine->getRepository('SquidProjectGeneralBundle:Config')->findAll();
          
        return $this->render('SquidProjectGeneralBundle:General:config.html.twig',array("configs"=>$configs));
    }

    public function turnEtatToZero(){
      $em = $this->getDoctrine()->getManager();
      $etat=$em->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
          $etat[0]->setEtat("0");
          $em->flush();
          $em->clear();
    }

	public function newAction()
    {	
    	$request = $this->get('request');
        if ('POST' === $request->getMethod()) {

           $em = $this->getDoctrine()->getManager();

               $c= new Config();
               $c->setNom($_POST['nom']);
               $c->setValeur($_POST['valeur']);
               
            $em->persist($c);
            $em->flush();
            $this->turnEtatToZero();
        }
        return $this->accueilAction();
    }

    public function updateAction()
    {	
    	$request = $this->get('request');
    	if ('POST' === $request->getMethod()) {

           	$em = $this->getDoctrine()->getManager();
           	$configs=$em->getRepository('SquidProjectGeneralBundle:Config')->findAll();
        	
        	foreach ($configs as $c) {
        		$nom=$c->getNom();
        		$c->setValeur($_POST[''.$nom]);
        		$c=$em->merge($c);
        		$em->flush();
         		$em->clear();
        	}
            
            $this->turnEtatToZero();
            return $this->render('SquidProjectGeneralBundle:General:success.html.twig');
        }
         return $this->accueilAction();
       
    }
}
