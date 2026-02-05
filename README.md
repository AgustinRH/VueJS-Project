## Descripción General

Este proyecto es una aplicación web moderna desarrollada con **Laravel** como backend y **Vue.js** como frontend. Permite gestionar cursos y estudiantes de manera eficiente, proporcionando una API REST completa para operaciones CRUD y una interfaz intuitiva basada en componentes Vue.js.

### Stack Tecnológico

- **Backend**: Laravel 11 (PHP Framework)
- **Frontend**: Vue.js 3 + Vite (build tool)
- **Base de Datos**: SQLite / MySQL
- **Autenticación**: Laravel Sanctum (OAuth2)
- **Contenedorización**: Docker (Docker Compose)
- **Testing**: PHPUnit + Mockery
- **Package Manager**: Composer (PHP) + npm (JavaScript)

---

## 📋 Requisitos Previos

Antes de instalar el proyecto, asegúrate de tener:

- **PHP 8.2+** (con extensiones: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath)
- **Composer** (gestor de dependencias PHP)
- **Node.js 18+** y **npm 9+** (para el frontend)
- **Docker** y **Docker Compose** (opcional, para desarrollo containerizado)
- **Git** (para clonar el repositorio)

---

## 🚀 Instalación y Configuración

### 1. Clonar el Repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
cd VueJs
```

### 2. Instalar Dependencias del Backend

```bash
# Instalar dependencias PHP
composer install

# Crear archivo .env a partir de .env.example
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 3. Configurar la Base de Datos

Edita el archivo `.env` y configura tus credenciales de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

Ejecuta las migraciones:

```bash
php artisan migrate

# (Opcional) Ejecutar seeders para datos de prueba
php artisan db:seed
```

### 4. Instalar Dependencias del Frontend

```bash
npm install
```

### 5. Compilar Activos Frontend

```bash
# Desarrollo (con hot reload)
npm run dev

# Producción
npm run build
```

### 6. Iniciar el Servidor

```bash
# Terminal 1: Servidor Laravel
php artisan serve

# Terminal 2: Dev server Vite (si no está en mode dev)
npm run dev
```

La aplicación estará disponible en:
- Backend: `http://localhost:8000`
- Frontend: `http://localhost:5173` (si usas Vite dev server)

---

## 📁 Estructura del Proyecto

### Backend (Laravel)

```
app/
├── Http/
│   └── Controllers/          # Controladores para rutas API
├── Models/
│   ├── Course.php           # Modelo para Cursos
│   ├── Student.php          # Modelo para Estudiantes
│   └── User.php             # Modelo para Usuarios/Autenticación
└── Providers/
    └── AppServiceProvider.php

routes/
├── api.php                  # Rutas API (JSON)
├── web.php                  # Rutas web (HTML)
└── console.php              # Comandos Artisan

database/
├── migrations/              # Migraciones de BD
│   ├── create_users_table
│   ├── create_courses_table
│   └── create_students_table
└── seeders/                 # Seeders para datos de prueba
    ├── UserSeeder
    ├── CourseSeeder
    └── StudentSeeder

tests/                        # Tests unitarios y funcionales
├── Feature/
└── Unit/

config/                       # Archivos de configuración
├── app.php
├── database.php
├── auth.php
└── ...
```

### Frontend (Vue.js)

```
resources/
├── js/
│   ├── app.js              # Punto de entrada de la aplicación
│   ├── bootstrap.js        # Configuración de axios y servicios
│   ├── router.js           # Vue Router (rutas del frontend)
│   ├── state.js            # State management (Vuex/Pinia)
│   ├── App.vue             # Componente raíz
│   └── components/         # Componentes Vue reutilizables
└── css/
    └── app.css             # Estilos globales
```

---

## 📊 Modelos de Base de Datos

### Tabla: `users`
Almacena información de usuarios del sistema.

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT | Identificador única |
| name | VARCHAR | Nombre del usuario |
| email | VARCHAR | Email (único) |
| password | VARCHAR | Contraseña hasheada |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

### Tabla: `courses`
Almacena información de los cursos.

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT | Identificador único |
| code | VARCHAR | Código del curso |
| name | VARCHAR | Nombre del curso |
| description | TEXT | Descripción del curso |
| credits | INT | Créditos académicos |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

### Tabla: `students`
Almacena información de los estudiantes.

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | INT | Identificador único |
| user_id | INT (FK) | Referencia a usuarios |
| enrollment_number | VARCHAR | Número de matrícula |
| major | VARCHAR | Carrera/especialidad |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

---

## 🔗 API REST

### Autenticación

Todos los endpoints (excepto login/register) requieren autenticación con token Sanctum.

