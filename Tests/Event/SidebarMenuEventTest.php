<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Tests\Event;

use ASF\BackendBundle\Event\SidebarMenuEvent;
use Knp\Menu\MenuItem;
use Knp\Menu\MenuFactory;

/**
 * Sidebar Menu Event Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class SidebarMenuEventTest extends \PHPUnit_Framework_TestCase
{
	/**
     * @var SidebarMenuEvent
     */
    protected $event;
    
    /**
     * {@inheritDoc}
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        parent::setUp();
        
        $factory = new MenuFactory();
        $menu = new MenuItem('root', $factory);
        
        $this->event = new SidebarMenuEvent($menu, $factory);
    }
    
    /**
     * @covers ASF\BackendBundle\Event\SidebarMenuEvent
     * @covers ASF\BackendBundle\Event\SidebarMenuEvent::getMenu
     */
	public function testGetMenuMethod()
	{
	    $this->assertInstanceOf('Knp\Menu\MenuItem', $this->event->getMenu());
	}
	
	/**
	 * @covers ASF\BackendBundle\Event\SidebarMenuEvent::getFactory
	 */
	public function testGetFactoryMethod()
	{
	    $this->assertInstanceOf('Knp\Menu\FactoryInterface', $this->event->getFactory());
	}
}