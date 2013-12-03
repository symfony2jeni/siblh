<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class GeneraReportesController extends Controller
{
    /**
     * @Route("/",name="siblhmantenimiento_homepage")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
     /**
     * @Route("/censo/donante",name="CensoDonate")
     * @Template()
     */
    public function CensoDonanteAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }
          
    /**
     * @Route("/censo/receptores",name="CensoReceptores")
     * @Template()
     */
    public function CensoReceptoresAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }       
  
/**
     * @Route("/analisis/laboratorio",name="AnalisisLaboratorio")
     * @Template()
     */
    public function AnalisisLaboratorioAction()
            
             {
         
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }  
          
 /**
     * @Route("/control/microbiologico",name="ControlMicrobiologico")
     * @Template()
     */
    public function ControlMicrobiologicoAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }           
 /**
     * @Route("/temperatura/pasteurizacion",name="Temperatura_Pasteurizacion")
     * @Template()
     */
    public function TemperaturaPasteurizacionAction()
            
             {
      
          $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as identificador FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codi=$id_blh[0]['identificador']; 
          if ($codi<10){
      $identificador='0'.$codi;
             }
          
      
        else{
            $identificador = strval($codi);         
            }

        
        return array('hospital' => $establecimiento,
                     'identificador' => $identificador,
                     
                );
          }           
 /**
     * @Route("/temperatura/enfriamiento",name="TemperaturaEnfriamiento")
     * @Template()
     */
    public function TemperaturaEnfriamientoAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as identificador FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codi=$id_blh[0]['identificador']; 
          if ($codi<10){
      $identificador='0'.$codi;
             }
          
      
        else{
            $identificador = strval($codi);         
            }

        
        return array('hospital' => $establecimiento,
                     'identificador' => $identificador,
                     
                );
          } 
          
       
 /**
     * @Route("/leche/descartada",name="LecheDescartada")
     * @Template()
     */
    public function LecheDescartadaAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $codigo=$id_blh[0]['id']; 
          if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }                  
   
   /**
     * @Route("/estadistica/leche",name="EstadisticaLeche")
     * @Template()
     */
    public function EstadisticaLecheAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 

      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }         
          
  /**
     * @Route("/estadistica/donante",name="EstadisticaDonante")
     * @Template()
     */
    public function EstadisticaDonanteAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }         
        
/**
     * @Route("/estadistica/receptor",name="EstadisticaReceptor")
     * @Template()
     */
    public function EstadisticaReceptorAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }     
          
  /**
     * @Route("/frascos/aprobadosreprobados",name="AprobadosReprobados")
     * @Template()
     */
    public function AprobadosReprobadosAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }                           
     /**
     * @Route("/informacion/donante",name="Informacion_Donante")
     * @Template()
     */
    public function InformacionDonanteAction()
            
             {
      
          $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id2=$id_blh[0]['id2']; 
       

        
        return array('hospital' => $establecimiento,
                     'id2' => $id2,
                     
                );
          } 
          
  /**
     * @Route("/informacion/receptor",name="Informacion_Receptor")
     * @Template()
     */
    public function InformacionReceptorAction()
            
             {
      
          $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id2=$id_blh[0]['id2']; 
       

        
        return array('hospital' => $establecimiento,
                     'id2' => $id2,
                     
                );
          }     
   /**
     * @Route("/donaciones/donante",name="donaciones_Donante")
     * @Template()
     */
    public function DonacionesDonanteAction()
            
             {
      
          $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as id2 FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id2=$id_blh[0]['id2']; 
       
  /*  if ($codigo<10){
        $id2='0'.$codigo;}
        else{$id2 = strval($codigo);} */
        
        return array('hospital' => $establecimiento,
                     'id2' => $id2,
                     
                );
          }         
  
  /**
     * @Route("/lechedespachada/solicitudes",name="LecheDespachadaSolicitudes")
     * @Template()
     */
    public function LecheDespachadaSolicitudesAction()
            
             {
       $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 
         
      
        return array('hospital' => $establecimiento,
                     'id' => $id
                );
          }         
   
 /**
     * @Route("/combinados/pasteurizados",name="CombinadosPasteurizados")
     * @Template()
     */
    public function CombinadosPasteurizadosAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      
      $query2 = $em->createQuery("SELECT b.id as id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $query2->getResult(); 
      $id=$id_blh[0]['id']; 
        /*  if ($codi<10){
      $identificador='0'.$codi;
             }
          
      
        else{
            $identificador = strval($codi);         
            } */

        
        return array('hospital' => $establecimiento,
                     'id' => $id,
                     
                );
          }          
          
}

?>