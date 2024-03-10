<?php

namespace App\Form\Library;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;  
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\LessThan;

class BookAddFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('name', TextType::class, 
            [
                'label' => 'Наименование',
                'row_attr' => [' class' => 'col-md-4'],
                'attr' => [' class' => 'w-100'],
                'required' => true,
                'constraints' => [ 
                    new NotBlank(),
                ],
                
            ])
            ->add('author', TextType::class, ['label' => 'Автор', 'row_attr' => [' class' => 'col-md-4']])
            ->add('status', ChoiceType::class, [
                'label' => 'Статус',
                'row_attr' => [' class' => 'col-md-4'],
                'attr' => [' class' => 'w-100'],
                'choices' => ['Планирую' => 'Планирую', 'Прочитал' => 'Прочитал', 'Читаю' => 'Читаю', 'Приостановил' => 'Приостановил'],
            ])
            ->add('start_at', DateType::class, [
                'label' => 'Начал',
                'row_attr' => ['class' => 'col-md-4', 'style' => 'display:none'],
                'attr' => ['class' => 'w-100'],
                'required' => false,
            ])
            ->add('end_at', DateType::class, [
                'label' => 'Закончил',
                'row_attr' => ['class' => 'col-md-4', 'style' => 'display:none'],
                'attr' => ['class' => 'w-100'],
                'required' => false,
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Комментарий',
                'row_attr' => ['class' => ''],
                'attr' => ['class' => 'w-100'],
                'required' => false,
            ])
            ->add('accept', SubmitType::class, [
                'label' => 'Добавить',
                'row_attr' => ['class' => 'col-md-4'],
                'attr' => [' class' => 'w-100'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => ['class' => 'd-flex flex-column align-items-center', 'action' => '/library/add/book']
        ]);
    }
}   
