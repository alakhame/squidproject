<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Config;
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
	    
	    $sourceConfig.="src  ".$src->getNom()."  {"."\n";
	    $IpSources=$doctrine->getRepository('SquidProjectGeneralBundle:IpSource')->findBy(array("idSource"=>$id));
	    foreach ($IpSources as $IPs) {
	    	$ip=$doctrine->getRepository('SquidProjectGeneralBundle:Ip')->find($IPs->getIdIp());
	    	if($ip->getType()!=1){
	    		$sourceConfig.="\t"."ip"."\t".$ip->getIp()."\n";
	    	}
	    	else {
	    		$sourceConfig.="\t"."iplist"."\t".$ip->getIp()."\n";
	    	}
	    	$sourceConfig.="}\n";
	    }
		return $sourceConfig;
	}

	public function getAllSourceConfig(){
		$allSourceConfig="";
		$doctrine = $this->getDoctrine();
		$srcs=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->findAll();

		foreach ($srcs as $src) {
			$allSourceConfig.="\n";
			$allSourceConfig.=$this->getSourceConfig($src->getId());
		}
		return $allSourceConfig;

	}

	public function getDestinationConfig($id){
		$destConfig="";
		$doctrine = $this->getDoctrine();
	    $dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
	    $destDB=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($dest->getIdDestinationDb());
	    
	    $destConfig.="dest  ".$dest->getNom()."  {"."\n";
	 	$destConfig.="\t"."domainlist"."\t".$destDB->getNom()."/domains"."\n";
	 	//$destConfig.="\t"."urllist"."\t".$destDB->getNom()."/urls"."\n";
	    $destConfig.="}\n";
	    
		return  $destConfig;
	}

	public function getAllDestinationConfig(){
		$allDestConfig="";
		$doctrine = $this->getDoctrine();
		$dests=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findAll();

		foreach ($dests as $dest) {
			$allDestConfig.="\n";
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
	    if($acl->getIdTime()!=-1){
            $time=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($acl->getIdTime())->getNom();
        }
        else { 
        	$time="no time";
       	}
	 
	    $src=$doctrine->getRepository('SquidProjectGeneralBundle:Source')->find($acl->getIdSource());
	    
        $config="";
        if( $time!="no time"){
        	$config.="\t".$src->getNom()." within  ".$time->getNom()."{ \n";
        }
        else {
        	$config.="\t".$src->getNom()." { \n";
        }
	    $config.="\t\t"."pass ".$this->getAclRestrictions($acl->getId())." none \n" ;
	    $config.="\t\t"."redirect ".$acl->getRedirectLink()." \n" ;
	    if(isset($time)){
        	$config.="\t"."} else { \n";
	   		$config.="\t\t"."pass none \n" ;
        }
        	$config.="\t"."} \n" ;
	    return  $config  ;
	}

	public function getAllAclConfig(){
		$allAclConfig="";
		$doctrine = $this->getDoctrine();
		$dests=$doctrine->getRepository('SquidProjectGeneralBundle:Acl')->findAll();

		$allAclConfig="acl  {"."\n";
		foreach ($dests as $dest) {
			$allAclConfig.="\n";
			$allAclConfig.=$this->getAclConfig($dest->getId());
		}
		$allAclConfig.="\n";
		$allAclConfig.="\tdefault {"."\n";
		$allAclConfig.="\t\t"."pass  none"."\n";
		$allAclConfig.="\t\t"."redirect  http://blocked.default"."\n";
		$allAclConfig.="\t} \n" ;
		$allAclConfig.="} \n" ;
		return $allAclConfig;
	}

	public function getTimeConfig($id){
		$horaire="";
    	$doctrine = $this->getDoctrine();
    	$time=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->find($id);
        $weeks=$doctrine->getRepository('SquidProjectGeneralBundle:WeekSquid')->findBy(array('idTime'=>$id));
        $dates=$doctrine->getRepository('SquidProjectGeneralBundle:DateSquid')->findBy(array('idTime'=>$id));
         
        $horaire.="time  ".$time->getNom()."  {"."\n";
        foreach ($weeks as $w) {
        	$horaire.="\t"."weekly"."\t".$w->getWeekly()."\n";
        }
        foreach ($dates as $d) {
        	if($d->getDate()!="*.*.*")
        		$horaire.="\t"."date"."\t".$d->getDate()."\n";
        }
        $horaire.="}"."\n";

        return  $horaire ;
	}

	public function getAllTimeConfig(){
		$allTimeConfig="";
		$doctrine = $this->getDoctrine();
		$times=$doctrine->getRepository('SquidProjectGeneralBundle:TimeSquid')->findAll();

		foreach ($times as $t) {
			$allTimeConfig.="\n";
			$allTimeConfig.=$this->getTimeConfig($t->getId());
		}
		return $allTimeConfig;
	}


	public function getSGConfig(){
		$em = $this->getDoctrine()->getManager();
        $db_path=$em->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array('nom'=>"dbPath"));
        $log_path=$em->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array('nom'=>"logPath"));
        
		$entete ="dbhome   ".$db_path->getValeur()."\n";
     	$entete.="logdir   ".$log_path->getValeur();

     	$config=$entete;
     	$config.="\n".$this->getAllTimeConfig();
     	$config.="\n".$this->getAllSourceConfig();
     	$config.="\n".$this->getAllDestinationConfig();
     	$config.="\n".$this->getAllAclConfig();

     	return  $config ;
	}


	public function getEtatMASAction(){
		$doctrine = $this->getDoctrine();
		$etat=$doctrine->getRepository('SquidProjectGeneralBundle:EtatMAS')->findAll();
		return new Response($etat[0]->getEtat());	
	}

	public function masAction(){
		$em = $this->getDoctrine()->getManager();
        $conf_path=$em->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array('nom'=>"confPath"));
        
		chdir($conf_path->getValeur());
		$config=$this->getSGConfig();
		file_put_contents("squidGuard.conf", $config);
		shell_exec("sudo  chmod 777 -R ./*");
		shell_exec("sudo chown proxy:proxy ./*");
		shell_exec("sudo squidGuard -C all");
		shell_exec("sudo service squid3 restart");
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
   