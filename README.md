# App Backoffice

## Descripción del proyecto
Aplicación web hecha principalmente para el administrador de esta con la cual un administrador puede gestionar los usuarios, proveedores, productos y pedidos.

Además de todo eso, hemos añadido funcionalidades para que los clientes también puedan hacer sus pedidos desde esta web, poder gestionarlos y editar su perfil por completo.

## Instalación del proyecto y desplegarlo
1. Hacer un git clone del repositorio
2. Crear una nueva rama y programar en ella
3. Subirla a master
4. Ejecutar comando dep deploy

## Ip de la máquina y políticas de seguridad aplicadas (Puertos abiertos)
###### IP pública 
34.207.156.33

###### Puertos de seguridad
![Puertos de seguridad](/imgs/puertosSeguridad.png)

## Servicios y versiones instaladas
###### Servicio Nginx
![Versión Nginx](/imgs/versionNginx.png)

###### Servicio php
![Versión php](/imgs/versionPHP.png)

###### Servicio ssh
![Versión SSH](/imgs/versionSSH.png)

## Usuarios creados y privilegios asignados
Hemos creado el usuario *backoffice* con los siguiente privilegios:

Carpeta   | Privilegios 
--------- | ----------- 
/var/www/backoffice/html  | 755

A parte de este usuario tabmién se ha creado automaticamente el usuario *ubuntu* tiene aceso a todas las carpetas de la instancia como root.

## URL de la página web desplegada
backoffice.g06.batoilogic.es

## Desplegamiento de la web
![Despliegue web](/imgs/despliegueWeb.png)
