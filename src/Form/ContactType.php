<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Nom'),
                'required' =>true
            ])
            ->add('prenom',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Préom'),
                'required' =>true
            ])
            ->add('mail',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Mail'),
                'required' =>true
            ])
            ->add('telephone',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Téléphone'),
                'required' =>true
            ])
            ->add('objet',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Objet'),
                'required' =>true
            ])
            ->add('message',null,[
                'label'=>false,
                'attr'=>array('placeholder'=>'Message'),
                'required' =>true
            ])
            ->add('autorisation',null,[
                'required' =>true,
                'label'=>false,
                'attr'=>array('label'=>'erfrfgv')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
