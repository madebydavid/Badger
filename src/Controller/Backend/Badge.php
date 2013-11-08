<?php

namespace Controller\Backend {
	
	use Silex\Application;
	use Silex\ControllerProviderInterface;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Generator\UrlGenerator;
	
	class Badge implements ControllerProviderInterface {
		
		public function connect(Application $app) {
			$controller = $app['controllers_factory'];
			$controller->get("/{id}/", array($this, 'index'))->assert('id', '\d+')->bind('backend-badge');
			$controller->get("/{id}/criteria", array($this, 'criteria'))->assert('id', '\d+')->bind('backend-badge-criteria');
			return $controller;
		}

		public function index(Application $app, $id) {
			
			$badge = $this->getBadge($app, $id);
		
			return $app->json(array(
					'name' => $badge->getName(),
					'description' => $badge->getDesc(),
					'image' => $badge->getImageUrl(),
					'issuer' => $app['url_generator']->generate('backend-issuer', array(), UrlGenerator::ABSOLUTE_URL),
					'criteria' => $app['url_generator']->generate('backend-badge-criteria', array('id' => $id), UrlGenerator::ABSOLUTE_URL),
			));
			
		}
		
		public function criteria(Application $app, $id) {
			$badge = $this->getBadge($app, $id);
			return $badge->getCriteria();
		}
		
		private function getBadge(Application $app, $id) {
			$badge = $app['orm.em']->getRepository('Model\Badge')->findOneById($id);
			if (is_null($badge)) {
				$app->abort(404, "Badge $id does not exist.");
			}
			return $badge;
		}
		
	}
}