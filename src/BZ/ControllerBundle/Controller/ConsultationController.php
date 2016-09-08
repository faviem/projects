<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultationController extends Controller
{
       
    public function repertoire_usagerAction()
    {
            $particuliers= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Particulier')
                                      ->findAll();
            $societeentrepises= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:SocieteEntreprise')
                                      ->findAll();
             return $this->render('BZVueBundle:Consultation:repertoire_usager.html.twig', array('societeentreprises' => $societeentrepises,'particuliers' => $particuliers,'menu_num'   => 6, 'type'   => $_GET['type']));             
    }
    
    public function contact_particulierAction($id)
    {
            $particulier= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Particulier')
                                      ->find($id);
          
             return $this->render('BZVueBundle:Consultation:contact_particulier.html.twig', 
                     array('menu_num' => 4, 'element'   => $particulier,'id' => $id ));             
    }
    
    public function contact_structureAction($id)
    {
            $societeentreprise= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:SocieteEntreprise')
                                      ->find($id);
          
             return $this->render('BZVueBundle:Consultation:contact_structure.html.twig', 
                     array('menu_num' => 4, 'element'   => $societeentreprise,'id' => $id ));             
    }
    
    public function requete_categorieAction($id, $exercice)
    {
            $types= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('typerequete'=>$id, 'exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:requete_categorie.html.twig', 
                     array('requetes' => $requetes,'id' => $id,'types' => $types,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function requete_structureAction($id, $exercice)
    {
            $structs= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('structuresoustutelle'=>$id, 'exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:requete_structure.html.twig', 
                     array('requetes' => $requetes,'id' => $id,'structures' => $structs,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function requete_departementAction($id, $exercice)
    {
            $structs= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->findBy(Array('estdelete'=>false),Array('nomdepartement'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:requete_departement.html.twig', 
                     array('requetes' => $requetes,'id' => $id,'structures' => $structs,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function statistique_categorieAction($exercice)
    {
            $typerequetes= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:statistique_categorie.html.twig', 
                     array('requetes' => $requetes,'elements' => $typerequetes,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function statistique_structureAction($exercice)
    {
            $structures= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:statistique_structure.html.twig', 
                     array('requetes' => $requetes,'elements' => $structures,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function statistique_departementAction($exercice)
    {
            $departements= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->findBy(Array('estdelete'=>false),Array('nomdepartement'=>'ASC'));
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:statistique_departement.html.twig', 
                     array('requetes' => $requetes,'elements' => $departements,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    public function consulter_requeteAction($id)
    {
             $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);

             return $this->render('BZVueBundle:Consultation:consulter_requete.html.twig', 
                     array('menu_num' => 5, 'element'   => $requete));  
             
    }
   //consulation correspondants SRU
     public function requetes_resoluescorresAction($exercice)
    {
            
            $exercices= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
               
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('structuresoustutelle'=>$this->getUser()->getDirecteurtechnique()->getStructuresoustutelle()->getId(), 'exercice' => $exercice),Array('dateEmise'=>'ASC'));
            
            return $this->render('BZVueBundle:Consultation:requetes_resoluescorres.html.twig', 
                     array('requetes' => $requetes,'exercice' => $exercice,'exercices' => $exercices,'menu_num'   => 6));             
    }
    
    
}
