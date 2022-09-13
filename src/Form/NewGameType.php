<?php

namespace App\Form;

use App\Entity\NewGame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NewGameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Nom du jeu",
                'label_attr' => ['class' => 'coucou', 'for'=>"name",]
            ))
            ->add('url', UrlType::class, array(
                'constraints' => new NotBlank(),
                'help' => 'Url du jeu',
                'label' => "Lien du jeu",
                'label_attr' => ['class' => 'coucou', 'for'=>"url",]
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NewGame::class,
        ]);
    }
}
