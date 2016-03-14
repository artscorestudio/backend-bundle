<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\RouteVoter;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\TranslatorInterface;

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
	 * @var TranslatorInterface
	 */
	protected $translator;
	
	/**
	 * @param RequestStack $request
	 */
	public function __construct(RequestStack $request, $translator)
	{
		$this->request = $request;
		$this->translator = $translator;
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
		$item = $factory->createItem($this->translator->trans('Home', array(), 'asf_backend'), array('route' => 'asf_backend_homepage'));
		$menu->addChild($item);
		
		$matcher = new Matcher();
		$matcher->addVoter(new RouteVoter($this->request->getCurrentRequest()));
		$item->setCurrent($matcher->isCurrent($item));
	}
}