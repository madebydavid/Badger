<?php

namespace Controller {
    
    use Silex\Application;
    use Silex\ControllerProviderInterface;
    use Symfony\Component\HttpFoundation\Response;

    class Badges implements ControllerProviderInterface {
        
        const BADGES_PER_PAGE = 10;
        
        public function connect(Application $app) {
            $controller = $app['controllers_factory'];
            $controller->get("/", array( $this, 'index' ) )->bind('badges');
            return $controller;
        }

        public function index(Application $app) {
            
            /* simple pagination */
            $pageIndex = (int)$app['request']->get('pageIndex');
            
            $badges = $app['orm.em']->getRepository('Model\Badge')
                ->findBy(array(), array(), \Controller\Badges::BADGES_PER_PAGE, \Controller\Badges::BADGES_PER_PAGE * $pageIndex);
            
            $totalBadgesCount = $app['orm.em']->createQuery('SELECT COUNT(b.id) FROM Model\Badge b')
                ->getSingleScalarResult();
            
            $maxPageIndex = (int)($totalBadgesCount / \Controller\Badges::BADGES_PER_PAGE);
            
            return $app['twig']->render('badges.twig', array(
                    'badges' => $badges,
                    'pageIndex' => $pageIndex,
                    'maxPageIndex' => $maxPageIndex
            ));
            
            
        }
        
    }
}