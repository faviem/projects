<?php

namespace BZ\ControllerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Requete;
use BZ\ModelBundle\Entity\ClotureRequete;
use BZ\ModelBundle\Form\ClotureRequeteType;

class ClotureController extends Controller
{
    
    public function enregistre_clotureAction($id, $exercice)
    {
            $requete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Requete')
                                      ->find($id);
            $cloture= new ClotureRequete;
            $cloture->setDateCloture(new \ Datetime());
            $cloture->setRequete($requete);
            $form = $this->createForm(new ClotureRequeteType(), $cloture); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $exo= $this->getDoctrine()->getManager()->getRepository('BZModelBundle:Exercice')->findOneBy(array('libelle'=>$cloture->getDateCloture()->format('Y')));
                    $cloture->setExercice($exo);
                    $em->persist($cloture);
                    $em->flush();
                    $requete->setEstResolu(true);
                    $requete->setClotureRequete($cloture);
                    $requete->setDateCloturer(new \ Datetime());
                    $em->flush();
                     return $this->redirect( $this->generateUrl('requetes_resolues',  array('exercice' => $exercice)));
                     }
            }
             return $this->render('BZVueBundle:Cloture:enregistre_cloture.html.twig', 
                     array('menu_num' => 5, 'id' => $id ,  'element' => $requete,  'exercice' => $exercice, 'form'   => $form->createView()));             
    }
    
    public function supprimer_clotureAction($id, $exercice)
    {
            $cloturerequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:ClotureRequete')
                                      ->find($id);
            $requete = $cloturerequete->getRequete();
            
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $requete->setEstResolu(false);
                    $requete->setDateCloturer(null);
                    $requete->setClotureRequete(null);
                    $em->flush();
                    $em->remove($cloturerequete);
                    $em->flush();
                    return $this->redirect( $this->generateUrl('requetes_encours',  array('exercice' => $exercice)));
            }
             return $this->render('BZVueBundle:Cloture:supprimer_cloture.html.twig', 
                     array('menu_num' => 5, 'id' => $id, 'element' => $requete, 'exercice' => $exercice));             
    }
    
}
