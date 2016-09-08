<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\TraitementRequete;
use BZ\ModelBundle\Entity\ClotureRequete;
use BZ\ModelBundle\Form\TraitementRequeteType;
use BZ\ModelBundle\Form\ClotureRequeteType;

class TraitementController extends Controller
{
       
    public function requetes_encoursAction($exercice)
    {
        $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false));
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice'=>$exercice,'estAvorterUsagerclient'=>false,'estFonder'=>true,'estentraitement'=>true,'estResolu'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Traitement:requetes_encours.html.twig', array('requete' => $requetes,'menu_num'   => 5, 'exercice'=>$exercice, 'exercices'=>$exercices));             
    }
    
    public function requetes_soufranceAction($exercice)
    {
        $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false));
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice'=>$exercice,'estAvorterUsagerclient'=>false,'estFonder'=>true,'estentraitement'=>true,'estResolu'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Traitement:requetes_soufrance.html.twig', array('requete' => $requetes,'menu_num'   => 5, 'exercice'=>$exercice, 'exercices'=>$exercices));             
    }
    
    public function requetes_resoluesAction($exercice)
    {
            $cloturerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ClotureRequete')
                                      ->findBy(Array('exercice'=>$exercice),Array('dateCloture'=>'ASC'));
            $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false));
             return $this->render('BZVueBundle:Traitement:requetes_resolues.html.twig', array('cloturerequetes' => $cloturerequetes,'menu_num'   => 5, 'exercice'=>$exercice, 'exercices'=>$exercices));             
    }
    
    public function traitement_requeteAction($id, $exercice)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);

             return $this->render('BZVueBundle:Traitement:traitement_requete.html.twig', 
                     array('menu_num' => 5, 'element'   => $requete, 'exercice'   => $exercice));             
    }
    
    public function supprimer_traitementAction($id)
    {
            $traitementrequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->find($id);
            $requete = $traitementrequete->getRequete();
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $traitementrequete->setLogindelete($this->getUser()->getUsername());
                    $traitementrequete->setDatedelete(new \ Datetime());
                    $traitementrequete->setEstdelete(true);
                    $em->flush();
                    
                    $traitements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->findBy(Array('estdelete'=>false, 'requete'=>$requete->getId()));
                    if($traitements == null){
                        $requete->setEstentraitement(false);
                    }
                   $em->flush();
            }
             return $this->render('BZVueBundle:Traitement:supprimer_traitement.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'nbre' => $_GET['nbre']));             
    }
    
    public function cloture_requeteAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $cloture = new ClotureRequete;
            $cloture->setRequete($requete);
            $cloture->setDateCloture(new \ Datetime());
            $cloture->setEstdelete(false);
            $cloture->setLoginpersist($this->getUser()->getUsername());
            $cloture->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ClotureRequeteType(), $cloture); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setEstResolu(true);
                    $requete->setDateCloturer(new \ Datetime());
                    $em->persist($cloture);
                    $em->flush();
                     }
            }
             return $this->render('BZVueBundle:Traitement:traitement_requete.html.twig', 
                     array('menu_num' => 5, 'element'   => $requete, 'form'   => $form->createView()));             
    }
    
    public function enregistre_traitementAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $traitement= new TraitementRequete;
            $traitement->setEstdelete(false);
            $traitement->setLoginpersist($this->getUser()->getUsername());
            $traitement->setDatepersist(new \ Datetime());
            $traitement->setDateLancement(new \ Datetime());
            $traitement->setRequete($requete);
            $form = $this->createForm(new TraitementRequeteType($requete->getStructuresoustutelle()->getId()), $traitement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $traitement->setEstResolu(false);
                    $requete->setEstentraitement(true);
                    $em->persist($traitement);
                    $em->flush();
                     }
            }
             return $this->render('BZVueBundle:Traitement:enregistre_traitement.html.twig', 
                     array('menu_num' => 5, 'element'   => $requete,'id' => $id , 'form'   => $form->createView()));             
    }
       
   public function fiche_requeteclientadminAction($id)
     {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
                              $request = $this->get('request');
        if ($request->getMethod() == 'GET') {
            //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView(':plateforme:fiche_requeteclient.html.twig', array('element' => $requete));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create('P', 'A4', 'fr');
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('fiche_traitement_requete.pdf'), 200, array('Content-Type' => 'application/pdf'));
        }
    }
     
}
