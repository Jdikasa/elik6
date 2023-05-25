<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGridView extends Component
{
    use WithPagination;

    public $viewType;

    protected $listeners = ['switchView' => '$refresh'];

    public function render()
    {
        return view('livewire.products.product-grid-view', [
            'products' => Product::forCurrentTeam()->paginate(10),
        ]);
    }
}
