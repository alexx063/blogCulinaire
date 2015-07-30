<?php

namespace WS\AdminLTEBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TopRecetteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('top1', 'entity', array(
                'class'    => 'WSAdminLTEBundle:Article',
                'property' => 'title',
                'multiple' => false))
            ->add('top2', 'entity', array(
                'class'    => 'WSAdminLTEBundle:Article',
                'property' => 'title',
                'multiple' => false))
            ->add('top3', 'entity', array(
                'class'    => 'WSAdminLTEBundle:Article',
                'property' => 'title',
                'multiple' => false))
            ->add('save','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WS\AdminLTEBundle\Entity\TopRecette'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ws_adminltebundle_toprecette';
    }
}
