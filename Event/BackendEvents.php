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

/**
 * Backend Events
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
final class BackendEvents
{
	/**
	 * Navbar Menu Builder Init Event
	 *  
	 * @var string
	 */
	const NAVBAR_MENU_INIT = 'asf_backend.menu.navbar.init';
	
	/**
	 * Sidebar Menu Builder Init Event
	 *
	 * @var string
	 */
	const SIDEBAR_MENU_INIT = 'asf_backend.menu.sidebar.init';
}