<?php

namespace App\Form;

use App\Entity\OnderdeelApparaat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OnderdeelApparaatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Percentage')
            ->add('OnderdeelId')
            ->add('ApparaatId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OnderdeelApparaat::class,
        ]);
    }
}
