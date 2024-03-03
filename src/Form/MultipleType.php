<?php

namespace App\Form;

use App\Entity\Choix;
use App\Entity\Multiple;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultipleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('Choix', EntityType::class, [
                'class' => Choix::class,
                'choice_label' => 'nom',
                'multiple' => true,
                'autocomplete' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Multiple::class,
        ]);
    }
}
