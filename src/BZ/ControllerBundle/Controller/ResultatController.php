<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\ResultatTraitementRequete;
use BZ\ModelBundle\Form\ResultatTraitementRequeteType;

class ResultatController extends Controller
{
    
    public function enregistre_resultatAction($id)
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
                     return $this->redirect( $this->generateUrl('traitement_requete',array('id'   =>$traitementrequete->getRequete()->getId())));
                     }
            }
             return $this->render('BZVueBundle:Resultat:enregistre_resultat.html.twig', 
                     array('menu_num' => 5, 'nbre' => $_GET['nbre'], 'id' => $id , 'form'   => $form->createView()));             
    }
    
     public function supprimer_resultatAction($id)
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
             return $this->render('BZVueBundle:Resultat:supprimer_resultat.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'nbre' => $_GET['nbre']));             
    }
    
}
