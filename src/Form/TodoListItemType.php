<?php

namespace App\Form;

use App\Entity\TodoListItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TodoListItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'attr' => [
                        'class' => \implode(
                            ' ',
                            [
                                'appearance-none',
                                'bg-transparent',
                                'border-none',
                                'w-full',
                                'text-grey-darker',
                                'mr-3',
                                'py-1',
                                'px-2',
                                'leading-tight',
                                'focus:outline-none',
                            ]
                        ),
                        'maxlength' => 255,
                        'placeholder' => 'Create a new item ...',
                        'required' => true,
                    ],
                ]
            )
            ->add(
                'submit',
                SubmitType::class,
                [
                    'attr' => [
                        'class' => \implode(
                            ' ',
                            [
                                'flex-no-shrink',
                                'bg-teal',
                                'hover:bg-teal-dark',
                                'border-teal',
                                'hover:border-teal-dark',
                                'text-sm',
                                'border-4',
                                'text-white',
                                'py-1',
                                'px-2',
                                'rounded',
                            ]
                        ),
                    ],
                    'label' => 'Add',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'attr' => [
                    'class' => 'w-full',
                ],
                'data_class' => TodoListItem::class,
            ]
        );
    }
}
