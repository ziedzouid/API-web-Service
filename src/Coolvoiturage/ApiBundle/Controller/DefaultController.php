<?php

namespace Coolvoiturage\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoolvoiturageApiBundle:Default:index.html.twig');
    }
}
