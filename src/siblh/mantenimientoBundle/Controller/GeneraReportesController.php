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
     * @Route("/temperatura/pasteurizacion",name="TemperaturaPasteurizacion")
     * @Template()
     */
    public function TemperaturaPasteurizacionAction()
            
             {
         $em = $this->getDoctrine()->getManager();  
          //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
        return array('hospital' => $establecimiento,);
          }           
 /**
     * @Route("/temperatura/enfriamiento",name="TemperaturaEnfriamiento")
     * @Template()
     */
    public function TemperaturaEnfriamientoAction()
            
             {
        return array();
          } 
          
       
          
          
}

?>