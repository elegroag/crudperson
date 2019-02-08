Prueba Crud Laravel Angular	
===========================

*composer create-project --prefer-dist laravel/laravel crudpersonas "5.5.*"	


Borrar Vue.js y Bootstrap	
========================	
php artisan preset none	


Name 
php artisan app:name crudperson

Host
127.0.0.1 crudperson.com

Resources
==========
php artisan make:controller PaicesController --resource
php artisan make:controller DepartamentosController --resource
php artisan make:controller MunicipiosController --resource
php artisan make:controller PersonasController --resource
php artisan make:controller EmailsController --resource

#DASHBOARD
php artisan make:controller DashPersonasController


Models
=========
php artisan make:model Personas -m
php artisan make:model Paices -m
php artisan make:model Departamentos -m
php artisan make:model Municipios -m
php artisan make:model Emails -m


Seeder
==========
php artisan make:seeder PaicesTableSeeder
php artisan make:seeder DepartamentosTableSeeder
php artisan make:seeder MunicipiosTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder PersonasTableSeeder


views
=======
 --path=crudlara/Views/dashboard/dash_personas


Run seeder
======
php artisan db:seed
php artisan db:seed --class=PersonasTableSeeder



RUN c9.io
=================
php artisan serve --host=$IP --port=8080


RUTA
=======================
http://crudperson-maxedwwin.c9users.io:8080/