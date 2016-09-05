<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\UsagerClient;
use BZ\ModelBundle\Entity\Particulier;
use BZ\ModelBundle\Entity\SocieteEntreprise;
use BZ\ModelBundle\Form\RequetePersMoraleType;
use BZ\ModelBundle\Form\RequetePersPhysiqueType;
use Symfony\Component\HttpFoundation\Response;

class FormulaireController extends Controller
{
    
    public function enregistre_requeteAction()
    {
            $usagerclient= new UsagerClient;
            $particulier= new Particulier;
            $societentreprise= new SocieteEntreprise;
            $particulier->setUsagerclient($usagerclient);
            $societentreprise->setUsagerclient($usagerclient);
            $requetepersonnephysique= new Requete;
            $requetepersonnephysique->setTypeusagerclient('Personne physique');
            $requetepersonnephysique->setParticulier($particulier);
            $requetepersonnephysique->setEstFonder(null);
            $requetepersonnephysique->setEstAvorterUsagerclient(false);
            $requetepersonnephysique->setEstentraitement(false);
            $requetepersonnephysique->setEstdelete(false);
            $requetepersonnephysique->setDateEmise(new \Datetime());
            $requetepersonnemorale= new Requete;
            $requetepersonnemorale->setTypeusagerclient('Personne morale');
            $requetepersonnemorale->setSocieteentreprise($societentreprise);
            $requetepersonnemorale->setEstFonder(null);
            $requetepersonnemorale->setEstAvorterUsagerclient(false);
            $requetepersonnemorale->setEstentraitement(false);
            $requetepersonnemorale->setEstdelete(false);
            $requetepersonnemorale->setDateEmise(new \Datetime());
            
            $formpersonnephysique = $this->createForm(new RequetePersPhysiqueType(), $requetepersonnephysique); 
            $formpersonnemorale = $this->createForm(new RequetePersMoraleType(), $requetepersonnemorale); 
            
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $formpersonnephysique->bind($request);
                if ($formpersonnephysique->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $exercice = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->findOneBy(array('libelle'=>$requetepersonnephysique->getDateEmise()->format('Y')));
                    $requetepersonnephysique->setExercice($exercice);
                    $em->persist($requetepersonnephysique);
                    $em->flush();
                    $requetepersonnephysique->setCodeRecepisse($requetepersonnephysique->getId().''.$requetepersonnephysique->getDateEmise()->format('i') .''.$requetepersonnephysique->getDateEmise()->format('H').''.$requetepersonnephysique->getDateEmise()->format('d'));
                    $em->flush();
                     return $this->redirect( $this->generateUrl('enregistre_requete',array('valide'   =>1,'code'   =>$requetepersonnephysique->getCodeRecepisse())));
                }
                
                $formpersonnemorale->bind($request);
                if ($formpersonnemorale->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $exercice = $this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->findOneBy(array('libelle'=>$requetepersonnemorale->getDateEmise()->format('Y')));
                    $requetepersonnemorale->setExercice($exercice);
                    $em->persist($requetepersonnemorale);
                    $em->flush();
                    $requetepersonnemorale->setCodeRecepisse($requetepersonnemorale->getId().''.$requetepersonnemorale->getDateEmise()->format('i') .''.$requetepersonnemorale->getDateEmise()->format('H').''.$requetepersonnemorale->getDateEmise()->format('d'));
                    $em->flush();
                     return $this->redirect( $this->generateUrl('enregistre_requete', array('valide'   =>2,'code'   =>$requetepersonnemorale->getCodeRecepisse())));
                }
                
            }
             if( !empty($_GET['valide']))
            {
           return $this->render('BZVueBundle:Formulaire:enregistre_requete.html.twig', 
                   array('menu_num'   => 4, 'valide'=>$_GET['valide'],'code'=>$_GET['code'], 'formpersonnemorale'   => $formpersonnemorale->createView(), 'formpersonnephysique'   => $formpersonnephysique->createView()));  
                    }
            else{
                 return $this->render('BZVueBundle:Formulaire:enregistre_requete.html.twig', 
                   array('menu_num'   => 4, 'formpersonnemorale'   => $formpersonnemorale->createView(), 'formpersonnephysique'   => $formpersonnephysique->createView()));  
                 
            }
    }
    
    //pour les requêtes
    public function requetes_attentesAction()
    {
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estdelete'=>false,'estFonder'=>null,'estentraitement'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Formulaire:requetes_attentes.html.twig', array('requete' => $requetes,'menu_num'   => 4));             
    }
    
    public function requetes_fondeesAction()
    {
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>true,'estdelete'=>false,'estentraitement'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Formulaire:requetes_fondees.html.twig', array('requete' => $requetes,'menu_num'   => 4));             
    }
    
    public function analyser_requeteAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    switch ($_GET['choix']){
                        case 1: 
                                $requete->setEstFonder(true);
                                $requete->setDateConsulter(new \Datetime());
                            break;
                        case 2: 
                                $requete->setEstFonder(false);
                                $requete->setDateConsulter(new \Datetime());
                            break;
                    }
                    $em->flush();
            }
             return $this->render('BZVueBundle:Formulaire:analyser_requete.html.twig', 
                     array('menu_num' => 4, 'element'   => $requete,'id' => $id ));        
    }
    
    public function avorter_requeteAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setCommentaireAvorterUsagerclient($_POST['message']);
                    $requete->setDateAvorterUsagerclient(new \Datetime());
                    $requete->setEstAvorterUsagerclient(true);
                    $em->flush();
            }
             return $this->render('BZVueBundle:Formulaire:avorter_requete.html.twig', 
                     array('menu_num' => 4, 'element'   => $requete,'id' => $id ));             
    }
    
    public function annuler_avorteeAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setCommentaireAvorterUsagerclient(null);
                    $requete->setDateAvorterUsagerclient(null);
                    $requete->setEstAvorterUsagerclient(false);
                    $requete->setDateEmise(new \Datetime());
                    $em->flush();
            }
             return $this->render('BZVueBundle:Formulaire:annuler_avortee.html.twig', 
                     array('menu_num' => 4, 'element'   => $requete,'id' => $id ));             
    }
    
     public function fiche_recepisseadminAction($id)
     {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
             if ($request->getMethod() == 'GET') 
            {
               
                          //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView(':plateforme:fiche_recepisse.html.twig', array('element' => $requete));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create('L', 'A5', 'fr');
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('fiche_requete.pdf'), 200, array('Content-Type' => 'application/pdf'));

            //  return $this->render('BZVueBundle::mandatcashAttestation.html.twig',array('menu_num'   =>4, 'id' => $id, 'code' => sha1($mandacah->getNumero1())));
        }
          }
             
}
