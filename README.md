# NexShop — Marketplace Multi-Vendor Premium

> Plataforma de e-commerce full-stack construida para demostrar dominio a nivel de producción del **TALL Stack** — con interfaz glassmórfica, interactividad en tiempo real, seguridad empresarial y un asistente de compras con Inteligencia Artificial integrada.

![Stack](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel)
![Livewire](https://img.shields.io/badge/Livewire-3.x-FB70A9?style=flat-square)
![Filament](https://img.shields.io/badge/Filament-v3-FDAE4B?style=flat-square)
![Tailwind](https://img.shields.io/badge/TailwindCSS-3.x-38BDF8?style=flat-square&logo=tailwindcss)
![License](https://img.shields.io/badge/propósito-portafolio-8B5CF6?style=flat-square)

---

## ¿Qué es este proyecto?

NexShop comenzó como una estructura de base de datos multi-vendor y fue transformado en una experiencia de e-commerce completa y lista para producción. Cada capa — desde el esquema de base de datos hasta el detalle visual de la interfaz — fue diseñada e implementada como demostración del desarrollo moderno con Laravel.

---

## Funcionalidades Destacadas

### Frontend Premium
- **Interfaz glassmórfica en modo oscuro** con gradientes, blur de fondo y micro-animaciones en toda la aplicación
- **Diseño responsive** desde móvil hasta pantallas ultra-wide
- **Sistema de layout unificado** mediante `layouts/app.blade.php` que garantiza consistencia visual en todas las vistas
- **NexBot — Asistente IA integrado** — widget de chat impulsado por la API de Groq (LLaMA 3) que responde preguntas sobre productos y vendedores en tiempo real, detectando automáticamente el idioma del usuario (español/inglés)

### Interactividad en Tiempo Real (Livewire 3)
- **Búsqueda predictiva** en la barra de navegación — filtra productos al instante con input con debounce, sin recargas de página
- **Carrito dinámico** — el botón "Añadir al carrito" dispara eventos de Livewire que actualizan el contador en tiempo real
- **Sistema de notificaciones Toast** — feedback visual animado para cada acción del usuario

### Seguridad Empresarial
- **Captcha matemático anti-bot** en Login y Registro — desarrollado a medida, sin dependencias externas
- **Cabeceras HTTP estrictas** — protección contra XSS, Clickjacking (`X-Frame-Options`) y sniffing de contenido
- **Validación HaveIBeenPwned** — bloquea contraseñas encontradas en filtraciones de datos conocidas
- **Laravel Policies** — aislamiento estricto que garantiza que cada usuario solo pueda acceder y modificar sus propios datos
- **Forzado de HTTPS** en entornos de producción

### Administración (Filament v3)
- Panel de administración completo en `/admin` con acceso basado en roles
- Gestión CRUD de Productos, Vendedores, Categorías y Pedidos
- Tablas de datos interactivas con filtros avanzados y acciones en lote
- Layouts personalizados de Filament manteniendo coherencia visual con la tienda

### Experiencia de Usuario Autenticada
- **Dashboards según rol** — vistas diferenciadas para Admin, Gestor de Vendedores, Vendedor y Cliente
- **Páginas de autenticación personalizadas** — Login y Registro rediseñados desde cero para mantener la estética premium
- **Historial de pedidos y actividad reciente** en el dashboard del cliente

### Arquitectura de Base de Datos
- **47+ migraciones** que cubren comisiones multi-vendor, variantes de producto, envíos globales, reseñas y más
- **20+ seeders** que simulan un marketplace activo con relaciones de datos realistas
- **Modo Eloquent estricto** configurado para detectar consultas N+1 y fugas de seguridad en desarrollo

---

## Stack Tecnológico

| Capa | Tecnología |
|---|---|
| Backend | Laravel 12.x |
| Reactividad | Livewire 3 |
| Estilos | Tailwind CSS |
| Micro-interacciones | Alpine.js |
| Panel Admin | Filament v3 |
| Autenticación | Laravel Breeze (personalizado) |
| Asistente IA | Groq API — LLaMA 3.3 70B |
| Base de datos | SQLite (por defecto) · MySQL · PostgreSQL |

---

## Estructura del Proyecto

```
routes/
├── web.php          # Punto de entrada principal
├── public.php       # Rutas accesibles para invitados
├── customer.php     # Rutas del cliente autenticado
├── vendor.php       # Rutas del dashboard de vendedor
├── admin.php        # Rutas exclusivas de administración
└── api.php          # Rutas API (endpoint del chat NexBot)

app/Http/Controllers/
└── ChatController.php   # Integración con la API de Groq para NexBot
```

Las rutas están separadas por rol para reforzar límites de dominio claros y facilitar la navegación y auditoría del código.

---

## Instalación

```bash
# 1. Clonar el repositorio
git clone <repository-url>
cd nexshop

# 2. Instalar dependencias
composer install --ignore-platform-reqs
npm install

# 3. Configuración del entorno
cp .env.example .env
php artisan key:generate

# 4. Añadir la API key de Groq al .env
GROQ_API_KEY=tu_key_aqui

# 5. Inicializar la base de datos
touch database/database.sqlite
php artisan migrate:fresh --seed

# 6. Iniciar los servidores de desarrollo
php artisan serve
npm run dev
```

---

## Cuentas de Prueba

Todas las cuentas usan la contraseña: `password`

| Rol | Email | Acceso |
|---|---|---|
| 🔴 Super Admin | `superadmin@nexshop.com` | Acceso total + panel Filament |
| 🟠 Admin | `test@example.com` | Panel admin + gestión |
| 🟡 Gestor de Vendedores | `vendormanager@nexshop.com` | Supervisión de operaciones |
| 🟢 Vendedor | `vendor@nexshop.com` | Dashboard + gestión de productos |
| 🔵 Atención al Cliente | `customerservice@nexshop.com` | Pedidos + devoluciones |
| 🟣 Gestor de Contenido | `contentmanager@nexshop.com` | Productos + categorías |
| ⚪ Usuario | *(regístrate con tu cuenta)* | Dashboard + compras |
| ⚫ Invitado | `guest@nexshop.com` | Acceso público limitado |

> Panel de administración: `/admin`

---

## Qué Demuestra Este Proyecto

- **Dominio del TALL Stack** — Laravel, Livewire, Alpine y Tailwind trabajando de forma cohesionada
- **Integración de APIs externas** — consumo de una API de IA de terceros (Groq) desde el backend Laravel
- **Ingeniería de seguridad** — más allá de la autenticación básica; cabeceras reforzadas, detección de brechas, aislamiento por policies
- **Diseño de base de datos** — esquema relacional complejo con 47+ migraciones
- **Cuidado de UI/UX** — atención al detalle a nivel de píxel con un lenguaje visual premium y consistente
- **Arquitectura basada en roles** — separación limpia de responsabilidades entre tipos de usuario
- **Prompt Engineering** — sistema de prompt de NexBot diseñado para respuestas multilingües y con contexto real de la base de datos

---

*Desarrollado como portafolio técnico. Cada línea de código escrita con la intención de demostrar pensamiento real a nivel de producción.*