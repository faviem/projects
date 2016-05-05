<?php

namespace BZ\ControllerBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BZ\ModelBundle\Entity\TypeRequete;
use BZ\ModelBundle\Form\TypeRequeteType;

class TyperequeteController extends Controller
{
    public function create_typerequeteAction()
    {
            $typerequete= new TypeRequete;
            $typerequete->setEstdelete(false);
            $typerequete->setLoginpersist($this->getUser()->getUsername());
            $typerequete->setDatepersist(new \ Datetime());
            $form = $this->createForm(new TypeRequeteType(), $typerequete); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($typerequete);
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:TypeRequete:create_typerequete.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView()));             
    }
    
    public function read_typerequeteAction()
    {
            $typerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             return $this->render('BZVueBundle:TypeRequete:read_typerequete.html.twig', 
                     array('menu_num' => 1, 'typerequetes' => $typerequetes));             
    }
    
    public function update_typerequeteAction($id)
    {
            $typerequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->find($id);
            $typerequete->setLoginpersist($this->getUser()->getUsername());
            $typerequete->setDatepersist(new \ Datetime());
            $form = $this->createForm(new TypeRequeteType(), $typerequete); 
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                $form->bind($request);
                if ($form->isValid()) {
                    $em = $this->getDoctrine()->getManager();
                    $em->flush();
                }
            }
             return $this->render('BZVueBundle:TypeRequete:update_typerequete.html.twig', 
                     array('menu_num' => 1, 'form'   => $form->createView(),'id' => $id ));             
    }
    
    public function delete_typerequeteAction($id)
    {
            $typerequete= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->find($id);
            $request = $this->get('request');
            if ($request->getMethod() == 'POST') 
            {
                    $em = $this->getDoctrine()->getManager();
                    $typerequete->setLogindelete($this->getUser()->getUsername());
                    $typerequete->setDatedelete(new \ Datetime());
                    $typerequete->setEstdelete(true);
                    $em->flush();
            }
            $element=$typerequete->getLibelle();
             return $this->render('BZVueBundle:TypeRequete:delete_typerequete.html.twig', 
                     array('menu_num' => 1,'id' => $id, 'element' => $element ));             
    }
    
    public function print_typerequeteAction()
    {
            $typerequetes= $this->getDoctrine()
                                      ->getManager()->getRepository('BZModelBundle:TypeRequete')
                                      ->findBy(Array('estdelete'=>false),Array('libelle'=>'ASC'));
             //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
            $html = $this->renderView('BZVueBundle:TypeRequete:print_typerequete.html.twig', array( 'typerequetes' => $typerequetes));
            //on appelle le service html2pdf
            $html2pdf = $this->get('html2pdf_factory')->create();
            $html2pdf->setTestTdInOnePage(false);
            //real : utilise la taille réelle
            $html2pdf->pdf->SetDisplayMode('real');
            //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
            $html2pdf->writeHTML($html);
            //Output envoit le document PDF au navigateur internet
            return new Response($html2pdf->Output('Liste_des_typerequetes.pdf'), 200, array('Content-Type' => 'application/pdf'));
                       
    }
}
