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

use Symfony\Component\EventDispatcher\Event;
use Knp\Menu\FactoryInterface;
use Knp\Menu\MenuItem;

/**
 * Sidebar Menu Event
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class SidebarMenuEvent extends Event
{
	/**
	 * @var MenuItem
	 */
	protected $menu;
	
	/**
	 * @var FactoryInterface
	 */
	protected $factory;
	
	/**
	 * @param MenuItem $menu
	 * @param FactoryInterface $factory
	 */
	public function __construct($menu, FactoryInterface $factory)
	{
		$this->menu = $menu;
		$this->factory = $factory;
	}
	
	/**
	 * @return MenuItem
	 */
	public function getMenu()
	{
		return $this->menu;
	}
	
	/**
	 * @return FactoryInterface
	 */
	public function getFactory()
	{
		return $this->factory;
	}
}