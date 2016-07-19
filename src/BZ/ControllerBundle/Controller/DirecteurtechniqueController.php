<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\DirecteurTechnique;
use BZ\UserBundle\Entity\User;
use BZ\ModelBundle\Form\DirecteurTechniqueType;
use BZ\ModelBundle\Entity\ResultatTraitementRequete;
use BZ\ModelBundle\Form\ResultatTraitementRequeteType;

class DirecteurtechniqueController extends Controller
{
    public function create_directeurtechniqueAction()
    {
            
            $newuser = new User;
            $newuser->setEnabled(true);
            $newuser->setType('DRTS');
            $profil= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->findOneBy(Array('code'=>'ROLE_RT'));
            $newuser->setProfil($profil);
            $directeurtechnique= new DirecteurTechnique;
            $directeurtechnique->setEstdelete(false);
            $directeurtechnique->setLoginpersist($this->getUser()->getUsername());
            $directeurtechnique->setDatepersist(new \ Datetime());
            $directeurtechnique->setUser($newuser);
            $form = $this->createForm(new DirecteurTechniqueType(), $directeurtechnique); 
            $request = $this->get('request');
            if($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                      $em->persist($newuser);
                    $em->flush();
                    $em->persist($directeurtechnique);
                    $em->flush();
                    $newuser->setDirecteurtechnique($directeurtechnique);
                     $em->flush();
                    return $this->redirect( $this->generateUrl('read_directeurtechnique'));
                }
            }
             return $this->render('BZVueBundle:Directeurtechnique:create_directeurtechnique.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'profil'  =>  $profil));             
    }
    
    public function read_directeurtechniqueAction()
    {
            $directeurtechniques= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','prenom'=>'ASC'));
             return $this->render('BZVueBundle:Directeurtechnique:read_directeurtechnique.html.twig', 
                     array('menu_num' => 2, 'directeurtechniques' => $directeurtechniques));             
    }
    
    public function update_directeurtechniqueAction($id)
    {
            $directeurtechnique= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->find($id);
            $directeurtechnique->setLoginpersist($this->getUser()->getUsername());
            $directeurtechnique->setDatepersist(new \ Datetime());
            $form = $this->createForm(new DirecteurTechniqueType(), $directeurtechnique); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $userManager = $this->get('fos_user.user_manager');
                    $userManager->reloadUser($directeurtechnique->getUser());
                        return $this->redirect( $this->generateUrl('read_directeurtechnique'));
                }
            }
//            $motpasse= $directeurtechnique->getUser()->getPlainPassword();
             return $this->render('BZVueBundle:Directeurtechnique:update_directeurtechnique.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'id' => $id));             
    }
    
    public function compte_directeurtechniqueAction()
    {
        
            $directeurtechnique= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->findOneBy(Array('user'=>$this->getUser()->getId()));
            $directeurtechnique->setLoginpersist($this->getUser()->getUsername());
            $directeurtechnique->setDatepersist(new \ Datetime());
            $form = $this->createForm(new DirecteurTechniqueType(), $directeurtechnique); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                    $userManager = $this->get('fos_user.user_manager');
                    $userManager->reloadUser($directeurtechnique->getUser());
                   return $this->redirect( $this->generateUrl('page_accueil'));
                }
            }
//            $motpasse= $directeurtechnique->getUser()->getPlainPassword();
             return $this->render('BZVueBundle:Directeurtechnique:compte_directeurtechnique.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView()));             
    }
    
    public function delete_directeurtechniqueAction($id)
    {
            $directeurtechnique= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $directeurtechnique->setLogindelete($this->getUser()->getUsername());
                    $directeurtechnique->setDatedelete(new \ Datetime());
                    $directeurtechnique->setEstdelete(true);
                    $directeurtechnique->getUser()->setEnabled(false);
                    $directeurtechnique->getUser()->setLocked(true);
//                    $userManager = $this->get('fos_user.user_manager');
//                    $userManager->reloadUser($directeurtechnique->getUser());
                    $em->flush();
            }
            $element='Compte : '.$directeurtechnique->getNom().'  '.$directeurtechnique->getPrenom();
             return $this->render('BZVueBundle:Directeurtechnique:delete_directeurtechnique.html.twig', 
                     array('menu_num' => 2,'id' => $id, 'element' => $element ));             
    }
    
    public function edit_directeurtechniqueAction($id)
    {
            $directeurtechnique= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->find($id);
            
             return $this->render('BZVueBundle:Directeurtechnique:edit_directeurtechnique.html.twig', 
                     array('menu_num' => 2, 'element' => $directeurtechnique ));             
    }
    
    public function print_directeurtechniqueAction()
    {
            $directeurtechniques= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:DirecteurTechnique')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','prenom'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Directeurtechnique:print_directeurtechnique.html.twig', array( 'directeurtechniques' => $directeurtechniques));
            //on appelle le service html2pdf
//            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf = $this -> get('html2pdf_factory') -> create('L', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('fullpage');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_directeurtechniques.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
    //pour les traitements de requête
    public function read_traitementAction()
    {
            $traitements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->findBy(Array('estdelete'=>false,'directeurtechnique'=>  $this->getUser()->getDirecteurtechnique()->getId()),Array('dateLancement'=>'ASC'));
             return $this->render('BZVueBundle:Directeurtechnique:read_traitement.html.twig', 
                     array('menu_num' => 2, 'traitements' => $traitements));             
    }
    
    public function voir_traitementAction($id)
    {
            $traitement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->find($id);
             return $this->render('BZVueBundle:Directeurtechnique:voir_traitement.html.twig', 
                     array('menu_num' => 2, 'element' => $traitement));             
    }
    
    public function resultat_traitementAction($id)
    {
            $traitement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->find($id);
             return $this->render('BZVueBundle:Directeurtechnique:resultat_traitement.html.twig', 
                     array('menu_num' => 2, 'element' => $traitement));             
    }
    
    public function ajouter_resultattraitementAction($id)
    {
            $traitementrequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TraitementRequete')
                                      ->find($id);
            $resultat= new ResultatTraitementRequete;
            $resultat->setEstdelete(false);
            $resultat->setLoginpersist($this->getUser()->getUsername());
            $resultat->setDatepersist(new \ Datetime());
            $resultat->setDateResultat(new \ Datetime());
            $resultat->setTraitementrequete($traitementrequete);
            $form = $this->createForm(new ResultatTraitementRequeteType(), $resultat); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($resultat);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('resultat_traitement',array('id'   =>$traitementrequete->getId())));
                   }
            }
             return $this->render('BZVueBundle:Directeurtechnique:ajouter_resultattraitement.html.twig', 
                     array('menu_num' => 5, 'id' => $id , 'form'   => $form->createView()));             
    }
    
     public function supprimer_resultattraitementAction($id)
    {
            $resultattraitementrequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ResultatTraitementRequete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $resultattraitementrequete->setLogindelete($this->getUser()->getUsername());
                    $resultattraitementrequete->setDatedelete(new \ Datetime());
                    $resultattraitementrequete->setEstdelete(true);
                    $em->flush();
                   
            }
             return $this->render('BZVueBundle:Directeurtechnique:supprimer_resultattraitement.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'nbre' => $_GET['nbre']));             
    }
    
}
