# Sistema de Votación - Backend (Laravel)

Este proyecto es una API en Laravel para gestionar un sistema de votación donde los administradores pueden registrar votantes y los votantes pueden emitir sus votos.

---

## 🚀 Instalación

### **1️⃣ Clonar el repositorio**

```sh
 git clone https://github.com/camilocaminada/vote-system.git
 cd vote-system
```

### **2️⃣ Instalar dependencias**

```sh
composer install
```

### **3️⃣ Configurar el archivo**

Copia el archivo de configuración y edítalo:

```sh
cp .env.example .env
```

Abre `.env` y asegúrate de configurar la conexión a la base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=votacion_db
DB_USERNAME=root
DB_PASSWORD=
```

### **4️⃣ Generar la clave de la aplicación**

```sh
php artisan key:generate
```

### **5️⃣ Ejecutar migraciones y seeders**

```sh
php artisan migrate --seed
```

Esto creará las tablas necesarias en la base de datos y agregará datos de prueba.

### **6️⃣ Iniciar el servidor**

```sh
php artisan serve
```

El servidor estará disponible en: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🛠️ **Endpoints Disponibles**

### **Autenticación (Admins)**

- `POST /api/admins/register` → Registrar un administrador
- `POST /api/admins/login` → Iniciar sesión (devuelve un token)
- `POST /api/admins/update-password` → Actualizar contraseña (requiere autenticación)

### **Votantes**

- `POST /api/voters/register` → Registrar un votante (solo administradores)

### **Votación**

- `GET /api/candidatos` → Listar candidatos
- `POST /api/votar` → Emitir un voto

---

## 🔐 **Autenticación con Sanctum**

Este proyecto usa **Laravel Sanctum** para la autenticación de administradores. Asegúrate de incluir el token en las solicitudes protegidas:

```sh
Authorization: Bearer <TOKEN>
```
---

## 📌 **Extras**

- **Laravel** 10.x
- **MySQL** como base de datos
- **Sanctum** para autenticación
---

### ✅ **Listo para usar!**
