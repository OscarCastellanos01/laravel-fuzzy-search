# 📦 Changelog — Laravel Fuzzy Search

---

## [v1.1.0] - 2025-04-21

### ✨ Añadido
- Componente Blade reutilizable `<x-fuzzy-select>`
- Soporte para múltiples instancias en la misma vista
- Opción `:open` para mostrar el dropdown abierto por defecto
- Compatibilidad con `Collection` y `array` como fuente de datos
- Parametrización dinámica con `label`, `keys`, `placeholder`, etc.
- Resaltado de coincidencias con `<mark>`
- Toggle (abrir/cerrar) con clic en el input
- Publicación del script JS vía `php artisan vendor:publish --tag=fuzzy-js`

### 🛠️ Librerías
- `Fuse.js` para búsqueda difusa en el navegador
- `Bootstrap 5` para estilos
- Compatible con `Livewire 3`

---

## [v1.0.0] - 2025-04-20

### ✅ Versión inicial
- Implementación básica de búsqueda difusa usando Fuse.js
- Listado básico y resaltado de resultados
- No soporta múltiples componentes
