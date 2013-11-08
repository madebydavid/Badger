<?php

namespace Controller\Backend {
	
	use Silex\Application;
	use Silex\ControllerProviderInterface;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Generator\UrlGenerator;
	
	class BadgeAssertion implements ControllerProviderInterface {
		
		public function connect(Application $app) {
			$controller = $app['controllers_factory'];
			$controller->get("/{id}/", array($this, 'index'))->assert('id', '\d+')->bind('backend-badgeassertion');
			return $controller;
		}

		public function index(Application $app, $id) {
			
			$badgeAssertion = $this->getBadgeAssertion($app, $id);
		
			return $app->json(array(
					'uid' => md5($badgeAssertion->getId()),
					'recipient' => array(
						'type' => 'email',
						'hashed' => false,
						'identity' => $badgeAssertion->getRecipient()->getEmail()
					),
					'issuedOn' => $badgeAssertion->getIssuedOn()->format(\DateTime::ISO8601),
					'badge' => $app['url_generator']->generate('backend-badge', array('id' => $badgeAssertion->getBadge()->getId()), UrlGenerator::ABSOLUTE_URL),
					'verify' => array(
						'type' => 'hosted',
						'url' => $app['url_generator']->generate('backend-badgeassertion', array('id' => $id), UrlGenerator::ABSOLUTE_URL)
					)
			));
			
			
		}
				
		private function getBadgeAssertion(Application $app, $id) {
			$badgeAssertion = $app['orm.em']->getRepository('Model\BadgeAssertion')->findOneById($id);
			if (is_null($badgeAssertion)) {
				$app->abort(404, "BadgeAssertion $id does not exist.");
			}
			return $badgeAssertion;
		}
		
	}
}