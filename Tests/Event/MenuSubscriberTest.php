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

use ASF\BackendBundle\Event\MenuSubscriber;
use ASF\BackendBundle\Event\NavbarMenuEvent;
use Knp\Menu\MenuFactory;

/**
 * Backend Menu Subscriber Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class MenuSubscriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \ASF\BackendBundle\Event\MenuSubscriber
     */
    protected $subscriber;
    
    /**
     * @var \ASF\BackendBundle\Event\NavbarMenuEvent
     */
    protected $navbarEvent;
    
    /**
     * {@inheritDoc}
     * @see PHPUnit_Framework_TestCase::setUp()
     */
    public function setUp()
    {
        parent::setUp();
        
        // Navbar Event
        $factory = new MenuFactory();
        $menu = new MenuItem('root', $factory);
        $this->navbarEvent = new NavbarMenuEvent($menu, $factory);
        
        // Menu Subscriber
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $this->subscriber = new MenuSubscriber($request);
    }
    
    /**
     * @covers ASF\BackendBundle\Event\MenuSubscriber::getSubscribedEvents
     */
    public function testGetSubscribedEventsMethod()
    {
        $this->assertCount(1, $this->subscriber->getSubscribedEvents());
    }
    
    /**
     * @covers ASF\BackendBundle\Event\MenuSubscriber::onNavbarMenuInit
     */
    public function testOnNavbarMenuInit()
    {
        $this->subscriber->onNavbarMenuInit($this->navbarEvent);
        $this->assertTrue($this->navbarEvent->getMenu()->hasChildren());
    }
}