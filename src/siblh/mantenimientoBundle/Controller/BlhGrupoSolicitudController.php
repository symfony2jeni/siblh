<?php

namespace siblh\mantenimientoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use siblh\mantenimientoBundle\Entity\BlhGrupoSolicitud;
use siblh\mantenimientoBundle\Form\BlhGrupoSolicitudType;

use siblh\mantenimientoBundle\Entity\BlhReceptor;
use siblh\mantenimientoBundle\Entity\BlhSolicitud;
/**
 * BlhGrupoSolicitud controller.
 *
 * @Route("/blhgruposolicitud")
 */
class BlhGrupoSolicitudController extends Controller
{

    /**
     * Lists all BlhGrupoSolicitud entities.
     *
     * @Route("/", name="blhgruposolicitud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->findAll();
        
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
     * Creates a new BlhGrupoSolicitud entity.
     *
     * @Route("/", name="blhgruposolicitud_create")
     * @Method("POST")
     * @Template("siblhmantenimientoBundle:BlhGrupoSolicitud:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlhGrupoSolicitud();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blhgruposolicitud', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlhGrupoSolicitud entity.
    *
    * @param BlhGrupoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlhGrupoSolicitud $entity)
    {
        $form = $this->createForm(new BlhGrupoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhgruposolicitud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlhGrupoSolicitud entity.
     *
     * @Route("/new", name="blhgruposolicitud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlhGrupoSolicitud();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlhGrupoSolicitud entity.
     *
     * @Route("/{id}/edit", name="blhgruposolicitud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
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
    * Creates a form to edit a BlhGrupoSolicitud entity.
    *
    * @param BlhGrupoSolicitud $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlhGrupoSolicitud $entity)
    {
        $form = $this->createForm(new BlhGrupoSolicitudType(), $entity, array(
            'action' => $this->generateUrl('blhgruposolicitud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_update")
     * @Method("PUT")
     * @Template("siblhmantenimientoBundle:BlhGrupoSolicitud:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blhgruposolicitud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlhGrupoSolicitud entity.
     *
     * @Route("/{id}", name="blhgruposolicitud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlhGrupoSolicitud entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blhgruposolicitud'));
    }

    /**
     * Creates a form to delete a BlhGrupoSolicitud entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blhgruposolicitud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
     /**
     * Lista de solicitudes a agrupar
     *
     * @Route("/seleccion/solicitudes", name="blhseleccionsolicitudes")
     * @Method("GET")
     * @Template()
     */
    public function seleccionSolicitudesAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
         
        
        $query1 = $em->createQuery("SELECT b.id FROM siblhmantenimientoBundle:BlhBancoDeLeche b WHERE b.idEstablecimiento = $userEst");
        $id_blh = $query1->getResult();
        $codigo=$id_blh[0]['id'];
       // $codigo=implode("", $id_blh);
        
           //Obtener banco de leche//
        $userEst = $this->container->get('security.context')->getToken()->getUser()->getIdEst();
        $query2 = $em->createQuery("SELECT e.nombre, e.direccion, e.telefono FROM siblhmantenimientoBundle:CtlEstablecimiento e WHERE e.id = $userEst");
        $establecimiento = $query2->getResult(); 

        if ($codigo<10){
        $id='0'.$codigo;}
        else{$id = strval($codigo);}
        
        $query = $em->createQuery("SELECT s.id, s.codigoSolicitud, s.fechaSolicitud, s.acidezNecesaria, s.caloriasNecesarias, s.volumenPorToma, s.tomaPorDia, p.primerNombre as nombre1, p.segundoNombre as nombre2, p.tercerNombre as nombre3, p.primerApellido as apellido1, p.segundoApellido as apellido2 FROM siblhmantenimientoBundle:BlhSolicitud s JOIN s.idReceptor r JOIN r.idPaciente p WHERE s.estado = 'Pendiente' AND (SUBSTRING(s.codigoSolicitud, 1, 2)='$id')");
        
        $solicitudes = $query->getResult();
     

        return array(
            'solicitudes' => $solicitudes,
                'hospital' => $establecimiento,
        );
    }
     
     /**
     * Lista de solicitudes a agrupar
     *
     *@Route("/seleccion/solicitudes", name="blhagruparsolicitudes")
     * @Method("POST")
     * @Template()
     */
    public function agruparSolicitudesAction()
    {     

        //obteniendo los ids a agrupar//
         $request = $this->getRequest();
         $ids_agrupar = $request->get('var');
         $ids= explode(",",$ids_agrupar);
         
         
       
         $tamanio = count($ids);   
         
        
        if($ids_agrupar==0){
            return $this->redirect(
            $this->generateUrl('blhseleccionsolicitudes'));
        }
        else{
       $em = $this->getDoctrine()->getManager();
       //Creando el grupo para la agrupacion//     
       
        $Grupo_solicitud = new BlhGrupoSolicitud();
        $em->persist($Grupo_solicitud);
        $em->flush();
        
        $id_Grupo= $Grupo_solicitud->getId();
        $Grupo_solicitud->setcodigoGrupoSolicitud($id_Grupo);//seteando el codigo de grupo
        
        //Obteniendo el id grupo creado//
        $Grupo = $em->getRepository('siblhmantenimientoBundle:BlhGrupoSolicitud')->find($id_Grupo);
       
      
        
        
         
            
        for ($i = 0; $i < $tamanio; $i++) {
           $agrupacion = $em->getRepository('siblhmantenimientoBundle:BlhSolicitud')->find($ids[$i]);
           $agrupacion->setIdGrupoSolicitud($Grupo);//seteando el nuevo grupo a la solicitud agrupada
           $agrupacion->setestado('Agrupada');//cambiando estado de solicitud
           $em->persist($agrupacion);
           $em->flush();
            
        }
        }
        
        //Fin de agrupacion
    

        return $this->redirect(
    $this->generateUrl('blhseleccionsolicitudes')
);
   
    }
    
}