**Login:**
```http
POST /api/login
Content-Type: application/json

{
  "email": "usuario@example.com",
  "password": "contraseña"
}

Respuesta:
{
  "token": "YOUR_API_TOKEN",
  "user": { ... }
}
```

### Endpoints de Cursos

```http
# Listar todos los cursos
GET /api/courses
Authorization: Bearer {token}

# Crear nuevo curso
POST /api/courses
Authorization: Bearer {token}
Content-Type: application/json
{
  "code": "CS101",
  "name": "Introducción a Programación",
  "description": "...",
  "credits": 3
}

# Obtener curso específico
GET /api/courses/{id}
Authorization: Bearer {token}

# Actualizar curso
PUT /api/courses/{id}
Authorization: Bearer {token}

# Eliminar curso
DELETE /api/courses/{id}
Authorization: Bearer {token}
```

### Endpoints de Estudiantes

```http
# Listar todos los estudiantes
GET /api/students
Authorization: Bearer {token}

# Crear nuevo estudiante
POST /api/students
Authorization: Bearer {token}
{
  "user_id": 1,
  "enrollment_number": "2024001",
  "major": "Ingeniería Informática"
}

# Obtener estudiante específico
GET /api/students/{id}

# Actualizar estudiante
PUT /api/students/{id}

# Eliminar estudiante
DELETE /api/students/{id}
```

---

## 🎨 Frontend (Vue.js)

### Estructura de Componentes

Los componentes Vue están organizados en:

- **App.vue**: Componente raíz
- **components/**: Componentes reutilizables (botones, formularios, etc.)

### Router (Vue Router)

El archivo `router.js` define las rutas del frontend:

```javascript
- /              → Dashboard/Home
- /courses       → Listado de cursos
- /courses/create → Crear curso
- /courses/:id   → Editar curso
- /students      → Listado de estudiantes
- /students/create → Crear estudiante
- /login         → Login
- /register      → Registro
```

### State Management

El archivo `state.js` gestiona el estado global de la aplicación (usuarios, cursos, estudiantes).

---

## 🧪 Testing

### Ejecutar Tests

```bash
# Todos los tests
php artisan test

# Tests específicos
php artisan test tests/Feature/ExampleTest.php
php artisan test tests/Unit/ExampleTest.php

# Con salida detallada
php artisan test --verbose
```

### Estructura de Tests

```
tests/
├── Feature/         # Tests de funcionalidad e integración
│   └── ExampleTest.php
└── Unit/           # Tests unitarios
    └── ExampleTest.php
```

---

## 🐳 Docker

El proyecto incluye `compose.yaml` para ejecutarlo en contenedores.

### Iniciar con Docker

```bash
docker-compose up -d
```

Esto levanta:
- Servidor de aplicación (Laravel)
- Base de datos (MySQL/PostgreSQL según configuración)

---

## 🔐 Variables de Entorno

Principales variables en `.env`:

```env
APP_NAME="Sistema de Gestión"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cursos_db
DB_USERNAME=root
DB_PASSWORD=

SANCTUM_STATEFUL_DOMAINS=localhost,127.0.0.1
SESSION_DOMAIN=localhost
```

---

## 📦 Dependencias Principales

### Backend
- `laravel/framework`: Framework PHP
- `laravel/sanctum`: Autenticación API
- `nunomaduro/collision`: Reportes de errores mejorados

### Frontend
- `vue`: Framework JavaScript
- `vue-router`: Enrutamiento
- `axios`: Cliente HTTP

Para ver todas, revisar `composer.json` y `package.json`.

---

## 🛠 Comandos Útiles

```bash
# Laravel
php artisan serve              # Iniciar servidor
php artisan migrate            # Ejecutar migraciones
php artisan db:seed            # Ejecutar seeders
php artisan tinker             # REPL interactivo
php artisan make:model Model   # Crear modelo
php artisan make:controller Controller # Crear controlador
php artisan make:migration migration_name

# NPM
npm run dev                    # Dev server Vite
npm run build                  # Build para producción
npm run preview               # Vista previa de build
```

---

## 🚨 Solución de Problemas

### Error de permisos en storage/
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### Limpiar caché
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Regenerar autoloader
```bash
composer dump-autoload
```

---

## 📝 Licencia

Este proyecto está bajo la licencia MIT. Ver archivo LICENSE para más detalles.

---

## 👥 Contribución

Las contribuciones son bienvenidas. Por favor:

1. Haz un fork del proyecto
2. Crea una rama para tu feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commits tus cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

---

## 📞 Soporte

Para reportar problemas o sugerencias, abre un issue en el repositorio.

---

**Última actualización**: Febrero 2026
