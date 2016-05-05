<?php

/**
 * Description of ProfileFormType
 *
 * @author akambi
 */

namespace BZ\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use BZ\UserBundle\Form\Type\ResettingFormType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileFormType extends BaseType
{
    protected $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        parent::__construct($class);
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // Ajoute le champ personnalisé aux formulaires de mise à jour du profile
        $builder
            ->add('civility', 'choice', array(
                'label' => 'form.civility',
                'required' => false,
                'choices' => array('M.' => 'M.', 'Mme' => 'Mme'),
                'empty_value' => 'Civilité',
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('lastName', 'text', array(
                'label' => 'form.lastName',
                'required' => true,
                'attr' => array(
                    'maxlength' => '255'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('firstName', 'text', array(
                'label' => 'form.firstName',
                'required' => true,
                'attr' => array(
                    'maxlength' => '255'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('birthdate', 'birthday', array(
                'label' => 'form.birthdate',
                'required' => false,
                'translation_domain' => 'FOSUserBundle',
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'd/M/y',
                'attr' => array(
                    'class' => 'date'
                )
                )
            )
            ->add('addressPart1', 'text', array(
                'label' => 'form.addressPart1',
                'required' => false,
                'attr' => array(
                    'maxlength' => '255'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('addressPart2', 'text', array(
                'label' => 'form.addressPart2',
                'required' => false,
                'attr' => array(
                    'maxlength' => '255'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('zipCode', 'text', array(
                'label' => 'form.zipCode',
                'attr' => array(
                    'maxlength' => '5'
                ),
                'required' => false,
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('cityName', 'text', array(
                'label' => 'form.cityName',
                'required' => false,
                'attr' => array(
                    'maxlength' => '255'
                ),
                'translation_domain' => 'FOSUserBundle')
            )
            ->add('landlineNumber', 'text', array(
                'label' => 'form.landlineNumber',
                'required' => false,
                'attr' => array(
                    'maxlength' => '11'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('mobilePhone', 'text', array(
                'label' => 'form.mobilePhone',
                'required' => false,
                'attr' => array(
                    'maxlength' => '11'
                ),
                'translation_domain' => 'FOSUserBundle'
                )
            )
            ->add('password', new ResettingFormType($this->class), array(
                'required' => false,
                'virtual' => true
            ))
            ->add('desabonner', 'submit', array(
                'label' => 'profile.edit.unsubscribe',
                'translation_domain' => 'FOSUserBundle',
                'attr' => array(
                    'class' => 'btn primary',
                    'formnovalidate' => 'formnovalidate',
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention' => 'profile',
        ));
    }

    public function getName()
    {
        return 'bz_user_profile';
    }
}
