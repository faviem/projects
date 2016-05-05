<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Alerte;
use BZ\ModelBundle\Form\AlerteType;

class AlerteController extends Controller
{
    public function create_alerteAction()
    {
            $alerte= new Alerte;
            $alerte->setEstdelete(false);
            $alerte->setLoginpersist($this->getUser()->getUsername());
            $alerte->setDatepersist(new \ Datetime());
            $form = $this->createForm(new AlerteType(), $alerte); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($alerte);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Alerte:create_alerte.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_alerteAction()
    {
            $alertes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Alerte')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Alerte:read_alerte.html.twig', 
                     array('menu_num' => 1, 'alertes' => $alertes));             
    }
    
    public function update_alerteAction($id)
    {
            $alerte= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Alerte')
                                      ->find($id);
            $alerte->setLoginpersist($this->getUser()->getUsername());
            $alerte->setDatepersist(new \ Datetime());
            $form = $this->createForm(new AlerteType(), $alerte); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Alerte:update_alerte.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_alerteAction($id)
    {
            $alerte= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Alerte')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $alerte->setLogindelete($this->getUser()->getUsername());
                    $alerte->setDatedelete(new \ Datetime());
                    $alerte->setEstdelete(true);
                    $em->flush();
            }
            $element=$alerte->getLibelle();
             return $this->render('BZVueBundle:Alerte:delete_alerte.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_alerteAction()
    {
            $alertes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Alerte')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Alerte:print_alerte.html.twig', array( 'alertes' => $alertes));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_alertes.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
    
}
