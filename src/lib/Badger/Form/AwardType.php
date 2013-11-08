<?php

namespace Badger\Form {
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Validator\Constraints as Assert;
	
	class AwardType extends AbstractType {
		
		public function buildForm(FormBuilderInterface $builder, array $options) {
			
			$builder->add('badge', 'entity', array(
					'class' => 'Model\Badge',
					'property' => 'name',
					'constraints' => new Assert\NotBlank(),
					'empty_value' => 'Select a badge to award'
			))
			->add('recipient', 'entity', array(
					'class' => 'Model\Recipient',
					'property' => 'name',
					'constraints' => new Assert\NotBlank(),
					'empty_value' => 'Select a recipient'
			));
			
		}
		
		public function getName() {
			return str_replace('\\', '_', __CLASS__);
		}
		
		public function getDefaultOptions(array $options) {
			return array(
				'data_class' => 'Model\BadgeAssertion'
			);
		}
		
	}
	
}
