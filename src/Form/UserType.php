<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Prénom'
            ])
            ->add('adresse1', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Adresse n°1'
            ])
            ->add('adresse2', TextType::class, [
                'attr' => [
                   
                    'class' => 'form-control'
                ],
                'required' => false,
                'label' => 'Adresse n°2'
            ])
            ->add('adresse3', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'label' => 'Adresse n°3'
            ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Ville '
            ])
            ->add('pays', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Pays'
            ])
            ->add('codePostal', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Code postale'
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Numero de téléphone'
            ])
            ->add('image', FileType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'label' => 'Choisissez votre image de profil !',
                'data_class' => null
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
