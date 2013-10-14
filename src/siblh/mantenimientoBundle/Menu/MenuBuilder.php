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
        //$texto = '';
        foreach($menuItems as $Item){
           
            $texto = $Item->nombreMenu;
            $texto2 = $Item->id;
            //echo $menuItems;
            $menu->addChild($texto, array('route' => ''))
			->setAttribute('dropdown', true);
                       // ->setAttribute('icon', 'icon-list');
            
            $menuSubItems =  $em->getRepository('siblhmantenimientoBundle:BlhOpcionMenu')->findBy(array('idMenu' => $texto2));
            
             foreach($menuSubItems as $SubItem){
                 
                 $menu[$texto]->addChild($SubItem->nombreOpcion, array(
                                                'route' => $SubItem->urlOpcion,
                                                )
                )
			->setAttribute('icon', 'icon-edit');
                 
             }
            // echo $producto."<br>";
        }
        
        
    	

		/*$menu->addChild('Projects', array('route' => 'acme_hello_projects'))
			->setAttribute('dropdown', true)
                        ->setAttribute('icon', 'icon-list');

		$menu->addChild('Employees', array('route' => 'acme_hello_employees'))
			->setAttribute('dropdown', true)
                        ->setAttribute('icon', 'icon-group');
                        
                
                $menu->addChild('Henry', array('route' => 'acme_hello_henry'))
			->setAttribute('dropdown', true)
			->setAttribute('icon', 'icon-user');
                
                
                
                $menu['Henry']->addChild('Test2', array('route' => 'acme_hello_test2'))
			->setAttribute('icon', 'icon-edit');
                
                $menu['Henry']->addChild('Test1', array('route' => 'acme_hello_profile'))
			->setAttribute('icon', 'icon-edit');*/


        return $menu;
    }
    /*{
        
        
    	/*$menu = $factory->createItem('root');
    	$menu->setChildrenAttribute('class', 'nav');

		$menu->addChild('Projects', array('route' => 'acme_hello_projects'))
			->setAttribute('icon', 'icon-list');

		$menu->addChild('Employees', array('route' => 'acme_hello_employees'))
			->setAttribute('icon', 'icon-group');

        return $menu;
    }*/

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