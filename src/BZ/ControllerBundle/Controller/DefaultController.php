<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\UsagerClient;
use BZ\ModelBundle\Entity\Particulier;
use BZ\ModelBundle\Entity\SocieteEntreprise;
use BZ\ModelBundle\Form\RequetePersonneMoraleType;
use BZ\ModelBundle\Form\RequetePersonnePhysiqueType;
use BZ\ModelBundle\Entity\ReponseTraitementRequete;
use BZ\ModelBundle\Form\ReponseTraitementRequeteType;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         
        if (!$this->isGranted('ROLE_USER')) {
            
           $modesaisine= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ModeSaisine')
                                      ->findOneBy(Array('libelle'=>'Plate-forme SysGERUC'));
            $usagerclient= new UsagerClient;
            $particulier= new Particulier;
            $societentreprise= new SocieteEntreprise;
            $particulier->setUsagerclient($usagerclient);
            $societentreprise->setUsagerclient($usagerclient);
            $requetepersonnephysique= new Requete;
            $requetepersonnephysique->setTypeusagerclient('Personne physique');
            $requetepersonnephysique->setModesaisine($modesaisine);
            $requetepersonnephysique->setParticulier($particulier);
             $requetepersonnephysique->setEstFonder(null);
            $requetepersonnephysique->setEstAvorterUsagerclient(false);
            $requetepersonnephysique->setEstentraitement(false);
            $requetepersonnephysique->setEstdelete(false);
            $requetepersonnephysique->setDateEmise(new \Datetime());
            
            $requetepersonnemorale= new Requete;
            $requetepersonnemorale->setTypeusagerclient('Personne morale');
            $requetepersonnemorale->setModesaisine($modesaisine);
            $requetepersonnemorale->setSocieteentreprise($societentreprise);
            $requetepersonnemorale->setEstFonder(null);
            $requetepersonnemorale->setEstAvorterUsagerclient(false);
            $requetepersonnemorale->setEstentraitement(false);
            $requetepersonnemorale->setEstdelete(false);
            $requetepersonnemorale->setDateEmise(new \Datetime());
            
            $formpersonnephysique = $this->createForm(new RequetePersonnePhysiqueType(), $requetepersonnephysique); 
            $formpersonnemorale = $this->createForm(new RequetePersonneMoraleType(), $requetepersonnemorale); 
            
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'cloturerequete'=>null),Array('dateEmise'=>'DESC'));
            
            $quartiers= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->findBy(Array('estdelete'=>false));
            $arrondissements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->findBy(Array('estdelete'=>false));
            
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
                     return $this->redirect( $this->generateUrl('page_accueil',array('valide'   =>1,'id'   =>$requetepersonnephysique->getId())));
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
                     return $this->redirect( $this->generateUrl('page_accueil', array('valide'   =>2,'id'   =>$requetepersonnemorale->getId())));
                }
                
            }
            if( !empty($_GET['valide']))
            {
                $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($_GET['id']);
                 return $this->render(':plateforme:index.html.twig',
                   array('menu'   => 1,'quartiers'   => $quartiers, 'arrondissements'   => $arrondissements,  'requete' => $requetes, 'valide'=>$_GET['valide'],'code'=>$requete->getCodeRecepisse(),'id'=>$_GET['id'],'codecacher'=>sha1($requete->getCodeRecepisse()),'formpersonnemorale'   => $formpersonnemorale->createView(), 'formpersonnephysique'   => $formpersonnephysique->createView()));
            }
            else{
           return $this->render(':plateforme:index.html.twig',
                   array('menu'   => 1, 'quartiers'   => $quartiers, 'arrondissements'   => $arrondissements, 'requete' => $requetes,'formpersonnemorale'   => $formpersonnemorale->createView(), 'formpersonnephysique'   => $formpersonnephysique->createView()));
            }
        }
        else
        {
            $userManager = $this->get('fos_user.user_manager');
            $user = $userManager->findUserBy(array('id' => $this->getUser()->getId()));
            $user->setIsconnect(1);
            $userManager->updateUser($user);
            $userManager->reloadUser($user);
            return $this->render('BZUserBundle::layout.html.twig',array('menu_num' =>0 ));
        }
    }
    //pour les requêtes

    public function authentifier_requeteAction($id)
    {
          $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
           $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                if($requete->getCodeRecepisse()==$_POST['CodeRecepisse']){
                    
                       return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $id,'element' => $requete,'code' => sha1($_POST['CodeRecepisse'])));             
                
                }else{
                   return $this->render(':plateforme:authentifier_requete.html.twig', array('menu' => 2,'id' => $id,'element' => $requete,'code' => $_POST['CodeRecepisse']));             
                }
            }
          return $this->render(':plateforme:authentifier_requete.html.twig', array('menu' => 2,'id' => $id,'element' => $requete,'code' => ''));             
    }
    
    public function fermer_requeteAction()
    {
          
             return $this->render(':plateforme:fermer_requete.html.twig');             
     }
     
    public function retour_requeteAction($id)
    {
          $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
             return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $id,'element' => $requete,'code' => sha1($requete->getCodeRecepisse())));             
     }
    
    public function statistiquesAction()
    {
            $typerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $structuresoustutelles= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','raisonsociale'=>'ASC'));
             return $this->render(':plateforme:statistiques.html.twig', 
                     array('menu' => 3, 'structuresoustutelles' => $structuresoustutelles, 'categories' => $typerequetes));
    }
    
    //les réponses de traitements
     public function enregistre_reponsetraitementAction($id)
    {
            $traitementrequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->find($id);
            $reponse= new ReponseTraitementRequete;
            $reponse->setDateReponse(new \ Datetime());
            $reponse->setTraitementrequete($traitementrequete);
            $form = $this->createForm(new ReponseTraitementRequeteType(), $reponse); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($reponse);
                    $em->flush();
                    $traitementrequete->setReponsetraitementrequete($reponse);
                    $em->flush();
                
                    return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $traitementrequete->getRequete()->getId(),'element' => $traitementrequete->getRequete(),'code' => sha1($traitementrequete->getRequete()->getCodeRecepisse())));  
                }
            }
             return $this->render(':plateforme:enregistre_reponsetraitement.html.twig', 
                     array('menu_num' => 5, 'element' =>$traitementrequete, 'nbre' => $_GET['nbre'], 'id' => $id , 'form'   => $form->createView()));             
    }
    
    public function modifie_reponsetraitementAction($id)
    {
            $reponse= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ReponseTraitementRequete')
                                      ->find($id);
            $form = $this->createForm(new ReponseTraitementRequeteType(), $reponse); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $reponse->setDateReponse(new \ Datetime());
                    $em->flush();
                 
                    return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $reponse->getTraitementrequete()->getRequete()->getId(),'element' => $reponse->getTraitementrequete()->getRequete(),'code' => sha1($reponse->getTraitementrequete()->getRequete()->getCodeRecepisse())));  
               
                 }
            }
             return $this->render(':plateforme:modifie_reponsetraitement.html.twig', 
                     array('menu_num' => 5, 'element' =>$reponse->getTraitementrequete(),'nbre' => $_GET['nbre'], 'id' => $id , 'form'   => $form->createView()));             
    }
    
     public function supprime_reponsetraitementAction($id)
     {
            $reponsetraitementrequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ReponseTraitementRequete')
                                      ->find($id);
            $traitement= $reponsetraitementrequete->getTraitementrequete();
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $traitement->setReponsetraitementrequete(null);
                    $em->flush();
                    $em->remove($reponsetraitementrequete);
                    $em->flush();
                 return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $traitement->getRequete()->getId(),'element' => $traitement->getRequete(),'code' => sha1($traitement->getRequete()->getCodeRecepisse())));  
               
            }
             return $this->render(':plateforme:supprime_reponsetraitement.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'idrequete' => $traitement->getRequete()->getId(), 'nbre' => $_GET['nbre']));             
     }
     
     public function fiche_requeteclientAction($id)
     {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
             if ($request->getMethod() == 'GET') 
            {
                 if(isset($_GET['code'])){
                        if(sha1($requete->getCodeRecepisse())==$_GET['code'])
                            {
                            
                          //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
                          $html = $this->renderView(':plateforme:fiche_requeteclient.html.twig',  array('element'   => $requete));
                          //on appelle le service html2pdf
                          $html2pdf = $this->get('html2pdf_factory')->create('P', 'A4', 'fr');
                          $html2pdf->setTestTdInOnePage(false);
                          //real : utilise la taille réelle
                          $html2pdf->pdf->SetDisplayMode('real');
                          //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
                          $html2pdf->writeHTML($html);
                          //Output envoit le document PDF au navigateur internet
                          return new Response($html2pdf->Output('fiche_requete.pdf'), 200, array('Content-Type' => 'application/pdf'));
                    }
                 else {
                      
                     return $this->render(':plateforme:erreur_fiche.html.twig',array());
                     }
                //  return $this->render('BZVueBundle::mandatcashAttestation.html.twig',array('menu_num'   =>3, 'id' => $id, 'code' => sha1($mandacah->getNumero1())));
             }else{
                 
             }
          }
             
     }
     
     public function fiche_recepisseAction($id)
     {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
             if ($request->getMethod() == 'GET') 
            {
                 if(isset($_GET['codecacher'])){
                        if(sha1($requete->getCodeRecepisse())==$_GET['codecacher'])
                            {
                            
                          //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
                          $html = $this->renderView(':plateforme:fiche_recepisse.html.twig',  array('element'   => $requete));
                          //on appelle le service html2pdf
                          $html2pdf = $this->get('html2pdf_factory')->create('L', 'A5', 'fr');
                          $html2pdf->setTestTdInOnePage(false);
                          //real : utilise la taille réelle
                          $html2pdf->pdf->SetDisplayMode('real');
                          //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
                          $html2pdf->writeHTML($html);
                          //Output envoit le document PDF au navigateur internet
                          return new Response($html2pdf->Output('fiche_requete.pdf'), 200, array('Content-Type' => 'application/pdf'));
                    }
                 else {
                      
                     return $this->render(':plateforme:erreur_fiche.html.twig',array());
                     }
                //  return $this->render('BZVueBundle::mandatcashAttestation.html.twig',array('menu_num'   =>3, 'id' => $id, 'code' => sha1($mandacah->getNumero1())));
             }else{
                 
             }
          }
             
     }
    
    //cloture de la requete par le client
        public function avorter_requeteclientAction($id)
        {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setCommentaireAvorterUsagerclient('Annuler spontanement par l\'usager/client');
                    $requete->setDateAvorterUsagerclient(new \Datetime());
                    $requete->setEstAvorterUsagerclient(true);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('fermer_requete'));
                //    return $this->render(':plateforme:usagerclient_requete.html.twig', array('menu' => 2,'id' => $id,'element' => $requete));  
            }
             return $this->render(':plateforme:avorter_requeteclient.html.twig', 
                     array('menu_num' => 3, 'element'   => $requete,'id' => $id ));              
    }
    
}
