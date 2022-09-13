<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Badge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BadgeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image', UrlType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Image du badge",
                'label_attr' => ['class' => 'coucou', 'for' => "image",]


            ))
           /* ->add('users', EntityType::class, [
                'label' => 'Nom de l\'utilisateur',
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => User::class,
                'multiple' => false,
                'expanded' => true,
                'required' => false,
                'mapped' => false,
                'label_attr' => ['class' => 'coucou', 'for' => "image",]
            ]) */
            ; 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Badge::class,
        ]);
    }
}
