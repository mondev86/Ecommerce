<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductSearch extends Component
{
    public string $query = '';
    public $results = [];

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->results = [];
            return;
        }

        $this->results = Product::with('vendor')->where('name', 'like', '%' . $this->query . '%')
            ->orWhere('description', 'like', '%' . $this->query . '%')
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
