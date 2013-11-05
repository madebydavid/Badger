<?php

namespace Badger\Form {
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\Validator\Constraints as Assert;
	
	class BadgeType extends AbstractType {
		
		public function buildForm(FormBuilderInterface $builder, array $options) {
			
			$builder->add('name', 'text', array(
					'constraints' => new Assert\NotBlank()
			))
			->add('desc', 'textarea', array(
					'constraints' => new Assert\NotBlank()
			))
			->add('criteria', 'textarea', array(
					'constraints' => new Assert\NotBlank()
			))
			->add('image', 'file', array(
					'mapped' => false,
					'constraints' => new Assert\Image(array('mimeTypes' => 'image/png', 'allowLandscape' => false, 'allowPortrait' => false))
			));
			
		}
		
		public function getName() {
			return str_replace('\\', '_', __CLASS__);
		}
		
		public function getDefaultOptions(array $options) {
			return array(
				'data_class' => 'Model\Badge'
			);
		}
		
	}
	
}
