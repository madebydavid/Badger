<?php

namespace Controller {
	
	use Silex\Application;
	use Silex\ControllerProviderInterface;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Validator\Constraints as Assert;

	class Award implements ControllerProviderInterface {
		
		public function connect(Application $app) {
			$controller = $app['controllers_factory'];
			$controller->get("/", array($this, 'index'))->bind('award');
			$controller->post("/", array($this, 'save'));
			return $controller;
		}

		public function index(Application $app) {
			
			$form = $this->getForm($app);

			return $app['twig']->render('award.twig', array(
					'form' => $form->createView()
			));
			
		}
		
		public function save(Application $app) {
			
			$form = $this->getForm($app);
			$form->bind($app['request']);
				
			if ($form->isValid()) {
				
				$awards = $form['awards']->getData();
				
				foreach ($awards as $award) {
					
					$award['recipient']->addBadge($award['badge']);
					
					$app['orm.em']->persist($award['recipient']);
					
				}
				
				$app['orm.em']->flush();
				
				return $app['twig']->render('award_done.twig');
			} else {
				return $app['twig']->render('award.twig', array(
						'form' => $form->createView()
				));
			}
			
		}
		
		private function getForm(Application $app) {
			return $app['form.factory']->create(new \Badger\Form\AwardsType());
		}

		
	}
}