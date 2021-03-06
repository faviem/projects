<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\UserBundle\Form\UserType;

class AgentType extends AbstractType
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
          ->add('user', new UserType(),array('label' => false, 'required' => true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\Agent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_agent';
    }
}
