<?php

namespace siblh\mantenimientoBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\GeneraReportes;

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
        
        $em = $this->getDoctrine()->getManager();     
        $usuario = $this->container->get('security.context')->getToken()->getUser()->getId();
        $query_rol_usuario = $em->createQuery("select u.roles from siblhmantenimientoBundle:FosUserUser u where u.id = $usuario"); 
        $rol_usuario   = $query_rol_usuario->getResult();
        //Obteniendo lista de pacientes"  
     // $query = $em->createQuery("SELECT d.id FROM siblhmantenimientoBundle:BlhDonacion d");
       $query = $em->createQuery("select date_diff(date_add(don.fechaDonacion,15,'day'),current_date()) as dias
from siblhmantenimientoBundle:BlhFrascoRecolectado  fr JOIN fr.idDonacion don where (date_diff(date_add(don.fechaDonacion,15,'day'),current_date())) <= 2"); 
    
                
        $results  = $query->getResult();
        $resultCount = count($results);
        
         $query2 = $em->createQuery("select date_diff(date_add(pas.fechaPasteurizacion,6,'month'),current_date()) as dias
from siblhmantenimientoBundle:BlhFrascoProcesado  fp JOIN fp.idPasteurizacion pas where (date_diff(date_add(pas.fechaPasteurizacion,6,'month'),current_date())) <= 2 and fp.idEstado = 2"); 
    
                
        $results2  = $query2->getResult();
        $resultCount2 = count($results2);

        
            /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */ 
          //   $hospital= $establecimiento[0]['nombre']; 

      //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
           
         return array(
            'resultado' =>  $resultCount,  
             'resultado2' => $resultCount2,
            'hospital' => $establecimiento,
            'rol_usuario' => $rol_usuario,
         
        );
        
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
    
    
 //prueba para alerta************************************//
    

 
    
    
}
