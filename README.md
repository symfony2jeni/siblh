SIBLH
Sistema Informatico de gestion y control de Banco de Leche Humana para la red nacional hospitalaria,
centralizado en el Hospital Nacional especializado de Maternidad.

Sistema informático encargado de gestionar y controlar las actividades diarias que se realizan en las unidades de banco 
de leche humana como el registro de donantes, recolección de leche humana, control del procesamiento de la leche, 
registro de receptores, atención de solicitudes de leche humana, entre otras, garantizando la seguridad y el control tanto
en el manejo de la informacion como en la realizacion de las actividades diarias.
=========================================================================================================

A continuacion se describen los pasos necesarios para configurar el entorno el desarrollo y funcionamiento del SIBLH:


 Instalación y configuración del entorno Web
----------------------------------------------
* Para preparar el entorno Web en Debian 7.0 "Wheezy"  es necesario instalar
los siguientes paquetes, lo cual implica tener configurado apropiadamente el
archivo /etc/apt/sources.list

Puede encontrar información adicional en
http://wiki.salud.gob.sv/wiki/Actualizaciones_y_sources.list

* Primero se deberán actualizar los repositorios del sistema operativo.
Como **usuario root** escribir en una terminal:

        aptitude update && aptitude full-upgrade

* Siempre como **usuario root** ejecutar la siguiente instrucción:

        aptitude install apache2-mpm-prefork php5 php5-gd php-apc libgd2-xpm acl \
        php5-mcrypt curl git libapache2-mod-php5 php5-intl php-pear php5-cli \
        php5-pgsql postgresql openjdk-7-jdk openjdk-7-jre

* Editar el archivo /etc/php5/apache2/php.ini como **usuario root**; con cualquier
editor de texto, puede ser nano o vi; ir a la sección *Module Settings* y
modificar o agregar la línea *;date.timezone =* con lo siguiente:
date.timezone = America/El_Salvador

* Reiniciar el servicio de Apache para que la configuración surta efecto:

        /etc/init.d/apache2 restart

***************************************************************************************************
Instalación y configuración de la base de datos
-----------------------------------------
###Configuración de PostgreSQL
* Configurar PostgreSQL para conectarse con un usuario en particular.
Editar el archivo */etc/postgresql/9.1/main/pg_hba.conf* como
**usuario root**, con cualquier editor de texto, puede ser nano o vi:

* Ir al final del archivo e identificar las siguientes líneas:

        # "local" is for Unix domain socket connections only
        local   all         all                               peer
* Cambiar el valor *peer* por *md5*. Es posible que en lugar de peer
aparezca otro valor como ident, lo importante, es que se debe cambiar a
md5. La línea debería quedar como se muestra a continuación:

        # "local" is for Unix domain socket connections only
        local   all         all                               md5
* Reiniciar el servicio de postgres con la siguiente instrucción:

        /etc/init.d/postgresql restart

###Creación del usuario
* Como **usuario postgres** ejecutar la siguiente sentencia desde consola:

        createuser -DRSP nombreUsuario

###Creación de la base de datos
* Siempre como **usuario postgres** ejecutar la siguiente sentencia desde consola:

        createdb nombreBaseDatos -O nombreUsuario

*****************************************************************************************************
Instalación y configuración del SIBLH
---------------------------------------
La instalación puede realizarse de dos formas:

* Clonando el proyecto desde el servidor git.salud.gob.sv
* Copiando el proyecto directamente en el directorio raiz.

###Clonando el proyecto desde el servidor github
* Clonar el repositorio **git@github.com:symfony2jeni/SIBLH.git**
* Descargar el el archivo **composer.phar** como **usuario normal** con la
siguiente sentencia:

        curl -s https://getcomposer.org/installer | php

* Si se es un usuario para **desarrollo** se puede realizar una de las siguientes
opciones:
 * Crear una nueva rama para trabajar en ella con la siguiente sentencia:

        git checkout -b nombreRama

 * Si ya se posee una rama simplemente cambiar de rama con la siguiente
sentencia:

        git checkout nombreRama


 * Si ya se posee una rama simplemente cambiar de rama con la siguiente
sentencia:

        git checkout nombreRama

* Si es para **producción** no realizar cambio de rama y permanecer en la rama
master.
* Agregar el archivo **parameters.yml** en el directorio **app/config/** con un
contenido similar al siguiente:

        parameters:
            database_driver: pdo_pgsql
            database_host: nombreHost
            database_port: ''
            database_name: nombreBase
            database_user: usuarioBase
            database_password: contraseñaBase
            mailer_transport: smtp
            mailer_host: localhost
            mailer_user: null
            mailer_password: null
            locale: es_SV
 secret: df1ca40cfc425c4f34e654696720435a044b9ca9
            database_path: null

* Cambiar los parámetros por los datos que se definieron en la creación de la
base de datos.

* Siempre como **usuario normal** ejecutar:

         php composer.phar install

* Si da error ejecutar

         php composer.phar update

* Aplicar las acl al directorio cache y logs:

        setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/ web/imagenes
        setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache/ app/logs/ web/imagenes

******************************************************************************************************
###Creando el Virtual Host
* Como **usuario root** ejecutar:

        grep NameVirtualHost /etc/apache2/ports.conf

* Aparecerá algo similar a lo siguiente:

 1. NameVirtualHost 192.168.1.1:80
 2. NameVirtualHost *:80

* El caso 1 indica que NameVirtualHost está configurado en la IP 192.168.1.1 en
el puerto 80. Para el caso 2, NameVirtualHost está configurado para todas las
direcciones IP configuradas en el servidor en el puerto 80. Esta dirección IP
se repetirá en cada VirtualHost que se cree. Por lo que es importante colocar
el valor indicado.
* Como usuario root, moverse a la carpeta:

        cd /etc/apache2/sites-available/
        
* Con un editor de texto crear el archivo **siblh.localhost** con el siguiente
contenido:

        # Inicio del archivo
        <VirtualHost VARIABLE_RETORNADA>
        ServerName siblh.localhost
        DocumentRoot /var/www/siblh/web  ##Esta debe ser la ruta donde está el proyecto!
        DirectoryIndex app.php
        <Directory /var/www/siblh/web >  ##Esta debe ser la ruta donde está el proyecto!
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/siblh.localhost-error.log
        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
  LogLevel warn
        CustomLog ${APACHE_LOG_DIR}/siblh.localhost-access.log combined
        </VirtualHost>
        # Fin del archivo

* Guardar el archivo. Luego, como **root** ejecutar:

        a2ensite siblh.localhost

* Habilitar el modo de reescritura con la siguiente sentencia:

        a2enmod rewrite

* Reiniciar el servicio de Apache

        /etc/init.d/apache2 restart

* Se debe agregar en el archivo **/etc/hosts** la IP junto con el ServerName
del Virtual Host. La línea debe ser similar a la siguiente:

        X.X.X.X       siblh.localhost
