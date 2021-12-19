<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;

class UserSoireeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for ($i = 0; $i < $options['nbGuests']; $i++) {
            $j = $i + 1;
            $builder
                ->add('player' . $j, EntityType::class, [
                    'label' => 'Invité ' . $j,
                    'class' => User::class,
                    'choice_label' => function ($guest) {
                        return $guest->getFullName();
                    }]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'nbGuests' => 0,
        ]);
    }
}
