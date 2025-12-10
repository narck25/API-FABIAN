# One Piece Characters Manager

Un sistema de gestión de personajes de One Piece desarrollado con Laravel 12. Este proyecto incluye una API REST completa y una interfaz web para administrar personajes de la serie.

## 🚀 Características

- **API REST completa** para gestión de personajes
- **Interfaz web** con formularios CRUD
- **Base de datos** MySQL
- **Validación** de datos
- **Mensajes de éxito/error**
- **Diseño responsive** con Tailwind CSS

## 📋 Requisitos del Sistema

- PHP 8.5
- Composer
- MySQL

## 📖 Uso

### Interfaz Web

- **Lista de personajes**: `http://127.0.0.1:8000/personajes`
- **Agregar personaje**: `http://127.0.0.1:8000/personajes/agregar`
- **Editar personaje**: `http://127.0.0.1:8000/personajes/modificar/{id}`
- **Eliminar personaje**: `http://127.0.0.1:8000/personajes/eliminar`

### API REST

Base URL: `http://127.0.0.1:8000/api/onepiece`

## 🏗️ Arquitectura

### Estructura del Proyecto

```
app/
├── Http/Controllers/
│   ├── Api/onepieceController.php    # API REST
│   └── PersonajeController.php       # Controlador web
├── Models/
│   └── Onepiece.php                  # Modelo Eloquent
database/
├── migrations/
│   └── create_onepieces_table.php    # Migración de BD
resources/
├── views/
│   ├── index.blade.php              # Lista de personajes
│   └── personajes/                  # Vistas de formularios
routes/
├── api.php                          # Rutas API
└── web.php                          # Rutas web
```

## 📝 Notas de Desarrollo

- La interfaz web usa el modelo Eloquent directamente para mejor rendimiento
- La API está disponible para consumo externo (Postman, otras apps)
- Los formularios incluyen validación y protección CSRF
- Se usa Tailwind CSS para el diseño

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

## 🙏 Agradecimientos

- [Laravel](https://laravel.com) - Framework PHP
- [Tailwind CSS](https://tailwindcss.com) - Framework CSS
- [One Piece](https://onepiece.fandom.com) - Serie de anime/manga