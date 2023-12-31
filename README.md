![gruas](/assets/img/camion-grua.png)
# Gruas Puebla 

En la era digital actual, la eficiencia en la gestión de servicios de remolque de vehículos se ha convertido en una prioridad. Para abordar esta necesidad, hemos desarrollado una plataforma especializada que utiliza tecnología de geolocalización para optimizar el proceso de remolque, permitiendo a las grúas llevar los vehículos al corralón más cercano de manera rápida y precisa.
Este proyecto es una aplicación web desarrollada con PHP, MySQL, Bootstrap y JavaScript.

## Tecnologías Empleadas
- **PHP**: Lenguaje de programación del lado del servidor.
- **MySQL**: Sistema de gestión de bases de datos relacional.
- **Bootstrap**: Framework CSS para el diseño y la interfaz de usuario.
- **JavaScript**: Lenguaje de programación del lado del cliente para mejorar la interactividad.

## Requisitos de Instalación
Asegúrate de tener instalados los siguientes requisitos antes de comenzar:
- Servidor web 
- PHP 
- MySQL

### Installacion y Configuracion Inicial
- **XAMPP**: Servidor web que incluye Apache, MySQL y PHP.

Para llevar a cabo este proyecto, se ha decidido utilizar XAMPP, un conjunto integral que integra un servidor web Apache, una base de datos MySQL y el lenguaje de programación PHP. Esta elección se basa en la necesidad de contar con un entorno de desarrollo eficiente para la creación y gestión de aplicaciones web.

Puedes descargar XAMPP [aquí](https://www.apachefriends.org/download.html) según tu sistema operativo.

1. **Descarga e Instalación de XAMPP**:
   - Descarga e instala.

2. **Inicia XAMPP**:
   - Inicia XAMPP y asegúrate de que los servicios de Apache y MySQL estén activos.

3. **Configuración de la Base de Datos**:
   - Accede a `http://localhost/phpmyadmin` en tu navegador.
   - Crea una nueva base de datos, por ejemplo, `login`.
   - Importa el archivo SQL proporcionado en la carpeta raiz llamado `login.sql` para inicializar la base de datos.

4. **Configuración de PHP y Apache**:
   - Abre el archivo `php.ini` (puedes encontrarlo en la carpeta `php` de tu instalación de XAMPP).
   - Asegúrate de que las extensiones necesarias estén habilitadas, por ejemplo:
     ```ini
     extension=mysqli
     extension=pdo_mysql
     ```
   - Reinicia el servicio de Apache después de hacer cambios en la configuración.

5. **Configuración del Proyecto**:
   - En la carpeta htdocs crearas una cartpeta en donde se almacenara la paguna
   - El archivo `conexion.php` contiene la configuracion para la conexion a la base de datos

6. **Estructura del Proyecto**:
   - `./assets`: Contiene los archivos públicos (CSS, JavaScript, imágenes) accesibles desde el navegador.
   - `./Controller`: contiene la lógica que actualiza el modelo y/o vista.
   - `./Model`: conexiones y archivos relacionados con la base de datos.
   - `./pages`: Contiene el código fuente PHP de la aplicación.
   - `login.php e inicio.php `: archivos donde se inicialicia la web.

7. **Accede al Proyecto**:
   - Abre tu navegador y accede a `http://localhost/tu-carpeta/login.php` para ver la aplicación.

## Visualizacion de la pagina || Capturas de Pantalla / Imágenes

![Pagina de inicio](/assets/img/Capturas/login.png)
*Al realizar la instacion del proyecto, lo primero que encotraremos sera un login el cual nos permitira ingresar de manera correcta*

![Home](/assets/img/Capturas/Inicio.png)
*Una vez ingresado podemos notar un barra de navegacion al cual nos permite ingresar al uso de la geocalizacion*

![Home](/assets/img/Capturas/mapa.png)
*Por ultimo podemos visualizar el uso de la GoogleMaps para hacer uso de la geocalizacion y trazado de rutas, notando de primera mano los puntos ya establecidos dentro del mapa antes mencionado*

# codigo
 
## login.php
Al entrar a nuestra página, necesitarás iniciar sesión para acceder a otras secciones. Si no tienes una sesión activa, el controlador 'controller_login.php' te llevará de vuelta al inicio de sesión.
![image](/assets/img/codeController.png)
*la session se guardara asta ser cerrada*
## inicio.php 
La página principal servirá como punto de partida para explorar el sitio web, mostrando las opciones disponibles y proporcionando información relevante sobre la plataforma.
![image](/assets/img/codeinicio.png)

Esta sección también nos brinda acceso a la opción de salir, a través de un controlador llamado 'controlador_cerrar_session.php', el cual terminará nuestra sesión y nos dirigirá de vuelta al inicio de sesión
![image](/assets/img/cerrar.png)

## mapa.php
En esta sección, tendrás acceso a todo lo relacionado con la geolocalización, incluyendo la visualización de las direcciones guardadas.
![image](/assets/img/mapa.png)



Equipo 11 :shipit: