<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;

class RegistreController extends Controller
{
       
    public function requetes_fondeesAction()
    {
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>true,'estentraitement'=>false,'estdelete'=>false ),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Registre:requetes_fondees.html.twig', array('requete' => $requetes,'menu_num'   => 4));             
    }
    
    public function requetes_nonfondeesAction()
    {
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>false,'estFonder'=>false,'estentraitement'=>false,'estdelete'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Registre:requetes_nonfondees.html.twig', array('requete' => $requetes,'menu_num'   => 4));             
    }
    
     public function requetes_avorteesAction()
    {
            $requetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->findBy(Array('estAvorterUsagerclient'=>true,'estdelete'=>false),Array('dateEmise'=>'ASC'));
             return $this->render('BZVueBundle:Formulaire:requetes_avortees.html.twig', array('requete' => $requetes,'menu_num'   => 4));             
    }
    
    
    public function declarer_nonfondeeAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setEstFonder(false);
                    $requete->setDateConsulter(new \Datetime());
                    $em->flush();
            }
             return $this->render('BZVueBundle:Registre:declarer_nonfondee.html.twig', 
                     array('menu_num' => 4, 'element'   => $requete,'id' => $id ));             
    }
    
    public function declarer_fondeeAction($id)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setEstFonder(true);
                    $requete->setDateConsulter(new \Datetime());
                    $em->flush();
            }
             return $this->render('BZVueBundle:Registre:declarer_fondee.html.twig', 
                     array('menu_num' => 4, 'element'   => $requete,'id' => $id ));             
    }

    
}
