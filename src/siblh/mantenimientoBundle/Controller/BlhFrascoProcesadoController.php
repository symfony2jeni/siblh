<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhFrascoProcesado;
use siblh\mantenimientoBundle\Form\BlhFrascoProcesadoType;
//agregando para poder crear las entidades frascorecolectadofrascop
use siblh\mantenimientoBundle\Entity\BlhFrascoRecolectadoFrascoP;

/**
 * BlhFrascoProcesado controller.
 *
 * @Route("/blhfrascoprocesado")
 */
class BlhFrascoProcesadoController extends Controller
{

    /**
     * Lists all BlhFrascoProcesado entities.
     *
     * @Route("/", name="blhfrascoprocesado")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->findAll();
         //Obtener banco de leche//
              
       $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
 
       
       $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento, 
        );
    }
    /**
     * Creates a new BlhFrascoProcesado entity.
     *
     * @Route("/", name="blhfrascoprocesado_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhFrascoProcesado();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
   

        if ($form->isValid()) {
            
     
            
         //obteniendo vector con  ids a combinar   
         $request = $this->getRequest();
         $ids_combinar = $request->get('idscombinar');
         //obteniendo vector con volumenes a combinar
         $vlcombinar = $request->get('vlcombinar');     
         $vldisponible = $request->get('vldisponible');    
         
         //echo ($vldisponible[1]);
        $acideztotal=0;
        $caloriastotal=0;
        $volumentotal=0;
        $tamanio = count($ids_combinar); 
         
            for($i=0; $i<$tamanio;$i++ ){
                
            //obteniendo la acidez del frasco a combinar    
            $BlhAcidez = $em->getRepository('siblhmantenimientoBundle:BlhAcidez')->findOneBy(array('idFrascoRecolectado' => $ids_combinar[$i]));
            $Acidez=$BlhAcidez->getResultado();
            //$Acidez = $BlhAcidez[0]['resultado']; 
            
            //obteniendo las calorias del frasco a combinar
            $BlhCrematocrito = $em->getRepository('siblhmantenimientoBundle:BlhCrematocrito')->findOneBy(array('idFrascoRecolectado' => $ids_combinar[$i]));
            $Crematocrito=$BlhCrematocrito->getKilocalorias();
            //$Crematocrito = $BlhCrematocrito[0]['kilocalorias'];
            
            //acumuladores de acidez, calorias totales y volumen total          
            $acideztotal=$acideztotal+$Acidez;
            $caloriastotal=$caloriastotal+$Crematocrito;            
            $volumentotal = $volumentotal+ $vlcombinar[$i];//volumen del nuevo frasco procesado
             }
             
            $AcidezFinal=$acideztotal/$tamanio; //acidez de nuevo frasco procesado
            $caloriasfinales=$caloriastotal/$tamanio;//calorias de nuevo frasco procesado
            
            
            $entity->setvolumenFrascoPasteurizado($volumentotal);//seteando volumen de nuevo frasco procesado
            $entity->setacidezTotal($AcidezFinal);//seteando acidez de nuevo frasco procesado
            $entity->setkcaloriasTotales($caloriasfinales);//seteando calorias a nuevo frasco procesado
            
            $em->persist($entity);
            $em->flush();
            
            $id_frascop= $entity->getId();
            $frascop = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id_frascop);
            
    
            //Guardando los nuevos objetos frascrfrascop
            for($i=0; $i<$tamanio;$i++ ){
            $frascosr = $em->getRepository('siblhmantenimientoBundle:BlhFrascoRecolectado')->find($ids_combinar[$i]);
                                 
            //Asociando el farsco procesado con los frascos recolectados
            $entity1 = new BlhFrascoRecolectadoFrascoP();
            $entity1->setidFrascoProcesado($frascop);
            $entity1->setidFrascoRecolectado($frascosr);                            
            $entity1->setvolumenAgregado($vlcombinar[$i]);
            $em->persist($entity1);
            $em->flush();
            
           
            $voldisp=$vldisponible[$i]-$vlcombinar[$i];
            
              //Cambiando estado a los frascos q no les queda volumen
            if($voldisp==0){
            $nuevoestado = $em->getRepository('siblhmantenimientoBundle:BlhEstado')->find(15);
            $frascosr->setIdEstado($nuevoestado);
            $em->persist($frascosr);
            $em->flush();
           /* $idestado= $frascosr->getidEstado();
            $estado = $em->getRepository('siblhmantenimientoBundle:BlhEstado')->find($idestado);
            $frascosr->setIdEstado($estado);*/
            }
            }
           
            return $this->redirect($this->generateUrl('blhfrascoprocesado_new', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

      /**
     * Displays a form to create a new BlhFrascoProcesado entity.
     *
     * @Route("/new/{id}", name="blhfrascoprocesado_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)
    {

//Obtener banco de leche//
        $em = $this->getDoctrine()->getManager();       
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
     
      
        $pasteurizacion = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);
        $estado = $em->getRepository('siblhmantenimientoBundle:BlhEstado')->find(3);
       
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        //codigo
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id'];
        
          if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        
        //Obtener los frascos a combinar
        
        //Acides->frasco
       $query = $em->createQuery("select fr.id, fr.codigoFrascoRecolectado, a.resultado  from siblhmantenimientoBundle:BlhAcidez a join a.idFrascoRecolectado fr  where fr.idEstado = 6 AND fr.idLoteAnalisis IS NOT NULL and (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp') ORDER BY fr.id ");
       $frascos_combinar = $query->getResult(); 
       $Cantidad_frascos = count($frascos_combinar);
       //Crematocrito->frasco
       $query2 = $em->createQuery("SELECT fr.id, fr.codigoFrascoRecolectado, fr.volumenRecolectado vl, c.kilocalorias FROM siblhmantenimientoBundle:BlhCrematocrito c join c.idFrascoRecolectado fr  where fr.idEstado = 6 AND fr.idLoteAnalisis IS NOT NULL and (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp') ORDER BY fr.id ");      
       $calorias = $query2->getResult(); 
       $filas = count($calorias );
       

        
        //volumen agregado
       $query3 = $em->createQuery("SELECT sum(frfp.volumenAgregado) as agregado, fr.id FROM siblhmantenimientoBundle:BlhFrascoRecolectadoFrascoP frfp  join frfp.idFrascoRecolectado fr  where fr.idEstado = 6 AND fr.idLoteAnalisis IS NOT NULL and (substring (fr.codigoFrascoRecolectado, 1, 2) = '$idp') GROUP BY fr.id  ORDER BY fr.id ");      
       $volumen_agregado = $query3->getResult(); 
       $resultCount = count($volumen_agregado);

       if($Cantidad_frascos==0 || $filas==0){
       $vldisponible=0;}
       
       else{
       if($resultCount==0)                    
           {
           for ($i=0; $i<$filas; $i++)
           {
              $volumen_agregado[$i]['agregado']= 0;
               $volumen_agregado[$i]['id'] = $calorias[$i]['id']; 
           }
           }
           else{
           if(($resultCount >0) && ($resultCount < $filas)){
               $x=$filas-1;
               for ($i=$resultCount; $i<= $x; $i++){
                $volumen_agregado[$i]['agregado']= 0;
               $volumen_agregado[$i]['id'] = $calorias[$i]['id'];                              
           }

           //$volumen_agregado=$filas;
           }
           }
           
          for ($i=0; $i<$filas; $i++)
           {
             $vldisponible[$i]= $calorias[$i]['vl'] -  $volumen_agregado[$i]['agregado'];
           }
       }//fin else principal
        
       $entity = new BlhFrascoProcesado();
        $entity->setIdPasteurizacion($pasteurizacion);
        $entity->setIdEstado($estado);
        $form   = $this->createCreateForm($entity);
        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hospital' => $establecimiento,
            'frascos_combinar'=> $frascos_combinar,
            'pasteurizacion'=> $pasteurizacion,
            'calorias'=>$calorias,
            'volumen_agregado'=>$volumen_agregado,
            'vldisponible'=>$vldisponible,
        );
    }
   

    /**
     * Finds and displays a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

       // $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
           // 'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}/edit", name="blhfrascoprocesado_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
         
        //Obtener banco de leche//
              
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      /*  $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult(); 
        $codigo=$id_blh[0]['id']; */
       
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 
        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
    * Creates a form to edit a BlhFrascoProcesado entity.
    *
    * @param BlhFrascoProcesado $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhFrascoProcesado $entity)
    {
        $form = $this->createForm(new BlhFrascoProcesadoType(), $entity, array(
            'action' => $this->generateUrl('blhfrascoprocesado_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhFrascoProcesado:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhfrascoprocesado_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**blhfrascoprocesado/new/1
     * Deletes a BlhFrascoProcesado entity.
     *
     * @Route("/{id}", name="blhfrascoprocesado_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhFrascoProcesado')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhFrascoProcesado entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhfrascoprocesado'));
    }

    /**
     * Creates a form to delete a BlhFrascoProcesado entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhfrascoprocesado_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
      /**
     * Lista de todos los Receptores Registrados.
     *
     * @Route("/seleccion/pasteurizacion", name="seleccion_pasteurizacion")
     * @Method("GET")
     * @Template()
     */
 
 public function seleccionPasteurizacionAction()
    {
        $em = $this->getDoctrine()->getManager();   
        
        
         //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      //codigo
        $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id'];
        
          if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        
       //Obteniendo las pasteurizaciones a las que aun no se les ha combinado frascos procesados
       
       $query = $em->createQuery("SELECT p.id, p.codigoPasteurizacion, p.numCiclo, p.volumenPasteurizado,p.numFrascosPasteurizados, p.fechaPasteurizacion, p.responsablePasteurizacion FROM siblhmantenimientoBundle:BlhPasteurizacion p where p.id not in (select f.id  from siblhmantenimientoBundle:BlhFrascoProcesado f JOIN f.idPasteurizacion pas) and (substring (p.codigoPasteurizacion, 1, 2) = '$idp')");
        
         $pasteurizaciones = $query->getResult();
     
       
        return array(
            'pasteurizaciones' => $pasteurizaciones,         
            'hospital' => $establecimiento,
        );
        
    }
    
   
}

