<?php

namespace App\Form;

use App\Entity\PositionGeographique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PositionGeographiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('latitude')
            ->add('longitude')
            ->add('positerm')
            ->add('itineraires')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PositionGeographique::class,
        ]);
    }
}
