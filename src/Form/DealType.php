<?php

namespace App\Form;


use App\Entity\Deal;
use App\Entity\Game;
use App\Entity\Shop;


use App\Entity\Type;
use App\Entity\User;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class DealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('status', ChoiceType::class, [
            'label' => 'Status du bon plan',
            'choices' => [
                'Inactif' => 0,
                'Actif' => 1,
            ],
            'label_attr' => ['class' => 'coucou switch-custom', 'for'=>"status",],
            'expanded' => true,
              
            
            
        ]) 
            ->add('title', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Titre du bon plan",
                'label_attr' => ['class' => 'coucou', 'for'=>"title",]
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new NotBlank(),
                'label' => 'Description du bon plan',
                'label_attr' => ['class' => 'coucou', 'for'=>"description",]
            ))
            ->add('url', UrlType::class, [
                'label' => 'Lien du bon plan',
                'constraints' => new NotBlank(),
                'label_attr' => ['class' => 'coucou', 'for'=>"url",]
            ])    
             
                


            ->add('offerPrice', MoneyType::class, array(
                'label' => "Prix soldé du produit",
                'label_attr' => ['class' => 'coucou', 'for'=>"offerPrice",]
            ))    
            

            ->add('shippingCost', MoneyType::class, array(
                'label' => "Tarif des frais de port",
                'label_attr' => ['class' => 'coucou', 'for'=>"shippingCost",]
            ))
                

            ->add('promoCode', TextType::class, array(
                'label' => "Code promo",
                'label_attr' => ['class' => 'coucou', 'for'=>"promoCode",]
            ))
            ->add('endDeal', DateType::class, [
                'input' => 'datetime',
                'widget' => 'single_text',
                'label' => "Date de fin du bon plan",
                'label_attr' => ['class' => 'coucou', 'for'=>"endDeal",]
                 ])
           // ->add('createdAt')
           // ->add('updatedAt')
            
            ->add('shop', EntityType::class, [
                'label' => 'Nom de la boutique',
                'constraints' => new NotBlank(),
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => Shop::class,
                'multiple' => false,
                'expanded' => false,
                'required' => true,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"shop",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->orderBy('s.name', 'ASC');
                },
            ]) 
            ->add('type', EntityType::class,[
                'label' => 'Choisir le type de promotion du jeu',
                'constraints' => new NotBlank(),
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => Type::class,
                'multiple' => false,
                'expanded' => false,
                'required' => false,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"type",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.name', 'ASC');
                },
            ])
            ->add('game', EntityType::class,[
                'label' => 'Choisir le jeu',
                'constraints' => new NotBlank(),
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => Game::class,
                'multiple' => false,
                'expanded' => false,
                'required' => true,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"game",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('g')
                        ->orderBy('g.name', 'ASC');
                },
            ])

            ->add('user', EntityType::class,[
                'label' => 'Choisir l\'utilisateur',
                'constraints' => new NotBlank(),
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => User::class,
                'multiple' => false,
                'expanded' => false,
                'required' => true,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"user",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
            ])
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Deal::class,
        ]);
    }
}
