<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AdresseContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('telmobile', 'text', array(
            'label' => 'Contact(s)',
            'required' => true,
             'attr' =>array(
            'class' =>'form-control'
            )))
            ->add('email', 'email', array(
            'label' => 'e@mail (*)',
            'required' => true,
             'attr' =>array(
            'class' =>'form-control'
              )))
                
            ->add('ville','entity', array('label' => 'Ville de résidence', 
                'class' => 'BZModelBundle:Ville',
                'property' => 'nomville',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('v')
                                          ->orderBy('v.nomville', 'ASC')
                                          ->where('v.estdelete = 0');
                        }))
                        
            ->add('departement','entity', array('label' => 'Département', 
                'class' => 'BZModelBundle:Departement',
                'property' => 'nomdepartement',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('d')
                                          ->orderBy('d.nomdepartement', 'ASC')
                                          ->where('d.estdelete = 0');
                        }))
             ->add('localite', 'text', array(
            'label' => 'Localité/Quartier de résidence',
             'attr' =>array(
            'class' =>'form-control'
                 )))           
            ->add('details', 'textarea', array(
            'label' => 'Autres détails adresses',
             'attr' =>array(
            'class' =>'form-control'
             )))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\AdresseContact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_adressecontact';
    }
}
