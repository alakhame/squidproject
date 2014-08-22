<?php

namespace SquidProject\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function profilAction()
    {
        return $this->render('SquidProjectUserBundle:General:profil.html.twig');
    }
}
