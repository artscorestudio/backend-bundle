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

use ASF\BackendBundle\Event\BackendEvents;

/**
 * Backend Events Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class BackendEventsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ASF\BackendBundle\Event\BackendEvents
     */
	public function testEventNames()
	{
	    $this->assertEquals('asf_backend.menu.navbar.init', BackendEvents::NAVBAR_MENU_INIT);
	    $this->assertEquals('asf_backend.menu.sidebar.init', BackendEvents::SIDEBAR_MENU_INIT);
	}
}