<?php

namespace Acme\ProjectManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('name', 'text');
        $builder->add('description', 'text');
        $builder->add('projectId', 'hidden');
        $builder->add('createDate', 'datetime', array('date_widget' => "single_text", 'time_widget' => "single_text"));
        $builder->add('updateDate', 'datetime', array('date_widget' => "single_text", 'time_widget' => "single_text"));
    }

    public function getName()
    {
        return 'task';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Acme\ProjectManagerBundle\Entity\Task',
        ));
    }
}
