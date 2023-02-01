Sistema de citas medicas desarrollada en Laravel, utilizando PHP  Version 8.1

## Instalacion
-Instale un servidor local como XAMPP o WAMP que incluya PHP, MySQL y Apache.
-Primero se instala las dependencias de Composer.
<code>composer install</code>
-Luego se instalan las dependencias de Node.js
<code>npm install</code>
-Genera el Key para la aplicion.
<code>php artisan key:generate</code>
-Se crea la base de datos y las tablas.
<code>php artisan migrate</code>
-Por último se generan los datos con los seeders.
<code>php artisan db:seed</code>




## El porque utilizamos Laravel