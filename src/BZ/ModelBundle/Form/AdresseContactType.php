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
            ->add('ville','entity', array('label' => 'Ville ou commune de résidence', 
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
                        
              ->add('arrondissement','entity', array('label' => 'Arrondissement', 
                'class' => 'BZModelBundle:Arrondissement',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('a')
                                          ->orderBy('a.libelle', 'ASC')
                                          ->where('a.estdelete = 0');
                        }))          
              ->add('quartier','entity', array('label' => 'Quartier de ville ou village', 
                'class' => 'BZModelBundle:Quartier',
                'property' => 'libelle',
                'empty_value' => '',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('q')
                                          ->orderBy('q.libelle', 'ASC')
                                          ->where('q.estdelete = 0');
                        }))          
            
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
