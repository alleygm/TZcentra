<?php

namespace App\Form\Library;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;  
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\Regex;

class BookViewFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('name', TextType::class, 
            [
                'label' => 'Наименование',
                'row_attr' => [' class' => 'w-100'],
                'attr' => [' class' => 'w-100', 'disabled' => 'true'],
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Статус',
                'row_attr' => [' class' => 'w-100'],
                'attr' => [' class' => 'w-100', 'disabled' => 'true'],
                'choices' => ['Планирую' => 'Планирую', 'Прочитал' => 'Прочитал', 'Читаю' => 'Читаю', 'Приостановил' => 'Приостановил'],
                'required' => false,
            ])
            ->add('start_at', DateType::class, [
                'label' => 'Начал',
                'row_attr' => ['class' => 'w-100'],
                'attr' => ['class' => 'w-100', 'disabled' => 'true'],
                'required' => false,
            ])
            ->add('end_at', DateType::class, [
                'label' => 'Закончил',
                'row_attr' => ['class' => 'w-100'],
                'attr' => ['class' => 'w-100', 'disabled' => 'true'],
                'required' => false,
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Комментарий',
                'row_attr' => ['class' => 'w-100'],
                'attr' => [' class' => 'w-100', 'disabled' => 'true'],
                'required' => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Сохранить изменения',
                'row_attr' => ['class' => 'w-100'],
                'attr' => [' class' => 'w-100', 'style' => 'display:none'],
            ])
            ->add('reset', ResetType::class, [
                'label' => 'Отменить изменения',
                'row_attr' => ['class' => 'w-100'],
                'attr' => [' class' => 'w-100', 'style' => 'display:none'],
            ])
            ->add('edit', ButtonType::class, [
                'label' => 'Редактировать',
                'row_attr' => ['class' => 'w-100'],
                'attr' => [' class' => 'w-100'],
            ])
            ->add('close', ButtonType::class, [
                'label' => 'Закрыть',
                'row_attr' => ['class' => 'w-100'],
                'attr' => [' class' => 'w-100'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => ['class' => 'd-flex flex-column align-items-center', 'action' => '/library', 'id' => 'book_view_form']
        ]);
    }
}   
