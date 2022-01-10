<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isbn',null,[
                'label' => false,
                'attr'=>[
                    'placeholder' => 'L\'ISBN',
                ],
            ])
            ->add('titre',null,[
                'label' => false,
                'attr'=>[
                    'placeholder' => 'Titre de l\'oeuvre',
                ]
            ])
            ->add('nombre_pages',null,[
                'label' => false,
                'attr'=>[
                    'placeholder' => 'Nombre de pages',
                    'min'=>1,
                    'max'=>10000
                ]
            ])
            ->add('date_de_parution',DateType::class,[
                'widget' => 'single_text',
                
                'label' => false,
            ])
            ->add('note',ChoiceType::class,[
                'label' => false,
                'choices' => [
                    '1/20'=>1,
                    '2/20'=>2,
                    '3/20'=>3,
                    '4/20'=>4,
                    '5/20'=>5,
                    '6/20'=>6,
                    '7/20'=>7,
                    '8/20'=>8,
                    '9/20'=>9,
                    '10/20'=>10,
                    '11/20'=>11,
                    '12/20'=>12,
                    '13/20'=>13,
                    '14/20'=>14,
                    '15/20'=>15,
                    '16/20'=>16,
                    '17/20'=>17,
                    '18/20'=>18,
                    '19/20'=>19,
                    '20/20'=>20,
                ]
            ])
            ->add('Genres',null,[
                'label' => false,
            ])
            ->add('Auteurs',null,[
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
