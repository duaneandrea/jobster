<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\UserProfile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('currentPassword', PasswordType::class,[
                'attr'=>[
                    'placeholder'=>'Current Password'
                ],
                'label'=>'Current Password'
            ])
            ->add('newPassword', PasswordType::class,[
                'attr'=>[
                    'placeholder'=>'New Password'
                ],
                'label'=>'New Password'
            ])
            ->add('conNewPassword',PasswordType::class,[
                'attr'=>[
                    'placeholder'=>'Confirm New Password'
                ],
                'label'=>'Confirm New Password'
            ])
        ;
    }

}
