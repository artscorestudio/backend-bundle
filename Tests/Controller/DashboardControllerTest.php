<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Dashboard Controller Tests
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class TestDashboardControllerTest extends WebTestCase
{
    /**
     * @covers ASF\BackendBundle\Controller\DashboardController::indexAction
     */
    public function testBackendHomepage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Default Backend template")')->count());
    }
}