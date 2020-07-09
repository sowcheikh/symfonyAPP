<?php

namespace App\Form;

use App\Entity\Chambre;
use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('telephone')
            ->add('datenaissance')
            ->add('boursier')
            ->add('loger')
            ->add('adresse')
            ->add('dateajout')
            ->add('occuper', EntityType::class,[
                'class'=> Chambre::class,
            'choice_label'=>function($chambre) {
                return $chambre->getNumch();
            }
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
