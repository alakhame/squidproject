<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Restrictions;

use SquidProject\GeneralBundle\Entity\Acl;
use Symfony\Component\HttpFoundation\Response;

use SquidProject\GeneralBundle\Entity\EtatMAS;


class RestrictionController extends Controller
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
           $i=0; $n=$_POST['count'];
           
           for($i=1; $i<=$n;$i++){
           		$rest= new Restrictions() ;
           		$rest->setIdDest($_POST['destsel'.$i]);
           		$rest->setIdAcl($_POST['acl']);
           		if(isset($_POST['type'.$i])) {
           			$rest->setType($_POST['type'.$i]);
           		} else {
           			$rest->setType(1);
           		}
           		$em->persist($rest);
          		$em->flush();
          		$em->clear();
           }
            $this->turnEtatToZero();
           return $this->render('SquidProjectGeneralBundle:Restriction:success.html.twig',array('pseudo'=>$pseudo));
        } 
    	else{
	    	$doctrine = $this->getDoctrine();
	        $acls=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findAll();
	        $dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findAll();
	        
	        return $this->render('SquidProjectGeneralBundle:Restriction:restNew.html.twig',
	        					array('pseudo'=>$pseudo, "acls"=>$acls,"dest"=>$dest));
	   	}
    }

    public function restAllAction()
    {   
        $pseudo=$this->init()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $rests=array();
        $rts=$em->getRepository('SquidProjectGeneralBundle:Restrictions')->findAll();
        foreach ($rts as $r) {
        	if(!$this->existInArray($r,$rests)) $rests[]=$r;
        }
        return $this->render('SquidProjectGeneralBundle:Restriction:restAll.html.twig',array('pseudo'=>$pseudo,
                                                                    'rests'=>$rests));
    }

    public function existInArray($r,$rests){
    	if(empty($rests)) return false;
    	foreach ($rests as $rp) {
    		if($rp->getIdAcl()==$r->getIdAcl()) return true ;
    	}

    	return false ;
    }

    public function restDeleteAction($id)
    {   
    	$pseudo=$this->init()->getUsername();
    	$em = $this->getDoctrine()->getManager();
	    $rest=$em->getRepository('SquidProjectGeneralBundle:Restrictions')->find($id);
	    $em->remove($rest);
	    $em->flush();
    	return $this->render('SquidProjectGeneralBundle:Restriction:success.html.twig',array('pseudo'=>$pseudo));
    }

    public function getDestByRestId2Action($id)
    { 
        $em = $this->getDoctrine()->getManager();
        $r=$em->getRepository('SquidProjectGeneralBundle:Restrictions')->find($id);
        $destsIds=$em->getRepository('SquidProjectGeneralBundle:Restrictions')->findBy(array("idAcl"=>$id));
        $dests=array();
        foreach ($destsIds as $dId) {
            $dests[]=$em->getRepository('SquidProjectGeneralBundle:Destination')->find($dId->getIdDest()) ;
        }

        return $this->render('SquidProjectGeneralBundle:Restriction:test.html.twig',array('r'=>$r,'ds'=>$dests));
    
    }

    public function getDestByRestIdAction($id)
    {
    	$pseudo=$this->init()->getUsername();
    	$em = $this->getDoctrine()->getManager();
    	$rep="";
	    $destsIds=$em->getRepository('SquidProjectGeneralBundle:Restrictions')->findBy(array("idAcl"=>$id));
		foreach ($destsIds as $dId) {
			$destName=$this->getDestNameByIdAction($dId->getIdDest()) ;
			$supprimer="<div class=\"col-lg-3\" > <a href=\"/delete',{'id':r.id})}}\">
                                <button    class=\"btn btn-primary\" id=\"del\">
                                Supprimer
                            </button></a> </div>";
				
			if ($dId->getType()==1) {
				$autoriser="<div class=\"col-lg-3\" > Autoriser  </div>" ;
           		$bloquer="<div class=\"col-lg-3\" ><a href=\"{{path('squid_project_general_restriction_toggle',{'id':r.id})}}\">
                               Bloquer</a> </div>";
            } else {
            	$autoriser="<div class=\"col-lg-3\" ><a href=\"{{path('squid_project_general_restriction_toggle',{'id':r.id})}}\">
                                Autoriser </a> </div>" ;
           		$bloquer="<div class=\"col-lg-3\" > Bloquer </div>";
           
            }

			$rep.="\t<div class=\"row\"><div class=\"col-lg-3\" >".$destName."</div>   :".$autoriser.$bloquer;
			$rep.=$supprimer."</div>\n";
		}
		return new Response(nl2br($rep)) ;

    }

     public function getDestNameByIdAction($id)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$d=$em->getRepository('SquidProjectGeneralBundle:Destination')->find($id);	
    	return $d->getNom() ;
    }

    public function restToggleAction($id)
    {	
    	//$this->restAllAction();
    }


}
