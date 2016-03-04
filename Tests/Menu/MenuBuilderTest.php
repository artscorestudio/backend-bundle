<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Tests\Menu;

use ASF\BackendBundle\Menu\MenuBuilder;
use Knp\Menu\MenuFactory;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Knp Menu Builder Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class MenuBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \ASF\BackendBundle\Menu\MenuBuilder
     */
    protected $menuBuilder;
    
    /**
     * {@inheritDoc}
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        parent::setUp();
        
        $factory = new MenuFactory();
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $event_dispatcher = new EventDispatcher();
        
        $this->menuBuilder = new MenuBuilder($factory, $event_dispatcher, $request);
    }
    
	/**
	 * @covers ASF\BackendBundle\Menu\MenuBuilder::createNavbarMenu
	 */
	public function testCreateNavbarMenuMethod()
	{
	    $this->assertInstanceOf('Knp\Menu\ItemInterface', $this->menuBuilder->createNavbarMenu(array()));
	}
	
	/**
	 * @covers ASF\BackendBundle\Menu\MenuBuilder::createSidebarMenu
	 */
	public function testCreateSidebarMenuMethod()
	{
	    $this->assertInstanceOf('Knp\Menu\ItemInterface', $this->menuBuilder->createSidebarMenu(array()));
	}
}