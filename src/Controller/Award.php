<?php

namespace Controller {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;

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
                    
                    $assertion = new \Model\BadgeAssertion();
                    $assertion->setRecipient($award['recipient']);
                    $assertion->setBadge($award['badge']);
                    $app['orm.em']->persist($assertion);
                    
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