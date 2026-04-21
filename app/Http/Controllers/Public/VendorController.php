<?php

namespace App\Http\Controllers\Public;

use App\Models\Vendor;
use App\Models\Product;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function show(Vendor $vendor)
    {
        $vendor->load('user');
        $products = Product::where('vendor_id', $vendor->id)->paginate(12);
        return view('vendors.show', compact('vendor', 'products'));
    }
}
