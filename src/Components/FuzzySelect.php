<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class FuzzySelect extends Component
{
    public string $inputId;
    public string $listId;
    public string $itemSelector;
    public array $items;
    public array $keys;
    public string $placeholder;
    public string $label = '';
    public bool $open;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $inputId = 'busquedaUsuarios',
        string $listId = 'resultadosUsuarios',
        string $itemSelector = 'usuario-item',
        Collection|array $items = [],
        array $keys = ['name', 'email'],
        string $placeholder = 'Buscar...',
        string $label = '',
        bool $open = false,
    )
    {
        $this->inputId = $inputId;
        $this->listId = $listId;
        $this->itemSelector = $itemSelector;
        $this->items = is_array($items) ? $items : $items->toArray();
        $this->keys = $keys;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->open = $open;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('fuzzy::components.fuzzy-select');
    }
}
