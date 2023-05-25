<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;

class ProductView extends Component
{
    public $viewType = 0;

    public function render()
    {
        return view('livewire.products.product-view');
    }

    public function switchView($viewType = 0)
    {
        $this->viewType = $viewType;
    }

}
