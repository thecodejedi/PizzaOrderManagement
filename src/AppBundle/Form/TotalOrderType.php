<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Description of CustomerType
 *
 * @author oberfreak
 */
class TotalOrderType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $fields = $builder->add('text', TextType::class, array('label' => 'Description'));
        $fields = $builder->add('active', CheckboxType::class, array('label' => 'Open'));
        $readOnly = false;
        if (isset($options['read_only'])) {
            $readOnly = $options['read_only'];
        }
        if(!$readOnly){
            $fields->add('save', SubmitType::class, array('label' => 'Create new Total Order','attr' => array('class'=>'btn btn-success')));
        }
        $fields->add('cancel', SubmitType::class, array('label' => 'Cancel','attr' => array('class'=>'btn btn-danger')));
    }
    
    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver) {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\TotalOrder'
        ));
    }
}
