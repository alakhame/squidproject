<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Ip;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Restrictions;

use SquidProject\GeneralBundle\Entity\EtatMAS;
use SquidProject\GeneralBundle\Entity\Acl;
use Symfony\Component\HttpFoundation\Response;



class SGController extends Controller
{
	
	public function getSourceConfig($id){
		$sourceConfig="";
		$doctrine = $this->getDoctrine();
	    $src=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->find($id);
	    
	    $sourceConfig.="src  ".$src->getNom()."  {"."\n\r";
	    $IpSources=$doctrine->getRepository('SquidProjectGeneralBundle:IpSource')->findBy(array("idSource"=>$id));
	    foreach ($IpSources as $IPs) {
	    	$ip=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->find($IPs->getIdIp());
	    	if($ip->getType()!=1){
	    		$sourceConfig.="\t"."ip"."\t".$ip->getIp()."\n\r";
	    	}
	    	else {
	    		$sourceConfig.="\t"."iplist"."\t".$ip->getIp()."\n\r";
	    	}
	    	$sourceConfig.="}\n\r";
	    }
		return $sourceConfig;
	}

	public function getAllSourceConfig(){
		$allSourceConfig="";
		$doctrine = $this->getDoctrine();
		$srcs=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();

		foreach ($srcs as $src) {
			$allSourceConfig.="\n\r";
			$allSourceConfig.=$this->getSourceConfig($src->getId());
		}
		return $allSourceConfig;

	}

	public function getDestinationConfig($id){
		$destConfig="";
		$doctrine = $this->getDoctrine();
	    $dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
	    $destDB=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($dest->getIdDestinationDb());
	    
	    $destConfig.="dest  ".$dest->getNom()."  {"."\n\r";
	 	$destConfig.="\t"."domainlist"."\t".$destDB->getNom()."/domains"."\n\r";
	 	$destConfig.="\t"."urllist"."\t".$destDB->getNom()."/urls"."\n\r";
	    $destConfig.="}\n\r";
	    
		return  $destConfig;
	}

	public function getAllDestinationConfig(){
		$allDestConfig="";
		$doctrine = $this->getDoctrine();
		$dests=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findAll();

		foreach ($dests as $dest) {
			$allDestConfig.="\n\r";
			$allDestConfig.=$this->getDestinationConfig($dest->getId());
		}
		return $allDestConfig;

	}

	
	public function getAclRestrictions($id){
		$pass="";
		$doctrine = $this->getDoctrine();
	    $rests=$doctrine->getRepository('SquidProjectGeneralBundle:Restrictions')->findBy(array("idAcl"=>$id));
	    foreach ($rests as $r) {
	    	$dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($r->getIdDest());
	    	if($r->getType()==1){
	    		$pass.="  ".$dest->getNom();
	    	}
	    	else {
	    		$pass.="  !".$dest->getNom();
	    	}
	    
	    }
	    return $pass;
	}


	public function getAclConfig($id){
		$doctrine = $this->getDoctrine();
	    $acl=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->find($id);
	    $time=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($acl->getIdTime());
	    $src=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->find($acl->getIdSource());
	    
        $config="";
        if(isset($time)){
        	$config.="\t".$acl->getNom()." within  ".$time->getNom()."{ \r\n";
        }
        else {
        	$config.="\t".$acl->getNom()." within  ".$time->getNom()."{ \r\n";
        }
	    $config.="\t\t"."pass ".$this->getAclRestrictions($acl->getId())." none \r\n" ;
	    $config.="\t\t"."redirect ".$acl->getRedirectLink()." \r\n" ;
	    if(isset($time)){
        	$config.="\t"."} else { \r\n";
	   		$config.="\t\t"."pass all \r\n" ;
        }
        	$config.="\t"."} \r\n" ;
	    return  $config  ;
	}

	public function getAllAclConfig(){
		$allAclConfig="";
		$doctrine = $this->getDoctrine();
		$dests=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findAll();

		$allAclConfig="acl  {"."\n\r";
		foreach ($dests as $dest) {
			$allAclConfig.="\n\r";
			$allAclConfig.=$this->getAclConfig($dest->getId());
		}
		$allAclConfig.="\n\r";
		$allAclConfig.="\tdefault {"."\n\r";
		$allAclConfig.="\t\t"."pass  none"."\n\r";
		$allAclConfig.="\t\t"."redirect  http://blocked.default"."\n\r";
		$allAclConfig.="\t} \r\n" ;
		$allAclConfig.="} \r\n" ;
		return $allAclConfig;
	}

	public function getTimeConfig($id){
		$horaire="";
    	$doctrine = $this->getDoctrine();
    	$time=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($id);
        $weeks=$doctrine->getRepository('SquidProjectGeneralBundle:WeekSquid')->findBy(array('idTime'=>$id));
        $dates=$doctrine->getRepository('SquidProjectGeneralBundle:DateSquid')->findBy(array('idTime'=>$id));
         
        $horaire.="time  ".$time->getNom()."  {"."\n\r";
        foreach ($weeks as $w) {
        	$horaire.="\t"."weekly"."\t".$w->getWeekly()."\n\r";
        }
        foreach ($dates as $d) {
        	$horaire.="\t"."date"."\t".$d->getDate()."\n\r";
        }
        $horaire.="}"."\n\r";

        return  $horaire ;
	}

	public function getAllTimeConfig(){
		$allTimeConfig="";
		$doctrine = $this->getDoctrine();
		$times=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findAll();

		foreach ($times as $t) {
			$allTimeConfig.="\n\r";
			$allTimeConfig.=$this->getTimeConfig($t->getId());
		}
		return $allTimeConfig;
	}


	public function getSGConfig(){
		$entete= "logdir /usr/local/squidGuard/log"."\n\r";
     	$entete.="dbhome /usr/local/squidGuard/db"."\n\r";

     	$config=$entete;
     	$config.="\n\r".$this->getAllTimeConfig();
     	$config.="\n\r".$this->getAllSourceConfig();
     	$config.="\n\r".$this->getAllDestinationConfig();
     	$config.="\n\r".$this->getAllAclConfig();

     	return  $config ;
	}


	public function getEtatMASAction(){
		$doctrine = $this->getDoctrine();
		$etat=$doctrine->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
		return new Response($etat[0]->getEtat());	
	}

	public function masAction(){
		chdir("/home/khanix/Bureau/squidGuard");
		$config=$this->getSGConfig();
		file_put_contents("squidGuard.conf", $config);
		$this->turnEtatToOne();
        return $this->redirect($this->generateUrl('squid_project_general_homepage'));
	}

	public function turnEtatToOne(){
		$em = $this->getDoctrine()->getManager();
		$etat=$em->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
        $etat[0]->setEtat("1");
        $em->flush();
        $em->clear();
	}

	public function turnEtatToZero(){
		$em = $this->getDoctrine()->getManager();
		$etat=$em->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
        $etat[0]->setEtat("0");
        $em->flush();
        $em->clear();
	}

	public function testAction(){
		$abc=$this->getSGConfig();
		return new Response($abc);
	}

}
   