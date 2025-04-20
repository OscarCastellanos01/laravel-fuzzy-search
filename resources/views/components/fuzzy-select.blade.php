<div class="w-100" style="max-width: 500px;">
    @if ($label)
        <label for="{{ $inputId }}" class="form-label fw-semibold">{{ $label }}</label>
    @endif

    <div class="position-relative w-100" style="max-width: 500px;">
        <input
            type="text"
            id="{{ $inputId }}"
            placeholder="{{ $placeholder }}"
            class="form-control"
            autocomplete="off"
        >

        <ul
            id="{{ $listId }}"
            class="list-group position-absolute mt-1 shadow"
            style="{{ $open ? '' : 'display: none;' }} max-height: 300px; overflow-y: auto; z-index: 1000; width: 100%;"
        >
            @foreach ($items as $item)
                <li
                    class="list-group-item {{ $itemSelector }} text-start"
                    style="cursor: pointer;"
                    @foreach ($keys as $key)
                        data-{{ $key }}="{{ $item[$key] }}"
                    @endforeach
                >
                    {{ $item[$keys[0]] }} — <span class="text-muted">{{ $item[$keys[1]] ?? '' }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            window.fuzzySearch({
                inputId: '{{ $inputId }}',
                listId: '{{ $listId }}',
                itemSelector: '.{{ $itemSelector }}',
                keys: @json($keys),
                open: {{ $open ? 'true' : 'false' }}
            });
        });
    </script>
</div>
