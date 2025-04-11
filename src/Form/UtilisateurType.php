<?php

namespace App\Form;

use App\Entity\Conversation;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('role')
            ->add('adresse')
            ->add('motDePasse')
            ->add('statut')
            ->add('isconfirmed')
            ->add('faceData')
            ->add('resetToken')
            ->add('resetTokenExpiry', null, [
                'widget' => 'single_text',
            ])
            ->add('conversation', EntityType::class, [
                'class' => Conversation::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
