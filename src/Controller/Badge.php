<?php

namespace Controller {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Validator\Constraints as Assert;

    class Badge implements ControllerProviderInterface {
        
        public function connect(Application $app) {
            $controller = $app['controllers_factory'];
            $controller->get("/{id}/", array($this, 'index'))->assert('id', '\d+')->bind('badge');
            $controller->post("/{id}/", array($this, 'save'))->assert('id', '\d+');
            return $controller;
        }

        public function index(Application $app, $id) {

            $badge = $this->getBadge($app, $id);
            $form = $this->getForm($app, $badge);
            
            return $app['twig']->render('badge.twig', array(
                    'form' => $form->createView(),
                    'badge' => $badge
            ));
            
        }
        
        public function save(Application $app, $id) {
            
            $badge = $this->getBadge($app, $id);
            $form = $this->getForm($app, $badge);
            
            $form->bind($app['request']);
            
            if ($form->isValid()) {
                
                if (null !== ($file = $form['image']->getData())) {
                    
                    while (file_exists($app['config']['upload.dir'] . '/' . ($filename = sha1(uniqid(mt_rand(), true)) . '.' . $file->guessExtension()))) { }
                    
                    $file->move($app['config']['upload.dir'], $filename);
                    
                    $badge->setImageUrl(
                        $app['request']->getScheme().'://'.$app['request']->getHttpHost().$app['request']->getBasePath().'/'.$app['config']['upload.path'].'/'.$filename
                    );
                            
                }
                
                $badge->setCreatedBy($app['security']->getToken()->getUser());
                
                $app['orm.em']->persist($badge);
                $app['orm.em']->flush();
                
                return $app->redirect($app['url_generator']->generate('badges'));
                
            } 
            
            return $app['twig']->render('badge.twig', array(
                    'form' => $form->createView(),
                    'badge' => $badge
            ));
            
        }
        
        private function getBadge(Application $app, $id) {
            if (0 == $id) {
                return new \Model\Badge();
            } 
            return $app['orm.em']->getRepository('Model\Badge')->findOneById($id);
        }
        
        private function getForm(Application $app, \Model\Badge $badge) {
            return $app['form.factory']->create(new \Badger\Form\BadgeType(), $badge);
        }
        
    }
}