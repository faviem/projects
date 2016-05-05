<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\UserBundle\Form\UserDirecteurType;
use Doctrine\ORM\EntityRepository;

class DirecteurTechniqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('nom', 'text', array(
            'label' => 'Nom',
             'attr' =>array(
            'class' =>'form-control'
              )))
          ->add('prenom', 'text', array(
            'label' => 'Prénom(s)',
             'attr' =>array(
            'class' =>'form-control'
             )))
          ->add('sexe', 'choice', 
                    array(
                        'choices' => array(
                            'M' => 'Masculin',
                            'F' => 'Féminin'
                        ),
                        'label' => 'Sexe',
                        'required'    => true,
                        'attr' =>array('class' =>'form-control chzn-select'),
                        'empty_value' => '--Choisissez le sexe--',
                        'empty_data'  => null
                    ))
          ->add('structuresoustutelle','entity', array('label' => 'Structure sous tutelle', 
                'class' => 'BZModelBundle:StructureSoustutelle',
                'property' => 'nom',
                'empty_value' => '--Choisissez la structure sous-tutelle--',
                'multiple' => false,
                'attr' =>array('class' =>'form-control chzn-select'),
                'required' => true,
                'query_builder' => function(EntityRepository $er )  {
                                return $er->createQueryBuilder('s')
                                          ->orderBy('s.nom', 'ASC')
                                          ->where('s.estdelete = 0');
                        }))
          ->add('user', new UserDirecteurType(),array('label' => false, 'required' => true))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\DirecteurTechnique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_directeurtechnique';
    }
}
