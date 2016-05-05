<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\StructureSoustutelle;
use BZ\ModelBundle\Form\StructureSoustutelleType;

class StructuresoustutelleController extends Controller
{
    public function create_structuresoustutelleAction()
    {
            $structuresoustutelle= new StructureSoustutelle;
            $structuresoustutelle->setEstdelete(false);
            $structuresoustutelle->setLoginpersist($this->getUser()->getUsername());
            $structuresoustutelle->setDatepersist(new \ Datetime());
            $form = $this->createForm(new StructureSoustutelleType(), $structuresoustutelle); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($structuresoustutelle);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Structuresoustutelle:create_structuresoustutelle.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_structuresoustutelleAction()
    {
            $structuresoustutelles= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','raisonsociale'=>'ASC'));
             return $this->render('BZVueBundle:Structuresoustutelle:read_structuresoustutelle.html.twig', 
                     array('menu_num' => 1, 'structuresoustutelles' => $structuresoustutelles));             
    }
    
    public function update_structuresoustutelleAction($id)
    {
            $structuresoustutelle= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->find($id);
            $structuresoustutelle->setLoginpersist($this->getUser()->getUsername());
            $structuresoustutelle->setDatepersist(new \ Datetime());
            $form = $this->createForm(new StructureSoustutelleType(), $structuresoustutelle); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Structuresoustutelle:update_structuresoustutelle.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_structuresoustutelleAction($id)
    {
            $structuresoustutelle= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $structuresoustutelle->setLogindelete($this->getUser()->getUsername());
                    $structuresoustutelle->setDatedelete(new \ Datetime());
                    $structuresoustutelle->setEstdelete(true);
                    $em->flush();
            }
            $element=$structuresoustutelle->getNom().'('.$structuresoustutelle->getRaisonsociale().')';
             return $this->render('BZVueBundle:Structuresoustutelle:delete_structuresoustutelle.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_structuresoustutelleAction()
    {
            $structuresoustutelles= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:StructureSoustutelle')
                                      ->findBy(Array('estdelete'=>false),Array('nom'=>'ASC','raisonsociale'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Structuresoustutelle:print_structuresoustutelle.html.twig', array( 'structuresoustutelles' => $structuresoustutelles));
            //on appelle le service html2pdf
//            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf = $this -> get('html2pdf_factory') -> create('L', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('fullpage');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_structuresoustutelles.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
