<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use \Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use \AppBundle\Repository\ProductRepository;

/**
 * Description of CustomerType
 *
 * @author oberfreak
 */
class SingleOrderType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $fields = $builder->add('name', TextType::class, array('label' => 'Name', 'attr' => array('placeholder' => 'Fill in your name')));
        $fields = $builder->add('product', EntityType::class, array('label' => 'Product',
            'class' => 'AppBundle:Product',
            'query_builder' => function (ProductRepository $er) {
                return $er->createQueryBuilder('p')
                                ->where('p.active = true')
                                ->orderBy('p.name');
            }, 'choice_label' => 'displayName',
            'group_by' => function($val, $key, $index) {
                $group = $val->getGroup();
                if (isset($group))
                    return $group->getName();
                else
                    return "General";
            }));
        $fields = $builder->add('text', TextType::class, array('label' => 'Pizza Changes, Pasta Type (Machheroni, Gnochi, Spaghetti, Tortellini)', 'attr' => array('placeholder' => 'Add your changes')));
        $readOnly = false;
        if (isset($options['read_only'])) {
            $readOnly = $options['read_only'];
        }
        if (!$readOnly) {
            $fields->add('save', SubmitType::class, array('label' => 'Save', 'attr' => array('class' => 'btn btn-success')));
        }
        $fields->add('cancel', SubmitType::class, array('label' => 'Cancel', 'attr' => array('class' => 'btn btn-danger', 'formnovalidate' => 'formnovalidate')));
    }

    public function configureOptions(\Symfony\Component\OptionsResolver\OptionsResolver $resolver) {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SingleOrder'
        ));
    }

}
