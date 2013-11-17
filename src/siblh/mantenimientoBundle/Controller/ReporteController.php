<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use siblh\mantenimientoBundle\Util\JasperReport\JasperClient as JasperClient;

include (__DIR__ . '/../Util/JasperReport/_jasperserverreports.php');

/**
 * Asignatura controller.
 *
 * @Route("/reportes")
 */

class ReporteController extends Controller {

   /**
     * Lists all Asignatura entities.
     *
     * @Route("/reporte/censodonante/{report_name}/{report_format}", name="mostrar_reporte")
     * @Template()
     */
    public function showAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/" . $report_name;  //rutadejasperserverreports
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }

 
    //Controller para reporte de receptores
    
      /**
     * Lists all Asignatura entities.
     *
     * @Route("/reporte/receptores/{report_name}/{report_format}", name="mostrar_receptores")
     * @Template()
     */
    public function ReporteReceptoresAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/" . $report_name;  //rutadejasperserverreports
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }

   //Controller para leche donada
    
      /**
     *
     * @Route("/reporte/lechedonada/{report_name}/{report_format}", name="mostrar_frascos")
     * @Template()
     */
    public function ReporteLecheDonadaAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/" . $report_name;  //rutadejasperserverreports
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }
  
//Controller para alerta de leche donada
    
      /**
     *
     * @Route("/reporte/alertaprealmacenado/{report_name}/{report_format}", name="mostrar_alerta")
     * @Template()
     */
    public function AlertaPrealmacenadoAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/" . $report_name;  //rutadejasperserverreports
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }
  

    
    //Controller para alerta de leche pasteurizada
    
      /**
     *
     * @Route("/reporte/alertapasteurizado/{report_name}/{report_format}", name="mostrar_alerta2")
     * @Template()
     */
    public function AlertaPasteurizacionAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/" . $report_name;  //rutadejasperserverreports
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }
    
 /**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte", options={"expose"=true})
    */
   public function exportarReporteAction($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $fecha_inicio = $request->get('fechai');
       $fecha_fin = $request->get('fechaf');
       $id = $request->get('id');
       $nombre = $request->get('nombre');
       
       $report_params = array('fechai' => $fecha_inicio, 'fechaf' => $fecha_fin, 'id' => $id, 'nombre' => $nombre);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   }   
 
 /**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte_receptores", options={"expose"=true})
    */
   public function exportarReporteReceptoresAction($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $fecha_inicio = $request->get('fechai');
       $fecha_fin = $request->get('fechaf');
        $id = $request->get('id');
       $nombre = $request->get('nombre');
       
       $report_params = array('fechai' => $fecha_inicio, 'fechaf' => $fecha_fin, 'id' => $id, 'nombre' => $nombre);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   }   
 
   
   /**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte_laboratorio", options={"expose"=true})
    */
   public function exportarReporteAnalisisLaboratorio($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $fecha_inicio = $request->get('fechai');
       $fecha_fin = $request->get('fechaf');
       
       $report_params = array('fechai' => $fecha_inicio, 'fechaf' => $fecha_fin);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   } 
 
 /**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte_cmicrobiologico", options={"expose"=true})
    */
   public function exportarReporteControlMicrobiologico($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $fecha_inicio = $request->get('fechai');
       $fecha_fin = $request->get('fechaf');
       
       $report_params = array('fechai' => $fecha_inicio, 'fechaf' => $fecha_fin);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   }  
/**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte_Tpasteurizacion", options={"expose"=true})
    */
   public function exportarReporteTemperaturaP($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $codigo = $request->get('codigo');
      
       
       $report_params = array('codigo' => $codigo);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   }  
   
   
  //Temperatura Enfriamiento
   
   /**
    * @Route("/reporte/{report_name}/{report_format}", name="_exportar_reporte_Tenfriamiento", options={"expose"=true})
    */
   public function exportarReporteTEnfriamientoAction($report_name, $report_format) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

       $request = $this->getRequest();
       $codigo = $request->get('codigo');
     //  $fecha_fin = $request->get('fechaf');
       
       $report_params = array('codigo' => $codigo);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   }   
 
 
////////////////////////////////////////
   /**
    * @Route("/reporte/{report_name}/{report_format}/{id}", name="_exportar_reporte_avancer", options={"expose"=true})
    */
   public function exportarReporteAvanceReceptorAction($report_name, $report_format, $id) {
       //$report_format='pdf';
       //$usuario = $this->container->get('security.context')->getToken()->getUser();
       //var_dump($usuario);exit;
       $jasper_url = JASPER_URL;
       $jasper_username = JASPER_USER;
       $jasper_password = JASPER_PASSWORD;
       $report_unit = "/reports/" . $report_name;

     //  $request = $this->getRequest();
     //  $identificador = $request->get('identificador');
      // $fecha_fin = $request->get('fechaf');
       
       $report_params = array('id' => $id);
       $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

       $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
               '/' . strtolower($report_format);

       $result = $client->requestReport($report_unit, $report_format, $report_params);

       $response = new Response();
       $response->headers->set('Content-Type', $contentType);
         if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
         $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
       $response->setContent($result);

       return $response;
   } 
     
   
}

?>
