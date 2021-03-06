<?php
/*
 * This file is part of the Artscore Studio Framework package.
 *
 * (c) Nicolas Claverie <info@artscore-studio.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace ASF\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Default Controller gather generic app views
 * 
 * @author Nicolas Claverie <info@artscore-studio.fr>
 *
 */
class DashboardController extends Controller
{
    /**
     * Dashboard Homepage
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('ASFBackendBundle:Dashboard:index.html.twig');
    }
}