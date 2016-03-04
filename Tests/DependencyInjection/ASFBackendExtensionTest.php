<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Tests\DependencyInjection;

use ASF\BackendBundle\DependencyInjection\ASFBackendExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Bundle's Extension Test Suites
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class ASFBackendExtensionTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var \ASF\BackendBundle\DependencyInjection\ASFBackendExtension
	 */
	protected $extension;
	
	/**
	 * {@inheritDoc}
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	public function setUp()
	{
		parent::setUp();

		$this->extension = new ASFBackendExtension();
	}
	
	/**
	 * @covers ASF\BackendBundle\DependencyInjection\ASFBackendExtension::load
	 */
	public function testLoadExtension()
	{
	    $container = new ContainerBuilder();
		$this->extension->load(array(), $container);
	}
}