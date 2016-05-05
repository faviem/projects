<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ParticulierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text',array('label' => 'Votre Nom', 'required' => true,'attr' =>array('class' =>'form-control')))
            ->add('prenom','text',array('label' => 'Votre Prénom ', 'required' => true,'attr' =>array('class' =>'form-control')))
            ->add('profession','text',array('label' => 'Votre Profession ', 'required' => true,'attr' =>array('class' =>'form-control')))
            ->add('usagerclient', new UsagerClientType(),array('label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\Particulier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_particulier';
    }
}
