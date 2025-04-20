import Fuse from "fuse.js";
window.Fuse = Fuse;

if (!window.fuzzySearch) {
  window.fuzzySearch = function ({
    inputId,
    listId,
    itemSelector,
    keys = [],
    limit = 50,
    highlightClass = "bg-warning-subtle",
    open = false,
  }) {
    const input = document.getElementById(inputId);
    const lista = document.getElementById(listId);
    if (!input || !lista || !window.Fuse) return;

    const elementos = Array.from(lista.querySelectorAll(itemSelector)).map(
      (item) => {
        const data = {};
        keys.forEach((key) => {
          data[key] = item.dataset[key] || "";
        });
        return {
          ...data,
          element: item,
        };
      }
    );

    const fuse = new Fuse(elementos, {
      keys,
      includeMatches: true,
      shouldSort: true,
      threshold: 0.4,
      distance: 100,
      ignoreLocation: true,
      minMatchCharLength: 2,
    });

    function resaltarCoincidencias(texto, indices) {
      let resultado = "",
        cursor = 0;
      indices.forEach(([inicio, fin]) => {
        resultado += texto.slice(cursor, inicio);
        resultado += `<mark class="${highlightClass}">${texto.slice(
          inicio,
          fin + 1
        )}</mark>`;
        cursor = fin + 1;
      });
      return resultado + texto.slice(cursor);
    }

    function mostrarTodos() {
      lista.style.display = "block";
      elementos.forEach((el) => (el.element.style.display = "none"));
      elementos.slice(0, limit).forEach((el) => {
        const html = generarHTML(el);
        el.element.innerHTML = html;
        el.element.style.display = "list-item";
      });
    }

    function ocultarLista() {
      lista.style.display = "none";
    }

    function renderizarBusqueda(query) {
      if (query === "") {
        mostrarTodos();
        return;
      }

      const resultados = fuse.search(query);
      elementos.forEach((el) => (el.element.style.display = "none"));

      resultados.forEach(({ item, matches }) => {
        const html = generarHTML(item, matches);
        item.element.innerHTML = html;
        item.element.style.display = "list-item";
      });

      lista.style.display = "block";
    }

    function generarHTML(item, matches = []) {
      let html = "";
      keys.forEach((key, index) => {
        const valor = item[key] ?? "";
        const match = matches.find((m) => m.key === key);
        const resaltado = match
          ? resaltarCoincidencias(valor, match.indices)
          : valor;

        if (index === 0) {
          html += resaltado;
        } else if (index === 1) {
          html += ` — <span class="text-muted">${resaltado}</span>`;
        } else {
          html += `<div class="text-muted small">${resaltado}</div>`;
        }
      });
      return html;
    }

    input.addEventListener("input", () => {
      renderizarBusqueda(input.value.trim());
    });

    input.addEventListener("click", () => {
      if (lista.style.display === "none" || lista.style.display === "") {
        renderizarBusqueda(input.value.trim());
      } else {
        ocultarLista();
      }
    });

    document.addEventListener("click", (e) => {
      const esClickDentro =
        input.contains(e.target) || lista.contains(e.target);
      if (!esClickDentro) ocultarLista();
    });

    elementos.forEach((el) => {
      el.element.addEventListener("click", () => {
        input.value = el[keys[0]];
        ocultarLista();
      });
    });

    if (open === true) {
      renderizarBusqueda("");
    } else {
      ocultarLista();
    }
  };
}
