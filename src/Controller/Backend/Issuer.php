<?php

namespace Controller\Backend {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;

    class Issuer implements ControllerProviderInterface {
        
        public function connect(Application $app) {
            
            $controller = $app['controllers_factory'];
            
            $controller->get("/", array($this, 'index'))->bind('backend-issuer');
            
            return $controller;
        }

        public function index(Application $app) {
            
            return $app->json(array(
                    'name' => $app['config']['badges.issuer.name'],
                    'url' => $app['request']->getScheme().'://'.$app['request']->getHttpHost().$app['request']->getBasePath().'/'
            ));
            
            
        }
        
        
    }
}