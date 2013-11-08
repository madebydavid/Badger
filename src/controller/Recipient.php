<?php

namespace Controller {
	
	use Silex\Application;
	use Silex\ControllerProviderInterface;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Validator\Constraints as Assert;

	class Recipient implements ControllerProviderInterface {
		
		public function connect(Application $app) {
			$controller = $app['controllers_factory'];
			$controller->get("/{id}/", array($this, 'index'))->assert('id', '\d+')->bind('recipient');
			$controller->post("/{id}/", array($this, 'save'))->assert('id', '\d+');
			return $controller;
		}

		public function index(Application $app, $id) {

			$recipient = $this->getRecipient($app, $id);
			$form = $this->getForm($app, $recipient);
			
			return $app['twig']->render('recipient.twig', array(
					'form' => $form->createView()
			));
			
		}
		
		public function save(Application $app, $id) {
			
			$recipient = $this->getRecipient($app, $id);
			$form = $this->getForm($app, $recipient);
			
			$form->bind($app['request']);
			
			if ($form->isValid()) {
				
				$app['orm.em']->persist($recipient);
				$app['orm.em']->flush();
				
				return $app->redirect($app['url_generator']->generate('recipients'));
				
			} 
			
			return $app['twig']->render('recipient.twig', array(
					'form' => $form->createView()
			));
			
		}
		
		private function getRecipient(Applciation $app, $id) {
			if (0 == $id) {
				return new \Model\Recipient();
			} 
			return $app['orm.em']->getRepository('Model\Recipient')->findOneById($id);
		}
		
		private function getForm(Application $app, \Model\Recipient $recipient) {
			return $app['form.factory']->create(new \Badger\Form\RecipientType(), $recipient);
		}
		
	}
}