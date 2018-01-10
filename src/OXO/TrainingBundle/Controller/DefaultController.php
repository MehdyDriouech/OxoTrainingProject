<?php

namespace OXO\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OXOTrainingBundle:Default:index.html.twig');
    }
}
