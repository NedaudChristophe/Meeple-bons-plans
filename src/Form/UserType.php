<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Badge;
use App\Entity\Avatar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('name', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Nom de l'utilisateur",
                'label_attr' => ['class' => 'coucou', 'for'=>"name",]
            ))
            ->add('email', EmailType::class, array(
                    'constraints' => new NotBlank(),
                    'label' => "Adresse mail de l'utilisateur",
                    'label_attr' => ['class' => 'coucou', 'for'=>"email",]
                ))
            
             ->add('password', PasswordType::class, [
                        
                        'label' => "Mot de passe",
                        'mapped' => true,
                        'required' => true,
                       /* 'help'=> "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial", */
                    //'always_empty' => false,
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Veuillez entrer un mot de passe',
                            ]),
                            new Length([
                                'min' => 4,
                                'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères.',
                                // max length allowed by Symfony for security reasons
                                'max' => 4096,
                            ]),
                          /*  new Regex(
                                 "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
                                 "Le mot de passe doit contenir au minimum 8 caractères, une majuscule, un chiffre et un caractère spécial"
                             ), */
                        ],
                        'label_attr' => ['class' => 'coucou', 'for'=>"password",]
                    ]) 
                    
            ->add('confirmPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => "Confirmer le mot de passe",
                'mapped' => false,
                'required' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"confirmPassword",]

            ])
                

               
                ->add('roles', ChoiceType::class,
                [   
                    'label' => "Rôle de l'utilisateur",
                    'choices' => [
                        'user' => 'ROLE_USER',
                        'admin' => 'ROLE_ADMIN',
                        'manager' => 'ROLE_MANAGER',
                    ],
                    "multiple" => true,
                    // radio buttons or checkboxes
                    "expanded" => false,
                    'label_attr' => ['class' => 'coucou', 'for'=>"roles",]
                ])
                
                    
                
                
                
            
            ->add('badge', EntityType::class, [
                'label' => 'Choisir le ou les badge(s)',
                'choice_label' => 'image', // valeur de la prop à afficher dans les balises options
                'class' => Badge::class,
                'multiple' => true,
                'expanded' => false,
                'mapped' => true,
                'required' => false,
                'label_attr' => ['class' => 'coucou ', 'for'=>"badge",]
            ])
            ->add('avatar', EntityType::class, [
                'label' => 'Choisir votre avatar',
                'choice_label' => 'image', // valeur de la prop à afficher dans les balises options
                'class' => Avatar::class,
                'multiple' => false,
                'expanded' => false,
                'mapped' => true,
                'required' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"avatar",]
            ])
            ->add('isActive', ChoiceType::class, [
                
                'choices' => [
                    'Inactif' => 0,
                    'Actif' => 1,
                    
                ],
                'label_attr' => ['class' => 'coucou', 'for'=>"isActive",]
                
                ]) 
           /* ->add('createdAt', DateType::class, [
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
                 ])
            ->add('updatedAt')*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
