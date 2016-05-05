<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Profil;
use BZ\ModelBundle\Form\ProfilType;

class ProfilController extends Controller
{
    
    public function read_profilAction()
    {
            $profils= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->findBy(Array(),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Profil:read_profil.html.twig', 
                     array('menu_num' => 2, 'profils' => $profils));             
    }
    
    public function update_profilAction($id)
    {
            $profil= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->find($id);
            $profil->setLoginpersist($this->getUser()->getUsername());
            $profil->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ProfilType(), $profil); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Profil:update_profil.html.twig', 
                     array('menu_num' => 2, 'form'   => $form->createView(),'id' => $id ));             
    }

    public function print_profilAction()
    {
            $profils= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Profil')
                                      ->findBy(Array(),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Profil:print_profil.html.twig', array( 'profils' => $profils));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_profils.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
