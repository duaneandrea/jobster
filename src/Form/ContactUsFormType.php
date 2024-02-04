<?php

namespace App\Form;

use App\Entity\ContactUs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class,[
                'attr'=>[

                ],
                'label'=>'Full Name'
            ])
            ->add('emailAddress', EmailType::class,[
                'attr'=>[

                ],
                'label'=>'Email Address'
            ])
            ->add('subject',TextType::class,[
                'attr'=>[

                ],
                'label'=>'Subject'
            ])
            ->add('message',TextareaType::class,[
                'attr'=>[

                ],
                'label'=>'Message'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactUs::class,
        ]);
    }
}
