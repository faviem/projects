<?php

namespace BZ\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegistrationFormType extends AbstractType {

    protected $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class) {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);

        $builder
                ->add('username', 'text', array(
                    'attr' => array(
                        'placeholder' => 'Nom d\'utilisateur',
                    )
                ))
                ->add('email', 'email', array(
                    'attr' => array(
                        'placeholder' => 'email',
                    )
                ))
                ->add('plainPassword', 'password', array(
                    'attr' => array(
                        'placeholder' => 'Mot de passe',
                    )
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'registration',
            'translation_domain' => 'FOSUserBundle',
            'validators' => 'validators'
        ));
    }

    public function getName() {
        return 'bz_user_registration';
    }

}
