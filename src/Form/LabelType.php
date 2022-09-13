<?php

namespace App\Form;

use App\Entity\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Label du jeu",
                'label_attr' => ['class' => 'coucou', 'for'=>"name",]
            ))
          /*  ->add('articles', EntityType::class, [
                'label' => 'Titre de l\'article',
                'choice_label' => 'title', // valeur de la prop à afficher dans les balises options
                'class' => Article::class,
                'multiple' => false,
                'expanded' => false,
                'required' => false,
                'mapped' => false
            ]) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Label::class,
        ]);
    }
}
