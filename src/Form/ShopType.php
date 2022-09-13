<?php

namespace App\Form;

use App\Entity\Shop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Nom de la boutique",
                'label_attr' => ['class' => 'coucou', 'for'=>"name",]
            ))
            ->add('image', UrlType::class, array(
                'constraints' => new NotBlank(),
                'label' => 'Image de la boutique',
                'label_attr' => ['class' => 'coucou', 'for'=>"image",]
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Description de la boutique",
                'label_attr' => ['class' => 'coucou', 'for'=>"description",]
            ))
            ->add('url', UrlType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Lien de la boutique",
                'label_attr' => ['class' => 'coucou', 'for'=>"url",]
            ))
                
            ->add('adress', TextType::class, array(
                'label' => "Adresse de la boutique",
                'label_attr' => ['class' => 'coucou', 'for'=>"adress",]
            ))
            //->add('createdAt')
            //->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Shop::class,
        ]);
    }
}
