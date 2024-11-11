<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchInput extends Component
{
    public $action;
    public $placeholder;

    public function __construct($action, $placeholder = 'Cari...')
    {
        $this->action = $action;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.search-input');
    }
}
