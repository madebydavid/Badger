<?php

namespace Badger\Form {
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Validator\Constraints as Assert;
    
    class RecipientType extends AbstractType {
        
        public function buildForm(FormBuilderInterface $builder, array $options) {
            
            $builder->add('name', 'text', array(
                    'constraints' => new Assert\NotBlank()
            ))
            ->add('email', 'text', array(
                    'constraints' => array(new Assert\NotBlank(), new Assert\Email())
            ));
            
        }
        
        public function getName() {
            return str_replace('\\', '_', __CLASS__);
        }
        
        public function getDefaultOptions(array $options) {
            return array(
                'data_class' => 'Model\Recipient'
            );
        }
        
    }
    
}
