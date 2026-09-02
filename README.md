# CRUD PHP - MVC

Proyecto de clase para reorganizar un CRUD PHP + MySQL usando Model, View, Controller y un Router sencillo.

## Estructura
- config/database.php → conexión
- models/User.php → datos y SQL
- controllers/UserController.php → coordinación
- views/ → HTML/presentación
- public/index.php → punto de entrada y Router
- database.sql → base de datos

## Ejecutar
1. Ejecutar `database.sql` en MySQL/phpMyAdmin.
2. Revisar `config/database.php` si las credenciales son diferentes.
3. Desde `CRUD_PHP_MVC` ejecutar:
   `php -S localhost:8000 -t public`
4. Abrir `http://localhost:8000`

## Flujo
Navegador → Router → Controller → Model → MySQL → Model → Controller → View → HTML

## Acciones
- `index.php?action=index`
- `index.php?action=create`
- `index.php?action=edit&id=1`
- `index.php?action=delete&id=1`

Los formularios utilizan POST para `store` y `update`.
