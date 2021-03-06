<?php

namespace SquidProject\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SquidProject\GeneralBundle\Entity\Domaine;
use SquidProject\GeneralBundle\Entity\IpSource;
use SquidProject\GeneralBundle\Entity\Source;
use SquidProject\GeneralBundle\Entity\DestinationDB;
use SquidProject\GeneralBundle\Entity\Destination;
use Symfony\Component\HttpFoundation\Response;

use SquidProject\GeneralBundle\Entity\EtatMAS;


class DestinationController extends Controller
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

    public function destAccueilAction()
    {  
        $pseudo=$this->init()->getUsername();
        return $this->render('SquidProjectGeneralBundle:Destination:destination.html.twig',array('pseudo'=>$pseudo));
    }

    public function destBlAction()
    {  
      $pseudo=$this->init()->getUsername();
        $doctrine = $this->getDoctrine();
        $blacklist=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findBy(array('type'=>0));
        
        return $this->render('SquidProjectGeneralBundle:Destination:destBl.html.twig',array('pseudo'=>$pseudo,'bl'=>$blacklist));
    }

    public function destWlAction()
    {  
        $pseudo=$this->init()->getUsername();
        
          $doctrine = $this->getDoctrine();
          $whitelist=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findBy(array('type'=>1));
          
          return $this->render('SquidProjectGeneralBundle:Destination:destWl.html.twig',array('pseudo'=>$pseudo,'wl'=>$whitelist));
      
    }

    public function destDBupAction($id){

            $em = $this->getDoctrine()->getManager();
            $db=$em->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($id);
            if($db->getType()==0){
                $db->setType(1);
                $em->flush();
                $em->clear();
                $this->turnEtatToZero();
                return $this->destBlAction();
            }
            else{
                $db->setType(0);
                $em->flush();
                $em->clear();
                $this->turnEtatToZero();
                return $this->destWlAction();
            }  
    }

    public function destNewDBAction() {   
       $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

          $em = $this->getDoctrine()->getManager();
          $db=new DestinationDB();
          $db->setNom($_POST['nom']);
          $db->setType($_POST['type']);
          $em->persist($db);
          $em->flush();
          $em->clear();
          $text = trim($_POST['file']);
          $domaines=explode("\n",$text);
          foreach ($domaines as $dom) {
            $domaine=new Domaine();
            $domaine->setIdDB($db->getId());
            $domaine->setNom($dom);
            $em->persist($domaine);
            $em->flush();
            $em->clear();
          }
          $this->setDestDBtoSG($db->getId());
          $this->turnEtatToZero();
           return $this->render('SquidProjectGeneralBundle:Destination:success.html.twig',array('pseudo'=>$pseudo));
       }
       else {
            return $this->render('SquidProjectGeneralBundle:Destination:destNewDB.html.twig',array('pseudo'=>$pseudo));

        }
    } 

    public function destNewAction() {   
        $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {

          $em = $this->getDoctrine()->getManager();
          $dest=new Destination();
          $dest->setNom($_POST['nom']);
          $dest->setIdDestinationDb($_POST['idDB']);
          $em->persist($dest);
          $em->flush();
          $em->clear();
          $this->turnEtatToZero();
           return $this->render('SquidProjectGeneralBundle:Destination:success.html.twig',array('pseudo'=>$pseudo));
       }
       else {
            
            $doctrine = $this->getDoctrine();
            $dbs=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findAll();
        
            return $this->render('SquidProjectGeneralBundle:Destination:destNew.html.twig',array('pseudo'=>$pseudo,'dbs'=>$dbs));

        }
    }

    public function destUpdateAction($id){
        $pseudo=$this->init()->getUsername();
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
          $em = $this->getDoctrine()->getManager();
          $dest=$em->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
          $dest->setNom($_POST['nom']);
          $dest->setIdDestinationDb($_POST['idDB']);
          $em->flush();
          $em->clear();
          $this->turnEtatToZero();
          return $this->render('SquidProjectGeneralBundle:Destination:success.html.twig',array('pseudo'=>$pseudo));

        }
        else{
            $doctrine = $this->getDoctrine();
            $dbs=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findAll();
            $dest=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
            return $this->render('SquidProjectGeneralBundle:Destination:destUpdate.html.twig',array('d'=>$dest, 'pseudo'=>$pseudo,'dbs'=>$dbs));

        }
    }

    public function destAllAction(){
        $pseudo=$this->init()->getUsername();
        $doctrine = $this->getDoctrine();
        $ds=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->findAll();
        return $this->render('SquidProjectGeneralBundle:Destination:destAll.html.twig',array('pseudo'=>$pseudo,'ds'=>$ds));

    }

    public function destDeleteAction($id){
        $pseudo=$this->init()->getUsername();
          $em = $this->getDoctrine()->getManager();
          $dest=$em->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
          $em->remove($dest);
          $em->flush();
          $em->clear();
          $this->turnEtatToZero();
          return $this->render('SquidProjectGeneralBundle:Destination:success.html.twig',array('pseudo'=>$pseudo));
    }

    public function DBbyDestAction($idDB){
        $doctrine = $this->getDoctrine();
        $db=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->findOneBy(array('id'=>$idDB));
        return new Response($db->getNom());
    }

    public function getNomByIdAction($id){
        $doctrine = $this->getDoctrine();
        $d=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
        return new Response($d->getNom());
    }

    public function getIdDBAction($id){
        $doctrine = $this->getDoctrine();
        $d=$doctrine->getRepository('SquidProjectGeneralBundle:Destination')->find($id);
        return new Response($d->getIdDestinationDb());
    }

    public function destDBcontentAction($id){
        $pseudo=$this->init()->getUsername();
        $doctrine = $this->getDoctrine();
        $db=$doctrine->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($id);
        $doms=$doctrine->getRepository('SquidProjectGeneralBundle:Domaine')->findBy(array("idDB"=>$id));
        return $this->render('SquidProjectGeneralBundle:Destination:destDBcontent.html.twig',array('doms'=>$doms,'pseudo'=>$pseudo,'db'=>$db));

    }

    public function destDBdomaineDelAction($idDB,$id){
        $em = $this->getDoctrine()->getManager();
        $dom=$em->getRepository('SquidProjectGeneralBundle:Domaine')->find($id);
        $em->remove($dom);
        $em->flush();
        $this->setDestDBtoSG($idDB);
        return $this->destDBcontentAction($idDB);

    }

    public function destDBdomaineAddAction($idDB){
        $pseudo=$this->init()->getUsername();
       $em = $this->getDoctrine()->getManager();
        
        $request = $this->get('request');
        if ('POST' === $request->getMethod()) {
            $count=$_POST['count'];
            for($i=1;$i<=$count;$i++){
              $domaine=new Domaine();
              $domaine->setIdDB($idDB);
              $domaine->setNom($_POST["domaine".$i]);
              $em->persist($domaine);
              $em->flush();
              $em->clear();
            }
            $this->setDestDBtoSG($idDB);
            return $this->destDBcontentAction($idDB);
        }
        else{
          $db=$em->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($idDB);
          return $this->render('SquidProjectGeneralBundle:Destination:addDomaine.html.twig',array('db'=>$db,'pseudo'=>$pseudo));
        }
    }

    public function setDestDBtoSG($idDB){
        $em = $this->getDoctrine()->getManager();
        $db=$em->getRepository('SquidProjectGeneralBundle:DestinationDB')->find($idDB);
        $db_path=$em->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array('nom'=>"dbPath"));
        $domaines=$em->getRepository('SquidProjectGeneralBundle:Domaine')->findBy(array('idDB'=>$idDB));
        $content="";
        foreach ($domaines as $domaine) {
          $content.=$domaine->getNom()."\n";
        }
        chdir($db_path->getValeur());
        shell_exec("mkdir ".$db->getNom());
        shell_exec(" chmod 777 -R ".$db->getNom());
        chdir($db->getNom());
        file_put_contents( "domains", $content);

        
    }


    public function testAction( ){
        $em = $this->getDoctrine()->getManager();
         $db_path=$em->getRepository('SquidProjectGeneralBundle:Config')->findOneBy(array('nom'=>'dbPath'));
         $path=$db_path->getValeur();
        return new Response($path);
        
    }

}


