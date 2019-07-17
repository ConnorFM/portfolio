<?php

namespace App\Form;

use App\Entity\ProfessionalExperiences;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfessionalExperiencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('societyName')
            ->add('startDate', DateType::class)
            ->add('endDate', DateType::class)
            ->add('description')
//            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProfessionalExperiences::class,
        ]);
    }
}
