<?php
namespace Acme\ProjectManagerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DependencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('taskId', 'text');
        $builder->add('onStatus', 'text');
        $builder->add('doStatus', 'text');
    }

    public function getName()
    {
        return 'dependency';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'Acme\ProjectManagerBundle\Entity\Dependency',
        ));
    }
}

?>