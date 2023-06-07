# Podcast #

Pequeño CRUD de podcast y usuarios.

### Instalación ###

Generar el archivo .env de laravel y lanzar el comando: ` php artisan storage:link `, crear una bd y lanzar el comando ` php artisan migrate:fresh --seed ` para que se generen las tablas y el administrador 

<hr>
## Usuarios ##

Usuarios con la funcionalidad de softdelete en lugar de la funcionalidad normal de borrado junto con roles.


Debido a que los usuarios por defecto se crean com el rol de usuario el que se genera automaticamente al lanzar migraciones y la seed del proyecto con el siguiente comando: 
 ` php artisan migrate:fresh --seed `


Usuario por defecto
 
 email => admin@admin.com <br>
 password => 123456789




- [x] Create <br>
- [x] Read <br>
- [x] Update <br>
- [x] Delete (sofdelete) <br>
<hr>

## Podcast ##

Podcast junto con fotos y descripción.

- [x] Create <br>
- [x] Read<br>
- [x] Update<br>
- [x] Delete (sofdete) <br>

<hr>
Creado por Miguel Ángel Blanco González