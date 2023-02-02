Sistema de citas medicas desarrollada en Laravel, utilizando PHP  Version 8.1
<p align="center"><a href="#" target="_blank"><img src="public/vendors/images/blue-logo.png" width="400" alt="Laravel Logo"></a></p>

## Instalacion
- Instale un servidor local como XAMPP o WAMP que incluya PHP, MySQL y Apache.
- Primero se instala las dependencias de Composer.
<code>composer install</code>
- Luego se instalan las dependencias de Node.js
<code>npm install</code>
- Genera el Key para la aplicion.
<code>php artisan key:generate</code>
- Se crea la base de datos y las tablas.
<code>php artisan migrate</code>
- Por último se generan los datos con los seeders.
<code>php artisan db:seed</code>




## El porque utilizamos Laravel
- Utilizamos Laravel en la cual es un framework PHP de código abierto para desarrollo de aplicaciones web. Es uno de los más populares y utilizados en la actualidad, Lavarel nos ayuda desarrollar una aplicación mediante su sistema de paquetes dado que el framework es del tipo MVC (Modelo-Vista-Controlador) nos permite relajarnos en ciertos aspectos del desarrolló, como instancias clases y métodos para usarlos en muchas partes de nuestro código sin necesidad de escribirlo y repetirlo permitiendo su limpia reutilización. Desde la línea de comandos existe el famoso Artisan que es el nombre de su interfaz de comandos que ejecuta muchas de las funcionalidades como son crear controladores, modelos, interfaces, migraciones y demás, así como poder ejecutar la aplicación o pararla.
