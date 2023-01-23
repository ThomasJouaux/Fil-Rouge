<?php

namespace App\Form;


use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un email',
                    ]),
                    new Regex([
                        'pattern' => '/^([a-zA-Z0-9\-\.]+@[a-zA-Z0-9\-\.]+\.[a-z]{2,5})$/',
                        'match' => true,
                        'message' => 'Veuillez entrer votre email correctement (exemple:exemple@exemple.fr)'
                    ])
                ],
                'label' => 'E-Mail'
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre nom',
                    ]),
                    new Regex([
                        'pattern' => '/^[A-Z][A-Za-z\é\è\ê\-]+$/',
                        'match' => true,
                        'message' => 'Votre nom doit comporter que des lettres'
                    ]),
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre Prénom',
                    ]),
                    new Regex([
                        'pattern' => '/^[A-Z][A-Za-z\é\è\ê\-]+$/',
                        'match' => true,
                        'message' => 'Votre Prénom doit comporter que des lettres'
                    ]),
                ],
                'label' => 'Prénom'
            ])
            ->add('adresse1', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre adresse',
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s,-]+$/',
                        'match' => true,
                        'message' => 'Votre adresse ne doit pas comporter de caractères spéciaux'
                    ])
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
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre ville',
                    ]),
                    new Regex([
                        'pattern' => '/^[A-Z][A-Za-z\é\è\ê\-]+$/',
                        'match' => true,
                        'message' => 'Votre ville est mal orthographié'
                    ])
                    ],
                'label' => 'Ville '
            ])
            ->add('pays', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre Pays',
                    ]),
                    new Regex([
                        'pattern' => '/^[A-Z][A-Za-z\é\è\ê\-]+$/',
                        'match' => true,
                        'message' => 'Votre Pays est mal orthographié'
                    ])
                    ],
                'label' => 'Pays'
            ])
            ->add('codePostal', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre code postal',
                    ]),
                    New Regex([
                        'pattern' => '/[0-9]{5}/',
                        'match' => true,
                        'message' => 'Votre code postal doit contenir 5 chiffres'
                    ])
                    ],
                'label' => 'Code postale'
            ])
            ->add('telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Numero de téléphone'
            ])
            ->add('dateNaissance', DateType::class, [
                'attr' => [
                    'class' => 'form-control'

                ],
                'widget' => 'single_text',
                'label' => 'Date de naissance',
                'html5' => true
            ])
            ->add('image', FileType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Choisissez votre image de profil !'
            ])
            ->add('sexe', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Sexe : H/F/A',
                'expanded' => false,
                'choices'  => [
                    'Homme' => "H",
                    'Femme' => "F",
                    'Ne sais pas encore...' => null,
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
                'label' => 'En m\'inscrivant à ce site j\'accepte les CGU'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => [
                    'class' => 'form-control'

                ]],
                'required' => true,
                'first_options'  => ['label' => 'Entrez un mot de passe'],
                'second_options' => ['label' => 'Repetez le mot de passe'],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe ne doit pas faire moins de {{ limit }} caractéres',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
