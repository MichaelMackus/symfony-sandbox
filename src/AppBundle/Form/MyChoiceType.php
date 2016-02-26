<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use AppBundle\Data\MyValueObject;

/**
 * A test of value object selector choice type.
 */
class MyChoiceType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MyValueObject::class,
            'choices' => $this->getChoices(),
            'choices_as_values' => true,
        ]);
    }

    public function getParent()
    {
        return 'choice';
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'my_choice_type';
    }

    private function getChoices()
    {
        return [
            '-- please select --' => '',
            '1' => new MyValueObject('object 1'),
            '2' => new MyValueObject('object 2'),
            '3' => new MyValueObject('object 3'),
        ];
    }
}
