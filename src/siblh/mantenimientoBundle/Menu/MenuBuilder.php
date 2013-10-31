<?php

namespace siblh\mantenimientoBundle\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Sonata\AdminBundle\Admin\Pool;
class MenuBuilder extends Controller
{
    public function mainMenu(FactoryInterface $factory, array $options)
     {
        //-- Crear el objeto EntityManager de Doctrine
        //include 'Controller.php';
       $em = $this->getDoctrine()->getEntityManager();
       
        //-- Obtener todas las tuplas de la tabla estudiante
        $menuItems =  $em->getRepository('siblhmantenimientoBundle:BlhMenu')->findAll();
        
           
        $menu = $factory->createItem('root');
       
            $menu->setChildrenAttribute('class', 'nav');
        
        foreach($menuItems as $Item){
            $nombreroles =  array();
            $texto = $Item->nombreMenu;
            $texto2 = $Item->id;
            $codroles = $em->getRepository('siblhmantenimientoBundle:BlhRolMenu')->findBy(array('idMenu' => $texto2));
            foreach($codroles as $codrol)
            {
               
                $aux2 = $em->getRepository('siblhmantenimientoBundle:BlhRol')->findBy(array('id' => $codrol->idRol));
                $aux3=  implode(",",$aux2);
                array_push($nombreroles,$aux3);
            }
            //echo $menuItems;
             if($this->container->get('security.context')->isGranted($nombreroles)) {
            $menu->addChild($texto, array('route' => ''))
                        ->setAttribute('dropdown', true);
            
            $menuSubItems =  $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->findBy(array('idMenu' => $texto2));
            
             foreach($menuSubItems as $SubItem){
                 
                 $menu[$texto]->addChild($SubItem->nombreOpcion, array(
                                                'route' => $SubItem->urlOpcion,
                                                )
                )
                        ->setAttribute('icon', 'icon-edit');
                 
             }
           
        }
       }
        return $menu;
    }
    
    public function userMenu(FactoryInterface $factory, array $options)
    {
            $menu = $factory->createItem('root');
            $menu->setChildrenAttribute('class', 'nav pull-right');

            /*
            You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
*/
            if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN','ROLE_USER'))) { // Check if the visitor has any authenticated roles
        
        /* @var $username \FOS */
            $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
        
        //Usado con fines de prueba para mostrar el rol del usuario actual
        $useroles = $this->container->get('security.context')->getToken()->getUser()->getRoles();   
            $aux =  implode(",", $useroles);
        ////////////////////////////////////////////////////////////////////////////////////////////
        
                $menu->addChild('User', array('label' => $username))
                        ->setAttribute('dropdown', true)
                        ->setAttribute('icon', 'icon-user');

                $menu['User']->addChild('Cerrar Sesión', array('route' => 'sonata_user_admin_security_logout'))
                        ->setAttribute('icon', 'icon-edit');
    }
       
        return $menu;
    }
}
?>