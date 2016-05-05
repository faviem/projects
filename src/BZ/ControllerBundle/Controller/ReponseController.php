<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\ReponseTraitementRequete;
use BZ\ModelBundle\Form\ReponseTraitementRequeteType;

class ReponseController extends Controller
{
    
    public function enregistre_reponseAction($id)
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
                  //   return $this->redirect( $this->generateUrl('traitement_requete',array('id'   =>$traitementrequete->getRequete()->getId())));
                     }
            }
             return $this->render('BZVueBundle:Reponse:enregistre_reponse.html.twig', 
                     array('menu_num' => 5, 'nbre' => $_GET['nbre'], 'id' => $id , 'form'   => $form->createView()));             
    }
    
    public function modifier_reponseAction($id)
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
                  //   return $this->redirect( $this->generateUrl('traitement_requete',array('id'   =>$traitementrequete->getRequete()->getId())));
                     }
            }
             return $this->render('BZVueBundle:Reponse:modifier_reponse.html.twig', 
                     array('menu_num' => 5, 'nbre' => $_GET['nbre'], 'id' => $id , 'form'   => $form->createView()));             
    }
    
     public function supprimer_reponseAction($id)
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
            }
             return $this->render('BZVueBundle:Reponse:supprimer_reponse.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'nbre' => $_GET['nbre']));             
    }
    
}
