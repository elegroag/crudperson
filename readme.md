Ingreso C9.io   
==============

Editor publico  
---------------------
https://ide.c9.io/maxedwwin/crudperson  

Run mysql   
--------------
mysql-ctl start 

Run server  
-----------
php artisan serve --host=$IP --port=8080    

Acceso URL 
-------------------------
http://crudperson-maxedwwin.c9users.io:8080/    


Laravel@5.5
==========================
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Detalles CRUD
=====================

CRUD de personas
----------------

*1 Generar un CRUD (por ajax) de registro de personas (campos generales), por cada campo realizar su validación correspondiente, Ejemplo: email (validar formato correo asdf@edsd.wey).
    Obligatorio incluir select anidado con país, departamento y municipio por ajax, donde el valor a relacionar con la persona es el municipio.

*2. Autenticación
    Apoyado por la autenticación que ofrece Laravel permitir que las personas insertadas en el punto 1 puedan ingresar por medio del email y una contraseña.

*3. Registro de emails
    Solo usuarios autenticados deben poder acceder a un formulario, donde puedan realizar la inserción de los datos comunes de email (asunto, destinatario y mensaje ) para un envío posterior (cola de emails).
    Dicho registro debe ir relacionado con el usuario que envía el email.

*4. Envío de emails
    Los emails registrados en el punto anterior deben poderse enviar en secuencia, por medio de una función registrando cuales fueron enviados y cuáles no.
    Ideal: ejecucion de envío de email por medio de comando en artisan.

*5. Crear y subir los datos en un repositorio en GIT, cada punto debe ir en un commit diferente. 

*6. Adicionales: uso de Angular, validaciones automáticas js, realizar migrations, comentar el código.
    OPCIONAL: Vista para ver los emails del usuario con su respectivo estado.