<?php

namespace BZ\ModelBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BZ\ModelBundle\Form\AdresseContactType;
class StructureSoustutelleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text', array(
            'label' => 'Nom Structure',
             'attr' =>array(
            'class' =>'form-control'
            )))
            ->add('raisonsociale', 'text', array(
            'label' => 'Raison sociale',
             'attr' =>array(
            'class' =>'form-control'
            )))
            ->add('adressecontact', new AdresseContactType(),array('label' => false, 'required' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BZ\ModelBundle\Entity\StructureSoustutelle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bz_modelbundle_structuresoustutelle';
    }
}
