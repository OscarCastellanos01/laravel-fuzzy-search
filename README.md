# 🔍 Laravel Fuzzy Search

Este paquete proporciona un componente Blade reutilizable que actúa como un `<select>` personalizado con búsqueda difusa utilizando [Fuse.js](https://fusejs.io), compatible con Laravel 10, 11 y 12, Bootstrap 5 y Livewire (opcional).

![Vista previa del componente](https://raw.githubusercontent.com/OscarCastellanos01/fuzzy_search/2b11a233224a292e4d8d4d0e35478500ec18a0d4/public/src/img/preview.png)

---

## ⚙️ Requisitos

- PHP 8.1 o superior
- Laravel 10/11/12
- Node.js y NPM
- Vite
- Bootstrap 5
- `fuse.js` (instalado vía NPM)

---

## 🚀 Instalación

1. Instala el paquete vía Composer:

```bash
composer require castellanos/laravel-fuzzy-search
```

2. Instala la dependencia JavaScript en tu proyecto Laravel:

```bash
npm install fuse.js
```

3. Publica el archivo JavaScript para Vite:

```bash
php artisan vendor:publish --tag=fuzzy-js
```

Resultado:

→ `resources/js/vendor/fuzzySearch.js`

4. Importa el archivo JS en tu archivo `resources/js/app.js`:

```javascript
import './vendor/fuzzySearch';
```

5. Compila tus assets con Vite:

```bash
npm run dev
```

6. Importar CSS/SCSS, JS:
```bash
@vite(['resources/scss/app.scss', 'resources/js/app.js'])
```

---

## 🧪 Uso del componente

Puedes utilizar el componente en cualquier vista Blade, por ejemplo:

```blade
<x-fuzzy-select
    label="Usuario"
    input-id="busquedaUsuarios"
    list-id="resultadosUsuarios"
    item-selector="usuario-item"
    :items="$usuarios"
    :keys="['name', 'email']"
    placeholder="Buscar usuario..."
    :open="false"
/>
```

### 🔑 Parámetros disponibles

| Parámetro        | Tipo               | Descripción                                                            |
|------------------|--------------------|------------------------------------------------------------------------|
| `label`          | `string`           | Texto visible encima del input                                         |
| `input-id`       | `string`           | ID único para el `<input>`                                             |
| `list-id`        | `string`           | ID único para el `<ul>` que contiene los resultados                    |
| `item-selector`  | `string`           | Clase que se asigna a cada `<li>` para búsqueda y selección            |
| `:items`         | `array` o `Collection` | Lista de objetos. Soporta colecciones Eloquent (`User::all()` o `->get()`) |
| `:keys`          | `array`            | Campos de los objetos a usar para buscar (ej: `['name', 'email']`)     |
| `placeholder`    | `string`           | Texto a mostrar dentro del input                                       |
| `:open`          | `bool`             | Si el dropdown debe estar abierto por defecto (`true` o `false`)       |

---

## 💡 Características

- Componente Blade dinámico y reutilizable
- Búsqueda difusa con Fuse.js
- Estilizado con Bootstrap 5
- Apertura y cierre del dropdown con clic
- Resaltado inteligente con `<mark>`
- Soporte para múltiples instancias en la misma vista
- Compatible con Livewire ⚡

---

## 📄 Licencia

Este paquete está bajo la licencia MIT.

Desarrollado con 💙 por [Oscar Castellanos](https://github.com/OscarCastellanos01)
