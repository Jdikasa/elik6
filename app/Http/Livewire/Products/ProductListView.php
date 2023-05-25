<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class ProductListView extends Component
{

    public $products;
    public $viewType;

    public function render()
    {
        $this->products = Product::forCurrentTeam()->get();
        return view('livewire.products.product-list-view');
    }
}
