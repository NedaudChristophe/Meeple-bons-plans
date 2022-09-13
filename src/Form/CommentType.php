<?php

namespace App\Form;

use App\Entity\Deal;
use App\Entity\User;
use App\Entity\Comment;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('comment', TextareaType::class, array(
                'label' => 'Commentaire de l\'utilisateur',
                'constraints' => new NotBlank(),
                'label_attr' => ['class' => 'coucou', 'for'=>"comment",]
            ))
           // ->add('createdAt')
           // ->add('updatedAt')
            ->add('user', EntityType::class, [
                'label' => 'Nom de l\'utilisateur',
                'choice_label' => 'name', // valeur de la prop à afficher dans les balises options
                'class' => User::class,
                'multiple' => false,
                'expanded' => false,
                'required' => false,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"user",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.name', 'ASC');
                },
            ]) 
            ->add('deal', EntityType::class, [
                'label' => 'Nom Du bon plan',
                'choice_label' => 'title', // valeur de la prop à afficher dans les balises options
                'class' => Deal::class,
                'multiple' => false,
                'expanded' => false,
                'required' => true,
                'mapped' => true,
                'label_attr' => ['class' => 'coucou', 'for'=>"deal",],
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('d')
                        ->orderBy('d.title', 'ASC');
                },
            ]) 
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
