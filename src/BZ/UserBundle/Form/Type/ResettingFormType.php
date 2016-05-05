<?php

namespace BZ\UserBundle\Form\Type;

use FOS\UserBundle\Form\Type\ResettingFormType as BaseResettingFormType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ResettingFormType extends BaseResettingFormType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
            'options' => array('translation_domain' => 'FOSUserBundle'),
            'first_options' => array('label' => 'form.new_password', 'attr' => array('size' => 60)),
            'second_options' => array('label' => 'form.new_password_confirmation', 'attr' => array('size' => 60)),
            'invalid_message' => 'fos_user.password.mismatch',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'resetting',
        ));
    }

    public function getName()
    {
        return 'speedwapp_user_resetting';
    }
}
