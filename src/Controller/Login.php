<?php

namespace Controller {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Validator\Constraints as Assert;

    class Login implements ControllerProviderInterface {
        
        public function connect(Application $app) {
            $controller = $app['controllers_factory'];
            
            $controller->get('/', array($this, 'index'))->bind('login');
            $controller->get('/check', array($this, 'check'))->bind('loginCheck');
            $controller->post('/', array($this, 'login'));
            
            return $controller;
        }
        
        public function check(Application $app) {
            
        }
        
        public function index(Application $app) {
            
            
            
            return $app['twig']->render('login.twig', array(
                    'error' => $app['security.last_error']($app['request']),
                    'lastUsername' => $app['session']->get('_security.last_username')
            ));
            
        }
        
        public function login(Application $app) {
            
            $form = $this->getForm($app);
            
            $form->bind($app['request']);
            
            if ($form->isValid()) {
                
                
                return $app->redirect($app['url_generator']->generate('/'));
                
            } 
            
            return $app['twig']->render('login.twig', array(
                    'form' => $form->createView(),
                    'error' => $app['security.last_error']($app['request']),
                    'lastUsername' => $app['session']->get('_security.last_username')
            ));
            
        }
        
        private function getForm(Application $app) {
            return $app['form.factory']->create(new \Badger\Form\LoginType());
        }
        
    }
}