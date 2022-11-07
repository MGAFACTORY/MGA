<?php

namespace App\Form;

use App\Entity\Particulier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ParticulierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surname', TextType::class, ['label'=>'Nom'])
            ->add('name', TextType::class, ['label'=>'Prenom'])
            ->add('email', EmailType::class, ['label'=>'Email'])
            ->add('password', PasswordType::class, ['label'=>'Mot de passe'])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Particulier::class,
        ]);
    }
}
