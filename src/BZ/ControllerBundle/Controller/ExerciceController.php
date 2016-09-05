<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\Exercice;
use BZ\ModelBundle\Form\ExerciceType;

class ExerciceController extends Controller
{
    public function create_exerciceAction()
    {
            $exercice= new Exercice;
            $exercice->setEstdelete(false);
            $exercice->setLoginpersist($this->getUser()->getUsername());
            $exercice->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ExerciceType(), $exercice); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($exercice);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Exercice:create_exercice.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_exerciceAction()
    {
            $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:Exercice:read_exercice.html.twig', 
                     array('menu_num' => 1, 'exercices' => $exercices));             
    }
    
    public function update_exerciceAction($id)
    {
            $exercice= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->find($id);
            $exercice->setLoginpersist($this->getUser()->getUsername());
            $exercice->setDatepersist(new \ Datetime());
            $form = $this->createForm(new ExerciceType(), $exercice); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:Exercice:update_exercice.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_exerciceAction($id)
    {
            $exercice= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $exercice->setLogindelete($this->getUser()->getUsername());
                    $exercice->setDatedelete(new \ Datetime());
                    $exercice->setEstdelete(true);
                    $em->flush();
            }
            $element=$exercice->getLibelle();
             return $this->render('BZVueBundle:Exercice:delete_exercice.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_exerciceAction()
    {
            $exercices= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:Exercice')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:Exercice:print_exercice.html.twig', array( 'exercices' => $exercices));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_exercices.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
    
}
