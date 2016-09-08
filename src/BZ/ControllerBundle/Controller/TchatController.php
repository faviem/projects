<?php
// src/BZ/ControllerBundle/Controller/ControllerController.php
namespace BZ\ControllerBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use BZ\ModelBundle\Entity\Message;
use BZ\ModelBundle\Entity\Emetteur;
use BZ\ModelBundle\Entity\Recepteur;
use Doctrine\ORM\EntityRepository;

class TchatController extends Controller
{
    
    public function consulter_boiteAction($id)
    {
       $messages= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Message')
                                      ->findBy(Array('objet'=>'discussion'),Array('dateEnvoi'=>'ASC'));
        return $this->render('BZVueBundle:Tchat:palette_tchat.html.twig', 
        array('menu_num'=> 2, 'id'=> $id, 'messages'=> $messages));
    }
    
    public function consulter_boiteautreAction($id)
    {
       $messages= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Message')
                                      ->findBy(Array('objet'=>'discussion'),Array('dateEnvoi'=>'ASC'));
        return $this->render('BZVueBundle:Tchat:consulter_boite.html.twig', 
        array('menu_num'=> 2, 'id'=> $id, 'messages'=> $messages));
    }
    
    public function envoyer_msgAction($id)
    {
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $em = $this->getDoctrine()->getManager();
                $messagerecus= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->findBy(Array('estdelete'=>false, 'user'=>  $this->getUser()->getId()));
                foreach ($messagerecus as $i){
                       if($i->getMessage()->getObjet()=='discussion' && $i->getMessage()->getEmetteur()->getUser()->getId()==$id){
                            $i->setEstLu(true);
                       }       
                  }
                $em->flush();
                $emetteur=new Emetteur;
                $emetteur->setUser($this->getUser());
                $message = new Message;
                $message->setEmetteur($emetteur);
                $message->setDateEnvoi(new \ Datetime());
                $message->setObjet('discussion');
                $message->setMessageEnvoi($_POST['messageTexte']);
                $recepteur = new Recepteur;
                $recepteur->setUser($this->getDoctrine() ->getManager()->getRepository('BZUserBundle:User')->find($id));       
                //$em = $this->getDoctrine()->getManager();
                $message->addRecepteur($recepteur);
                $em->persist($message);
                $em->flush();
                 $response = new Response(json_encode(array('rep' => 'ok')));
                $response->headers->set('Content-Type', 'application/json');
                return $response; 
        }
//                      
    }
   
   public function notificationsAction()
    {
         
      $usersconnectes= $this->getDoctrine()
                        ->getManager()
                        ->getRepository('BZUserBundle:User')->findBy(array('enabled' => true,'locked' => false,'isconnect' => '1' ));
      $nbreuser=0;
      foreach ($usersconnectes as $i){
          if($i->getId() != $this->getUser()->getId()){ $nbreuser++;  }
      }
     
      $messagesnonlus= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Recepteur')
                                      ->findBy(Array('estdelete'=>false, 'user'=>  $this->getUser()->getId(),'estLu'=>false),Array('datepersist'=>'DESC'));
       $nbremesg=0;
        foreach ($messagesnonlus as $i){
          $nbremesg++;  
        }
        
        $nbretraitement=0;
        if($this->getUser()->getDirecteurtechnique() !=null)
        {
            $traitements= $this->getDoctrine()
                                          ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                          ->findBy(Array('estdelete'=>false,'directeurtechnique'=>  $this->getUser()->getDirecteurtechnique()->getId()),Array('dateLancement'=>'ASC'));
              foreach ($traitements as $i){
                    if($i->getRequete()->getestFonder() == true && $i->getRequete()->getestAvorterUsagerclient() == false && $i->getRequete()->getestResolu() == false){ $nbretraitement++;  }
                }
        }
        $nonclasse=0;
        $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estdelete'=>false,'estFonder'=>null,'estentraitement'=>false));
        foreach ($requetes as $i){
          $nonclasse++;  
        }
        $classerprioritairereq=0;
        $requeteprioritaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>true,'estdelete'=>false,'estentraitement'=>false));
        foreach ($requeteprioritaires as $i){
          $classerprioritairereq++;  
        }
        $classernonprioritaire=0;
        $requetenonprioritaires= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>false,'estdelete'=>false,'estentraitement'=>false));
        foreach ($requetenonprioritaires as $i){
          $classernonprioritaire++;  
        }
        $requeteavorter=0;
        $requeteavorters= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>true,'estdelete'=>false));
        foreach ($requeteavorters as $i){
          $requeteavorter++;  
        }
        
        $nbrecloturer=0;
        $cloturerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ClotureRequete')
                                      ->findAll();
           foreach ($cloturerequetes as $i){
          $nbrecloturer++;  
        }
        $nbrerequeteencours=0;
        $requeteencours= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>true,'estentraitement'=>true,'estResolu'=>false));
          foreach ($requeteencours as $i){
          $nbrerequeteencours++;  
        }
        
        $nbrerequetesanssuite=0;
        $requetesanssuite= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>true,'estentraitement'=>true,'estResolu'=>false));
          foreach ($requetesanssuite as $i){
              $trouve=0;
               foreach ($i->getTraitementrequetes() as $j){
                   foreach ($j->getResultattraitementrequetes() as $k){ $trouve++; }
               }
          if($trouve==0) {$nbrerequetesanssuite++; }  
         }
        
        $response = new Response(json_encode(array('requetesanssuite' => $nbrerequetesanssuite,'requeteencours' => $nbrerequeteencours,'classernonprioritaire' => $classernonprioritaire,'requetecloturer' => $nbrecloturer,'requeteabandonner' => $requeteavorter,'classerprioritairereq' => $classerprioritairereq,'nonclasser' => $nonclasse,'nbreusers' => $nbreuser, 'nbremsg' => $nbremesg, 'nbretraitements' => $nbretraitement)));
            $response->headers->set('Content-Type', 'application/json');
            return $response;      
    }
    
}
