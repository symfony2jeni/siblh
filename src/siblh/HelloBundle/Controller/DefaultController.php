<?php


namespace siblh\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('siblhHelloBundle:Default:index.html.twig');
    }

    public function projectsAction()
    {
        return $this->render('AcmeHelloBundle:Default:index.html.twig');
    }

    public function addProjectAction()
    {
        return $this->render('siblhHelloBundle:Default:index.html.twig');
    }

    public function employeesAction()
    {
        return $this->render('siblhHelloBundle:Default:index.html.twig');
    }

    public function addEmployeeAction()
    {
        return $this->render('siblhHelloBundle:Default:index.html.twig');
    }

    public function profileAction()
    {
        return $this->render('siblhHelloBundle:Default:index.html.twig');
    }
}
