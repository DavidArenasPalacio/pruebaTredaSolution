## Prueba treda solution

versión de mysql:  Ver 15.1 Distrib 10.4.28-MariaDB,
versión de PHP: php 8.2
composer: version 2.5.5
laravel: version 10

Instalar las versiones actualizadas en tu equipo en el caso de no estarlo

# Instructivo para compilar el proyecto

1. Clona el repositorio, preferiblemente en xampp (htdocs) en el servidor de PHP:

```sh
https://github.com/DavidArenasPalacio/pruebaSolutionTreda/
```
2. Para acceder a los  ejercicio de PHP y SQL entra a las siguientes carpetas: 
-pruebaṔHP
-pruebaSQL

2. para ejecutar el proyecto de laravel accede a la caperta "CrudPrueba":
- Abre la  termina y ejecuta: 
```sh
composer install
```
-Crea la base de datos con el nombre de "crudPrueba", luego de eso ejecuta el siguiente comando en la terminal para migrar la base de datos: 
- Abre la  termina y ejecuta: 
```sh
php artisan migrate
```


3. Ejecutar el proyecto en el servidor local de laravel  con el siguiente comando en la terminal:

```sh
php artisan serve
```
