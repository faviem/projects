<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Quartier;
use BZ\ModelBundle\Form\QuartierType;

class QuartierController extends Controller
{
    public function create_quartierAction()
    {
            $quartier= new Quartier;
            $quartier->setEstdelete(false);
            $quartier->setLoginpersist($this->getUser()->getUsername());
            $quartier->setDatepersist(new \ Datetime());
            $form = $this->createForm(new QuartierType(), $quartier); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($quartier);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Quartier:create_quartier.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_quartierAction()
    {
            $quartiers= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Quartier:read_quartier.html.twig', 
                     array('menu_num' => 1, 'quartiers' => $quartiers));             
    }
    
    public function update_quartierAction($id)
    {
            $quartier= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->find($id);
            $quartier->setLoginpersist($this->getUser()->getUsername());
            $quartier->setDatepersist(new \ Datetime());
            $form = $this->createForm(new QuartierType(), $quartier); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Quartier:update_quartier.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_quartierAction($id)
    {
            $quartier= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $quartier->setLogindelete($this->getUser()->getUsername());
                    $quartier->setDatedelete(new \ Datetime());
                    $quartier->setEstdelete(true);
                    $em->flush();
            }
            $element=$quartier->getLibelle();
             return $this->render('BZVueBundle:Quartier:delete_quartier.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_quartierAction()
    {
            $quartiers= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Quartier')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Quartier:print_quartier.html.twig', array( 'quartiers' => $quartiers));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_quartiers.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
    
}
