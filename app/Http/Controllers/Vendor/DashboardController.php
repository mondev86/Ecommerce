<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $vendorIds = $user->vendors->pluck('id');

        $totalProducts = \App\Models\Product::whereIn('vendor_id', $vendorIds)->count();
        $recentOrders = \App\Models\OrderItem::whereHas('product', fn($q) => $q->whereIn('vendor_id', $vendorIds))
            ->with(['order', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('vendor.dashboard', compact('totalProducts', 'recentOrders'));
    }
}
