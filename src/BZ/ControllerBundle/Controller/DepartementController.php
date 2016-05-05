<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Departement;
use BZ\ModelBundle\Form\DepartementType;

class DepartementController extends Controller
{
    public function create_departementAction()
    {
            $departement= new Departement;
            $departement->setEstdelete(false);
            $departement->setLoginpersist($this->getUser()->getUsername());
            $departement->setDatepersist(new \ Datetime());
            $form = $this->createForm(new DepartementType(), $departement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($departement);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Departement:create_departement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_departementAction()
    {
            $departements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->findBy(Array('estdelete'=>false),Array('nomdepartement'=>'ASC'));
             return $this->render('BZVueBundle:Departement:read_departement.html.twig', 
                     array('menu_num' => 1, 'departements' => $departements));             
    }
    
    public function update_departementAction($id)
    {
            $departement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->find($id);
            $departement->setLoginpersist($this->getUser()->getUsername());
            $departement->setDatepersist(new \ Datetime());
            $form = $this->createForm(new DepartementType(), $departement); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Departement:update_departement.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_departementAction($id)
    {
            $departement= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $departement->setLogindelete($this->getUser()->getUsername());
                    $departement->setDatedelete(new \ Datetime());
                    $departement->setEstdelete(true);
                    $em->flush();
            }
            $element=$departement->getNomdepartement();
             return $this->render('BZVueBundle:Departement:delete_departement.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_departementAction()
    {
            $departements= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Departement')
                                      ->findBy(Array('estdelete'=>false),Array('nomdepartement'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Departement:print_departement.html.twig', array( 'departements' => $departements));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_departements.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
