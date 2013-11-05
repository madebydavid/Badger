<?php

namespace Controller {
	
	use Silex\Application;
	use Silex\ControllerProviderInterface;
	use Symfony\Component\HttpFoundation\Response;

	class Recipients implements ControllerProviderInterface {
		
		const RECIPIENTS_PER_PAGE = 10;
		
		public function connect(Application $app) {
			$controller = $app['controllers_factory'];
			$controller->get("/", array( $this, 'index' ) )->bind('recipients');
			return $controller;
		}

		public function index(Application $app) {
			
			/* simple pagination */
			$pageIndex = (int)$app['request']->get('pageIndex');
			
			$recipients = $app['orm.em']->getRepository('Model\Recipient')
				->findBy(array(), array(), \Controller\Recipients::RECIPIENTS_PER_PAGE, \Controller\Recipients::RECIPIENTS_PER_PAGE * $pageIndex);
			
			$totalRecipientsCount = $app['orm.em']->createQuery('SELECT COUNT(r.id) FROM Model\Recipient r')
				->getSingleScalarResult();
			
			$maxPageIndex = (int)($totalRecipientsCount / \Controller\Recipients::RECIPIENTS_PER_PAGE);
			
			return $app['twig']->render('recipients.twig', array(
					'recipients' => $recipients,
					'pageIndex' => $pageIndex,
					'maxPageIndex' => $maxPageIndex
			));
			
		}
		
	}
}