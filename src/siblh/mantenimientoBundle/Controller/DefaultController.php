<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    /*public function indexAction($name)
    {
        return array('name' => $name);
    }*/
    
   /* public function indexAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }*/
    
     /**
     * @Route("/",name="siblhmantenimiento_homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
 
    public function projectsAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }
 
    public function addProjectAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }
 
    public function employeesAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }
 
    public function addEmployeeAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }
 
    public function profileAction()
    {
        return $this->render('siblhmantenimientoBundle:Default:index.html.twig');
    }
    
}
