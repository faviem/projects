<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultationController extends Controller
{
       
    public function statistiques_requetesAction()
    {
         $typerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $structuresoustutelles= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','raisonsociale'=>'ASC'));
             return $this->render('BZVueBundle:Consultation:statistiques.html.twig', 
                     array('menu_num'   => 6, 'structuresoustutelles' => $structuresoustutelles, 'categories' => $typerequetes)); 
    }
    
       
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
    
    public function requete_categorieAction($id)
    {
            $type= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('typerequete'=>$id),Array('dateEmise'=>'ASC'));
            return $this->render('BZVueBundle:Consultation:requete_categorie.html.twig', 
                     array('requetes' => $requetes,'id' => $id,'types' => $type,'menu_num'   => 6));             
    }
    
    public function requete_structureAction($id)
    {
            $structs= $this->getDoctrine()
                                       ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC'));
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('structuresoustutelle'=>$id),Array('dateEmise'=>'ASC'));
            return $this->render('BZVueBundle:Consultation:requete_structure.html.twig', 
                     array('requetes' => $requetes,'id' => $id,'structures' => $structs,'menu_num'   => 6));             
    }
    
    public function consulter_requeteAction($id)
    {
             $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);

             return $this->render('BZVueBundle:Consultation:consulter_requete.html.twig', 
                     array('menu_num' => 5, 'element'   => $requete));  
             
    }
    
    
    
}
