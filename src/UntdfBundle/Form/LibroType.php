<?php

namespace UntdfBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('isbn')
                ->add('edicion')
                ->add('editorial')
                ->add('resumen')
                ->add('foto' , FileType::class, array('label' => 'Foto libro'))
                ->add('vistaprevia')
                ->add('linkarchivo')
                ->add('web')
                ->add('indice')
                ->add('fechadecarga')
                ->add('idioma')
                ->add('categorias')
                ->add('autores');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UntdfBundle\Entity\Libro'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'untdfbundle_libro';
    }


}
