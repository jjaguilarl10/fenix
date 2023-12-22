<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Descripción proyecto demo

El proyecto esta desarrollado con las siguientes caracteristicas
- Laravel versión 8
- PHP: 7.4.29
- Boostrap V5

## Descripcion  General

El proyectgo y el codigo es solo una version demo y desmotractivo para uso de fenix.net. con el fin de revisar la funcionalidad segun especificaciones solicitadas.

## opciones de instalacion 

- Repositorio  https://github.com/jjaguilarl10/fenix.git

Instrucciones generales para instalacion y configuración 
git clone https://github.com/jjaguilarl10/fenix.git name-proyecto}

Una vez descargado correr los siguientes comandos

- composer update 

- crear base de datos Mysql 
- Actualizar .env 
    - DB_DATABASE= <nombre BD creada>
    - DB_USERNAME= <usuario BD creada>
    - DB_PASSWORD= <password BD creada>

una vez creada la bd se deben correr las siguientes instruccion para las bd creada

- php artisan migrate ( permite crear las diferentes tablas ustilizadas)
- php artisan db:seed ( permite crear los registro basicos/generales de las tablas de configuracion minima)

Nota : Dentro de los seeder se creara un usuario de prueba dentro de la tabla de users, para poder ingresar al sistema, este usuario tendra rol de admistrador.

para poner en ejecucion el proyecto puede correr la siguiente instruccion.

php artisan server --host 0.0.0.0 --port 8003 (el numero del puerto puede ser a su conveniencia)


