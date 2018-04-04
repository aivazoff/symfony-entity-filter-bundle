<?php

namespace pro\armd\EntityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserFilterBundle:Default:index.html.twig');
    }
}
