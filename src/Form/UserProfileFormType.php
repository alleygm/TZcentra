<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FirstName', TextType::class, [
                'attr' => ['readonly' => false],
                'label' => " ",
            ])
            ->add('SecondName', TextType::class, [
                'attr' => ['readonly' => true],
                'label' => "",
            ])
            ->add('Email', TextType::class,['attr' => ['readonly' => true]])
            ->add('Roles', CollectionType::class, [ 
                'entry_options' => [],
                'entry_type' => TextType::class, // заменяем на TextType для отображения в виде инпута
                'disabled' => true,
            ])
            ->add('RegisterDate', DateType::class, [ 
                'attr' => ['readonly' => true]
            ])
            ->add('BirthDate', DateType::class, [ 
                'attr' => ['readonly' => true]
            ])
            ->add('saveButton', SubmitType::class, 
            [
                'attr' => ['style' => 'display: block;'],
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        // $resolver->setDefaults([
        //     'empty_data' => 'tttt',
        //     'data_class' => User::class,
        // ]);
    }
}
