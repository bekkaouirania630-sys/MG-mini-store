<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Client;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $stats = [
                'products_count'   => Product::count(),
                'orders_count'     => Order::count(),
                'clients_count'    => Client::count(),
                'categories_count' => Category::count(),
                'total_revenue'    => Order::sum('total_price'), 
            ];

            return view('admin.dashboard', compact('stats'));
        } else {
             $products = Product::where('quantity', '>', 0)->with('category')->get();
             return view('customer.shop', compact('products'));
        }
    }
}