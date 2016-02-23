<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) 2012-2015 Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use ASF\BackendBundle\Event\BackendEvents;
use ASF\BackendBundle\Event\NavbarMenuEvent;
use ASF\BackendBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Knp Menu Builder
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class MenuBuilder
{
	/**
	 * @var FactoryInterface
	 */
	protected $factory;
	
	/**
	 * @var EventDispatcher
	 */
	protected $eventDispatcher;
	
	/**
	 * @var RequestStack
	 */
	protected $request;
	
	/**
	 * @param FactoryInterface         $factory
	 * @param EventDispatcherInterface $event_dispatcher
	 * @param RequestStack             $request
	 */
	public function __construct(FactoryInterface $factory, EventDispatcherInterface $event_dispatcher, $request)
	{
		$this->factory = $factory;
		$this->eventDispatcher = $event_dispatcher;
		$this->request = $request;
	}
	
	/**
	 * Navbar Menu
	 * 
	 * @param array $options
	 */
	public function createNavbarMenu(array $options)
	{
		$menu = $this->factory->createItem('root');
		
		$this->eventDispatcher->dispatch(BackendEvents::NAVBAR_MENU_INIT, new NavbarMenuEvent($menu, $this->factory));
		
		return $menu;
	}
	
	/**
	 * Sidebar Menu
	 *
	 * @param array $options
	 */
	public function createSidebarMenu(array $options)
	{
		$menu = $this->factory->createItem('root');
	
		$this->eventDispatcher->dispatch(BackendEvents::SIDEBAR_MENU_INIT, new SidebarMenuEvent($menu, $this->factory));
	
		return $menu;
	}
}