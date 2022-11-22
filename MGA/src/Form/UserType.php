<?php

namespace App\Form;

use App\Entity\Pro;
use App\Entity\User;
use App\Entity\Particulier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('particulier', ChoiceType::class, [
            'choices' => [
                new Particulier('Particulier'),
                new Pro('Pro')
            ]
            ])      
        ->add('surname', TextType::class, ['label'=>'Nom'])
        ->add('name', TextType::class, ['label'=>'Prenom'])
        ->add('email', EmailType::class, ['label'=>'Email'])
        ->add('password', PasswordType::class, ['label'=>'Mot de passe'])
        //->add('confirm_password', PasswordType::class, ['label'=>'Confirmation du mot de passe'])
        ->add('save', SubmitType::class, ['label'=>'Inscription'])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
