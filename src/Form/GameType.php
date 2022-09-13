<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Category;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Nom du jeu",
                'label_attr' => ['class' => 'coucou', 'for'=>"name",]
            ))

            ->add('image', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => 'Image du jeu',
                'label_attr' => ['class' => 'coucou', 'for'=>"image",]
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new NotBlank(),
                'label' => 'Description du jeu',
                'label_attr' => ['class' => 'coucou', 'for'=>"description",]
            ))
            // ->add('createdAt')
            // ->add('updatedAt')
            ->add('price', MoneyType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Prix moyen constaté du jeux",
                'label_attr' => ['class' => 'coucou', 'for'=>"price",]
            ))
            ->add('category', EntityType::class, [
                'constraints' => new NotBlank(),
                'label' => 'categorie du Jeu', 
                'choice_label'=>'name',
                'class' => Category::class,
                'multiple' => false, 
                'expanded' => false,
                'required' => true, 
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"category",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ]) 
        ;
       
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
