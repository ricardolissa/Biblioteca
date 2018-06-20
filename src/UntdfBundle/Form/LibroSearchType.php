<?php

namespace UntdfBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UntdfBundle\Entity\Autor;
use UntdfBundle\Entity\Categoria;
use UntdfBundle\Entity\Idioma;

class LibroSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('buscar', TextType::class, ['required' => false])
        ->add('isbn', TextType::class,  ['required' => false])
        ->add('idioma', EntityType::class, ['label'=>'Idioma',
        'class' => Idioma::class,
        'choice_label' => 'nombre',
        'empty_data' => null,
        'required' => false ])
         
        ->add('categorias', EntityType::class, ['label'=>'Categoria',
        'class' => Categoria::class,
        'choice_label' => 'nombre',
        'empty_data' => null,
        'required' => false,
        'multiple' => true,
        'expanded' => false,
        'placeholder' => 'Elegir categoria'
        ])

        ->add('autores', EntityType::class, ['label'=>'Autor',
        'class' => Autor::class,
        'choice_label' => 'nombre',
        'empty_data' => null,
        'required' => false, ]);
    


    }

}
