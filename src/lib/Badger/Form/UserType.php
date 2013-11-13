<?php

namespace Badger\Form {
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Validator\Constraints as Assert;
    
    class UserType extends AbstractType {
        
        public function buildForm(FormBuilderInterface $builder, array $options) {
            
            $builder->add('username', 'text', array(
                    'constraints' => new Assert\NotBlank()
            ))->add('password', 'repeated', array(
                    'type' => 'password', 
                    'first_options' => array(
                            'label' => 'Password'
                    ),
                    'second_options' => array(
            	           'label' => 'Confirm Password'
                    ),
                    'invalid_message' => 'Passwords do not match'
            ));
            
        }
        
        public function getName() {
            return str_replace('\\', '_', __CLASS__);
        }
        
        public function getDefaultOptions(array $options) {
            return array(
                'data_class' => 'Model\User'
            );
        }
        
    }
    
}
