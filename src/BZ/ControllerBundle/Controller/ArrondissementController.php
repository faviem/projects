<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Arrondissement;
use BZ\ModelBundle\Form\ArrondissementType;

class ArrondissementController extends Controller
{
    public function create_arrondissementAction()
    {
            $arrondissement= new Arrondissement;
            $arrondissement->setEstdelete(false);
            $arrondissement->setLoginpersist($this->getUser()->getUsername());
            $arrondissement->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ArrondissementType(), $arrondissement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($arrondissement);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Arrondissement:create_arrondissement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_arrondissementAction()
    {
            $arrondissements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Arrondissement')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Arrondissement:read_arrondissement.html.twig', 
                     array('menu_num' => 1, 'arrondissements' => $arrondissements));             
    }
    
    public function update_arrondissementAction($id)
    {
            $arrondissement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Arrondissement')
                                      ->find($id);
            $arrondissement->setLoginpersist($this->getUser()->getUsername());
            $arrondissement->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ArrondissementType(), $arrondissement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Arrondissement:update_arrondissement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_arrondissementAction($id)
    {
            $arrondissement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Arrondissement')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $arrondissement->setLogindelete($this->getUser()->getUsername());
                    $arrondissement->setDatedelete(new \ Datetime());
                    $arrondissement->setEstdelete(true);
                    $em->flush();
            }
            $element=$arrondissement->getLibelle();
             return $this->render('BZVueBundle:Arrondissement:delete_arrondissement.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_arrondissementAction()
    {
            $arrondissements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Arrondissement')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Arrondissement:print_arrondissement.html.twig', array( 'arrondissements' => $arrondissements));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_arrondissements.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
    
}
