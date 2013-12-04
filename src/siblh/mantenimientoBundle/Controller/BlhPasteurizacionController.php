<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhPasteurizacion;
use siblh\mantenimientoBundle\Form\BlhPasteurizacionType;

/**
 * BlhPasteurizacion controller.
 *
 * @Route("/blhpasteurizacion")
 */
class BlhPasteurizacionController extends Controller
{

    /**
     * Lists all BlhPasteurizacion entities.
     *
     * @Route("/", name="blhpasteurizacion")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->findAll();
      //Obtener banco de leche//
      
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $queryb->getResult(); 
      $codigo=$id_blh[0]['id']; 
      if ($codigo<10){
      $idp='0'.$codigo;
      $idp = (string)$idp;
         }
      else{$idp = (string)$codigo;}
        
       $query = $em->createQuery("SELECT p.id, p.codigoPasteurizacion, p.numCiclo,
           p.volumenPasteurizado, p.numFrascosPasteurizados, p.fechaPasteurizacion, p.horaInicioP,
           p.horaFinalP, p.horaInicioE, p.horaFinalE, p.responsablePasteurizacion
       FROM siblhmantenimientoBundle:BlhPasteurizacion p where 
       substring (p.codigoPasteurizacion, 1, 2) = '$idp' order by p.codigoPasteurizacion");
       $pasteurizacion  = $query->getResult(); 
        return array(
            'entities' => $entities,
            'hospital' => $establecimiento,
            'pasteurizacion' => $pasteurizacion,
        );
    }
    /**
     * Creates a new BlhPasteurizacion entity.
     *
     * @Route("/", name="blhpasteurizacion_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhPasteurizacion:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhPasteurizacion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
           //  $em = $this->getDoctrine()->getManager();
       

            return $this->redirect($this->generateUrl('blhpasteurizacion_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'ciclo'  => $numciclo,
        );
    }

    /**
    * Creates a form to create a BlhPasteurizacion entity.
    *
    * @param BlhPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhpasteurizacion_create'),
            'method' => 'POST',
        ));

      //  $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    
    /**
     * Finds and displays a BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query1->getResult(); 

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'hospital' => $establecimiento,
        );
    }

    /**
     * Displays a form to edit an existing BlhPasteurizacion entity.
     *
     * @Route("/{id}/edit", name="blhpasteurizacion_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);
        //Obtener banco de leche//
      
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
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
    * Creates a form to edit a BlhPasteurizacion entity.
    *
    * @param BlhPasteurizacion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhPasteurizacion $entity)
    {
        $form = $this->createForm(new BlhPasteurizacionType(), $entity, array(
            'action' => $this->generateUrl('blhpasteurizacion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

     //   $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhPasteurizacion:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhpasteurizacion_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhPasteurizacion entity.
     *
     * @Route("/{id}", name="blhpasteurizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhPasteurizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhPasteurizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhpasteurizacion'));
    }

    /**
     * Creates a form to delete a BlhPasteurizacion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhpasteurizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
     //Creando nuevo controlador
    
     //Creando Nuevos Controladores
     
     
    /**
     * Lists all BlhTemperaturaEnfriamiento entity.
     *
     * @Route("/curvas", name="blhpasteurizacion_curvas")
     * @Method("GET")
     * @Template()
     */
public function curvasAction()
    {
        $em = $this->getDoctrine()->getManager();      
        
        //Obteniendo lista de curvas"  
       $query = $em->createQuery("SELECT c.id as iden, c.valorCurva as valorCurva, 
                   c.fechaCurva, c.cantidadFrascos as cantidadFrascos, c.volumenPorFrasco as volumenPorFrasco 
                   FROM siblhmantenimientoBundle:BlhPasteurizacion p join p.idCurva c 
                   where c.id in (select cur.id from siblhmantenimientoBundle:BlhPasteurizacion pas 
                   JOIN pas.idCurva cur) group By c.id
                   having (max(p.numCiclo) < 30) ");
       
     //or (max(p.numCiclo) like )
        
        
        // or (max(p.numCiclo) is null)
        
      $curvas  = $query-> getResult() ;
        //Obtener banco de leche//
      
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
        return array(
            'curvas' =>  $curvas,  
            'hospital' => $establecimiento,
         
        );
        
    }
    
    /**
     * Displays a form to create a new BlhPasteurizacion entity.
     *
     * @Route("/new/{id}", name="blhpasteurizacion_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($id)            
      {
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT c.id as iden, c.valorCurva as valorCurva, 
                   c.fechaCurva, c.cantidadFrascos as cantidadFrascos, c.volumenPorFrasco as volumenPorFrasco 
                   FROM siblhmantenimientoBundle:BlhCurva c  WHERE c.id = $id "); 
        $datos_curva  = $query->getResult();
        $curva = $em->getRepository('siblhmantenimientoBundle:BlhCurva')->find($datos_curva[0]['iden']);
 
        
        if (!$datos_curva) {
            throw $this->createNotFoundException('Unable to find BlhCurva entity');
        }
 
           
     //Obtener banco de leche//
      
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
      $queryb = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
      $id_blh = $queryb->getResult(); 
        $codigo=$id_blh[0]['id']; 
         if ($codigo<10){
        $idp='0'.$codigo;
        $idp = (string)$idp;
         }
        else{$idp = (string)$codigo;}
        
         $hoy= getdate();
        $anio = $hoy['year'];
          
        $querycod = $em->createQuery("select max(substring (ps.codigoPasteurizacion, 4, 3)) as correlativo
                                      from siblhmantenimientoBundle:BlhPasteurizacion ps where (substring (ps.codigoPasteurizacion, 1, 2) = '$idp')
                and (substring (ps.codigoPasteurizacion, 8, 4) = '$anio')");
        
        $max = $querycod->getResult(); 
     //   echo $max;
        $maxi=$max[0]['correlativo']; 
        $maxcorrelativo = (int)$maxi;
        $maxcorrelativo = $maxcorrelativo+1;
        if($maxcorrelativo <10)
            {
        $correlativo='00'.$maxcorrelativo;
        $correlativo = (string)$correlativo;
         }
        else{
             if(($maxcorrelativo >= 10) and ($maxcorrelativo <100))
            {
        $correlativo='0'.$maxcorrelativo;
        $correlativo = (string)$correlativo;
         }
            
            else {$correlativo = (string)$maxcorrelativo;}
            }
            
       
        $codpasteurizacion = $idp.'-'.$correlativo.'-'.$anio;
        $entity = new BlhPasteurizacion();
        $entity->setIdCurva($curva);
        $entity->setCodigoPasteurizacion($codpasteurizacion);
        $form   = $this->createCreateForm($entity);
        

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'datos_curva' =>  $datos_curva,
            'hospital' => $establecimiento,
        
         
        );
    }
    
          /** Lists all BlhReceptor entity.
     *
     * @Route("/listado/mantenimiento/pasteurizacion", name="mantenimiento_pasteurizacion")
     * @Method("GET")
     * @Template()
     */
 
 public function mantenimientoPasteurizacionAction()
    {
      
     $em = $this->getDoctrine()->getManager();   
      //Obtener banco de leche//
        
      $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
      $query1 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
      $establecimiento = $query1->getResult(); 
           
         return array(
            'hospital' => $establecimiento,
        );
           
     
     
        
    }

}
