<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) 2012-2015 Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\RouteVoter;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Backend Menu Subscriber
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class MenuSubscriber implements EventSubscriberInterface
{
	/**
	 * @var RequestStack
	 */
	protected $request;
	
	/**
	 * @param RequestStack $request
	 */
	public function __construct(RequestStack $request)
	{
		$this->request = $request;
	}
	
	/**
	 * Subscribed Events
	 */
	public static function getSubscribedEvents()
	{
		return array(
			 BackendEvents::NAVBAR_MENU_INIT => array('onNavbarMenuInit', 0)
		);
	}

	/**
	 * @param NavbarMenuEvent $event
	 */
	public function onNavbarMenuInit(NavbarMenuEvent $event)
	{
		$menu = $event->getMenu();
		$factory = $event->getFactory();
		
		// Home link
		$item = $factory->createItem('Home', array('route' => 'asf_backend_homepage'));
		$menu->addChild($item);
		
		$matcher = new Matcher();
		$matcher->addVoter(new RouteVoter($this->request->getCurrentRequest()));
		$item->setCurrent($matcher->isCurrent($item));
	}
}