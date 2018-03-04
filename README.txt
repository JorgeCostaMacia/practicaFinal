Proveedores 2

Practica utilizando PHP - JS - JQUERY - AJAX - PDO - MYSQL
Esta implementada con MVC
Para hacer mas fluida la app, se realiza la mayor parte con js y llamadas ajax su clase correspondiente

v1 - Permite varios albaranes por pedido y una unica factura por albaran
v2 - Permite varios albaranes por pedido y agrupar albaranes en una factura de un mismo cliente

- - - - - PHP - - - - -
El control de acceso se realiza mediante sesiones
Las clases se cargan mediante autoloader
La configuración de la app se encuentra en  config

Controller:
    ajax    Gestiona las llamadas ajax
    cliente Gestiona las peticiones ajax para usuario cliente
    gestor Gestiona las peticiones ajax para usuario gestor
    head Gestiona la carga de ficheros css y el titulo de la pagina
    primary Gestiona la aplicación
    Cuenta con:
        2 gestores de dependencias, uno primario y otro para los cruds
        Una clase pos usuario encargada de gestionar las peticiones ajax
        Un crud y una entidad por cada tabla
        Una clase page encargada de la gestión de direcciones, redirecciones y títulos de las paginas
        Una clase include por cada usuario encargada de gestionar los includes de scripts js y php

Model:
    La base de datos esta implementada en PDO MYSQL
    Utiliza una librería propia. Cuenta con clase para conexión, una clase querys y clase usuario
    Los errores en la base de datos se controlan mediante excepciones, la clase dberror se encarga de almacenar cada error
    Cuenta con una clase entitie por cada tabla
    Una clase encargada de gestionar la sesión
    Una clase encargada de gestionar los datos

View:
    La pagina index recibe todas las llamadas, el controller primary se encarga de incluir y gestionar la pagina de forma dinámica
    Aquí están las paginas y partes de las paginas.
    Cuenta únicamente con una librería para mensajes, toda la vista se implementa en js, salvo al actualizar la sesión

- - - - - HTACCESS - - - - -
Cuenta con htaccess:
    Limitan accesos a las carpetas
    Reescribe url amigas
    Muestra paginas de error personalizadas

- - - - - JS - - - - -
Cuenta con un directorio por pagina

Cada directorio cuenta con:
    Un directorio controller, este contiene:
        Un directorio class que contiene
            Una clase Ajax para las llamadas
            Una clase para la gestión de la pagina
    Un directorio libraries, este contiene:
        Los ficheros con las librerías utilizadas
    Un directorio view, este contiene:
        Un fichero con la librería encargada para abrir los modales
        Un fichero con el nombre de la pagina, encargada gestionar las vistas de esa pagina

El carrito de compra se almacena en localstorage hasta su tramitación
Los pdf se montan mediante jspdf y los plugins addimagen y autotable
Los ficheros js se cargan mediante un único fichero js.min para reducir tiempos de carga
El apartado js esta implementado usando jquery
Los mensajes de error se muestran con modales

- - - - - CSS - - - - -
El estilo de la pagina esta implementado con bootstrap 3 mas css propio

