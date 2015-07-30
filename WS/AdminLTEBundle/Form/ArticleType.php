<?php

namespace WS\AdminLTEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title','text', array('required' => false))
            ->add('thumbmail', new ImageType())
            ->add('image', new ImageType())
            ->add('description','text', array('required' => false))
            ->add('ingredients','text', array('required' => false))
            ->add('contenu','ckeditor', array(
                'required' => false,
                ))
            ->add('preparation','integer', array('required' => false,'attr' => array(
                'min'=>'0',
                'max'=>'1000')))
            ->add('statut','checkbox', array('required' =>false))
            ->add('save','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WS\AdminLTEBundle\Entity\Article'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ws_adminltebundle_article';
    }
}
