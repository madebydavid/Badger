<?php

namespace Badger\Form {
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Validator\Constraints as Assert;
	
	class AwardsType extends AbstractType {
		
		public function buildForm(FormBuilderInterface $builder, array $options) {
			
			$builder->add('awards', 'collection', array(
					'type' => new AwardType(),
					'allow_add' => true,
					'allow_delete' => true
			));
			
		}
		
		public function getName() {
			return str_replace('\\', '_', __CLASS__);
		}
		
		public function getDefaultOptions(array $options) {
			return array(
			
			);
		}
		
	}
	
}
