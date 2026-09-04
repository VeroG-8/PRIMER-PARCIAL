# CRUD PHP - MVC - AUTENTICACIÓN Y AUTORIZACIÓN

Aplicación web desarrollada en **PHP y MySQL**, utilizando el patrón **MVC (Model - View - Controller)**.

El proyecto implementa un **CRUD de usuarios**, junto con un sistema de **autenticación mediante sesiones** y **autorización basada en roles**.

---

## 1. Tecnologías utilizadas

* PHP
* MySQL
* PDO
* HTML5
* CSS3
* XAMPP
* Arquitectura MVC
* Router sencillo mediante `index.php`

---

## 2. Base de datos

El proyecto utiliza la base de datos:

`DBLogin`

La tabla `users` tiene la siguiente estructura:

| Campo           | Descripción                         |
| --------------- | ----------------------------------- |
| `user_id`       | Identificador único                 |
| `firstname`     | Nombre                              |
| `lastname`      | Apellido                            |
| `address`       | Dirección                           |
| `contact`       | Contacto                            |
| `email`         | Correo electrónico                  |
| `password_hash` | Contraseña almacenada mediante hash |
| `rol`           | Rol del usuario                     |

La contraseña **no se almacena en texto plano**. Se utiliza `password_hash()` para generar el hash y `password_verify()` para validar las credenciales durante el inicio de sesión.

---

## 3. Preparar los datos de prueba

En **phpMyAdmin**, ejecutar o importar el archivo:

`database.sql`

El archivo crea la base de datos `DBLogin` en caso de que no exista y genera los datos de prueba necesarios.

### Credenciales de prueba

| Rol           | Email             | Contraseña |
| ------------- | ----------------- | ---------- |
| Usuario       | `juan@gmail.com`  | `juan123`  |
| Administrador | `pedro@gmail.com` | `pedro123` |

El usuario administrador tiene permisos para realizar las operaciones del CRUD, mientras que el usuario común dispone de acceso de solo lectura.

---

## 4. Configuración

La configuración predeterminada utiliza:

```text
Servidor:   127.0.0.1
Base de datos: DBLogin
Usuario:     root
Contraseña:  vacía
```

Si la configuración de MySQL es diferente, modificar el archivo:

`config/database.php`

---

## 5. Requisitos

Para ejecutar el proyecto se necesita:

* PHP 8 o superior
* MySQL
* XAMPP o un servidor MySQL equivalente
* Navegador web

También es necesario contar con la extensión **PDO MySQL** habilitada en PHP.

---

## 6. Ejecución del proyecto

Si el proyecto se encuentra en:

```text
/opt/lampp/htdocs/PRIMER-PARCIAL
```

Primero iniciar XAMPP:

```bash
sudo /opt/lampp/lampp start
```

Luego ingresar a la carpeta del proyecto:

```bash
cd /opt/lampp/htdocs/PRIMER-PARCIAL
```

Iniciar el servidor de desarrollo de PHP:

```bash
php -S localhost:8000 -t public
```

Finalmente, abrir en el navegador:

```text
http://localhost:8000
```

> El servidor integrado de PHP utiliza la carpeta `public` como directorio público de la aplicación.

---

## 7. Autenticación

Al ingresar a la aplicación se muestra el formulario de **Login**.

El usuario debe ingresar:

* Email
* Contraseña

El sistema busca el usuario mediante su email y verifica la contraseña utilizando `password_verify()`.

Si las credenciales son correctas, se inicia una sesión y se almacenan los datos necesarios del usuario:

```php
$_SESSION['usuario_id']
$_SESSION['usuario_nombre']
$_SESSION['usuario_rol']
```

Al iniciar sesión correctamente también se regenera el identificador de sesión mediante:

```php
session_regenerate_id(true);
```

Esto ayuda a prevenir ataques de fijación de sesión.

---

## 8. Autorización y roles

El sistema utiliza dos roles:

### Usuario

Un usuario autenticado:

* Puede acceder a la lista de usuarios.
* Puede consultar la información.
* No puede crear usuarios.
* No puede editar usuarios.
* No puede eliminar usuarios.
* Visualiza la opción **Solo lectura**.

### Administrador

Un administrador:

* Puede acceder a la lista de usuarios.
* Puede crear usuarios.
* Puede editar usuarios.
* Puede eliminar usuarios.

La autorización se controla desde el **Controller** mediante la comprobación del rol almacenado en la sesión.

> Ocultar botones en la vista solamente mejora la interfaz. La seguridad real se aplica en el Controller, donde se bloquean las acciones no autorizadas.

---

## 9. Acciones principales

El proyecto utiliza un router sencillo ubicado en:

`public/index.php`

Algunas de las acciones disponibles son:

```text
index.php?action=login
index.php?action=logout
index.php?action=index
index.php?action=create
index.php?action=store
index.php?action=edit&id=1
index.php?action=update
index.php?action=delete&id=1
```

Las acciones de creación, modificación y eliminación requieren permisos de administrador.

---

## 10. Estructura del proyecto

```text
PRIMER-PARCIAL/
│
├── config/
│   └── database.php
│
├── controllers/
│   ├── AuthController.php
│   └── UserController.php
│
├── models/
│   └── User.php
│
├── views/
│   ├── auth/
│   │   └── login.php
│   │
│   ├── layouts/
│   │   ├── header.php
│   │   └── footer.php
│   │
│   └── users/
│       ├── create.php
│       ├── edit.php
│       └── index.php
│
├── public/
│   ├── index.php
│   │
│   └── css/
│       ├── style.css
│       └── style-form.css
│
└── database.sql
```

### Descripción de los componentes

* `config/database.php` → configuración y conexión con MySQL mediante PDO.
* `models/User.php` → acceso a los datos y consultas SQL relacionadas con usuarios.
* `controllers/UserController.php` → lógica del CRUD y control de permisos.
* `controllers/AuthController.php` → autenticación, inicio y cierre de sesión.
* `views/auth/login.php` → formulario de inicio de sesión.
* `views/users/` → vistas correspondientes al CRUD de usuarios.
* `views/layouts/` → elementos reutilizables de la interfaz.
* `public/index.php` → punto de entrada de la aplicación y router.
* `public/css/` → hojas de estilo.
* `database.sql` → creación de la base de datos y datos de prueba.

---

## 11. Flujo de la aplicación

El funcionamiento general sigue el siguiente flujo:

```text
Navegador
    ↓
Router (public/index.php)
    ↓
Controller
    ↓
Model
    ↓
MySQL
    ↓
Model
    ↓
Controller
    ↓
View
    ↓
HTML
    ↓
Navegador
```

Para la autenticación:

```text
Login
  ↓
AuthController
  ↓
User Model
  ↓
MySQL
  ↓
Verificación de contraseña
  ↓
Sesión
  ↓
Acceso según rol
```

---

## 12. Formularios y métodos HTTP

Los formularios utilizan el método **POST** para las operaciones que modifican información:

* `store` → crear usuario.
* `update` → modificar usuario.
* `login` → iniciar sesión.

Las operaciones de consulta utilizan solicitudes **GET**.

---

## 13. Seguridad implementada

El proyecto incorpora algunas medidas básicas de seguridad:

* Contraseñas almacenadas mediante `password_hash()`.
* Verificación mediante `password_verify()`.
* Uso de consultas preparadas con PDO.
* Protección de rutas mediante sesiones.
* Control de acceso según rol.
* Regeneración del ID de sesión después del login.
* Uso de `htmlspecialchars()` para mostrar datos provenientes del usuario.
* Validación básica de emails y datos recibidos mediante formularios.

---

