# MY Movies Db

# 🎬 Base de Datos de Películas en PHP y MySQL

Este es un proyecto de base de datos de películas desarrollado en PHP y MySQL. Permite a los usuarios registrarse, iniciar sesión, agregar, modificar y eliminar películas. El diseño está basado en Bootstrap y Font Awesome con un estilo similar a Filmin.

## 🚀 Características

- Listado de películas con imagen, título, año, género, descripción y rating.
- Registro e inicio de sesión de usuarios.
- Cada usuario puede gestionar sus propias películas.
- Buscador de películas.
- Ficha detallada por cada película.
- Diseño responsive basado en Bootstrap y Font Awesome.

## 📌 Instalación

### 1️⃣ Requisitos previos

- Servidor web (Apache recomendado).
- PHP instalado.
- MySQL o MariaDB instalado.
- phpMyAdmin (opcional, para administrar la base de datos más fácilmente).

### 2️⃣ Clonar el repositorio

```bash
 git clone https://github.com/tu_usuario/movie_db.git
 cd movie_db
```

### 3️⃣ Configurar la base de datos

1. Accede a MySQL y ejecuta las siguientes consultas para crear la base de datos y las tablas necesarias:

```sql
CREATE DATABASE movie_db;

USE movie_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    genre VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    rating FLOAT NOT NULL CHECK (rating >= 0 AND rating <= 10),
    poster VARCHAR(255) NOT NULL,
    director varchar(255) DEFAULT NULL,
    actors text DEFAULT NULL,
    country varchar(100) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

2. Configura la conexión a la base de datos en el archivo `config.php`:

```php
<?php
$host = "localhost";
$dbname = "movie_db";
$username = "tu_usuario";
$password = "tu_contraseña";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
```

### 4️⃣ Ejecutar el proyecto

1. Inicia el servidor local de PHP:

```bash
php -S localhost:8000
```

2. Abre tu navegador y accede a:

```
http://localhost:8000/
```

## 🛠 Tecnologías utilizadas

- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- Font Awesome


