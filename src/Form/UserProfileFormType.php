<?php

namespace App\Form;

use App\Entity\Countries;
use App\Entity\User;
use App\Entity\UserProfile;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName',TextType::class,[
                'attr'=>[

                ],
                'label'=>'First Name'
            ])
            ->add('lastName',TextType::class,[
                'attr'=>[

                ],
                'label'=>'Last Name'
            ])
            ->add('cellNumber',TextType::class,[
                'attr'=>[

                ],
                'label'=>'Cell Number'
            ])
            ->add('whatsApp',TextType::class,[
                'attr'=>[

                ],
                'label'=>'WhatsApp Number'
            ])
            ->add('houseAddress', TextareaType::class,[
                'attr'=>[
                    'rows'=>'4',
                ],
                'label'=>'House Address'
            ])
            ->add('userBio', TextareaType::class,[
                'attr'=>[
                    'rows'=>'4',
                ],
                'label'=>'User Biography'
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female',
                ],
                'placeholder' => 'Choose your gender', // Optional placeholder
                'required' => true, // Set to false if you want to allow an empty value
                'label' => 'Choose Gender',
            ])
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'English' => UserProfile::LANG_ENGLISH,
                    'Spanish' => UserProfile::LANG_SPANISH,
                    'Shona' => UserProfile::LANG_SHONA,
                ],
                'placeholder' => 'Choose your language', // Optional placeholder
                'required' => true, // Set to false if you want to allow an empty value
                'label' => 'Language', // Optional label
                'attr' => ['class' => 'form-control'], // Optional class for styling
                'data' => $options['data']->getLanguage(), // Set default value from the entity
            ])
            ->add('countryId', EntityType::class, [
                'class' => Countries::class,
                'choice_label' => 'name', // Display the country name in the dropdown
                'placeholder' => 'Choose your country', // Optional placeholder
                'required' => true, // Set to false if you want to allow an empty value
                'label' => 'Country', // Optional label
                'attr' => ['class' => 'form-control'], // Optional class for styling
                'data' => $options['data']->getCountryId(), // Set default value from the entity
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserProfile::class,
        ]);
    }
}
