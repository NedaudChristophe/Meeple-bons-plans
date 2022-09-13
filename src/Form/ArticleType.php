<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Label;
use App\Entity\Article;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Titre de l'actualité",
                'label_attr' => ['class' => 'coucou', 'for'=>"title",]
            ))
            ->add('image', UrlType::class, array(
                'constraints' => new NotBlank(),
                'label' => 'Image de l\'article',
                'label_attr' => ['class' => 'coucou', 'for'=>"image",]
            ))
            ->add('description', TextareaType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Résumé de l'article",
                'label_attr' => ['class' => 'coucou', 'for'=>"description",]
            ))
            ->add('content', TextareaType::class, array(
                'constraints' => new NotBlank(),
                'label' => "Contenu de l'article",
                'label_attr' => ['class' => 'coucou', 'for'=>"content",]
            ))
            //->add('createdAt')
            //->add('updatedAt')
            ->add('user', EntityType::class, [
                'label' => 'Nom de l\'utilisateur',
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
            ->add('label', EntityType::class, [
                'label' => 'Nom du ou des label(s)',
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => Label::class,
                'multiple' => true,
                'expanded' => false,
                'required' => false,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"label",], // permet d'ajouter une classe au label pour custom 
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('l')
                        ->orderBy('l.name', 'ASC');
                },
            ]) ;
                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
