<?php

namespace Controller {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Generator\UrlGenerator;
    
    class Issue implements ControllerProviderInterface {
        
        public function connect(Application $app) {
            $controller = $app['controllers_factory'];
            $controller->get("/{id}/", array($this, 'index'))->assert('id', '\d+')->bind('issue');
            return $controller;
        }

        public function index(Application $app, $id) {

        	$badgeAssertion = $this->getBadgeAssertion($app, $id);
        	
            return $app['twig']->render('issue.twig', array(
            	'assertionUrl' => $app['url_generator']->generate('backend-badgeassertion', array('id' => $id), UrlGenerator::ABSOLUTE_URL)        
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