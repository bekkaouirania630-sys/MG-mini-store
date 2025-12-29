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
        // Kan-jibu l-arqam mn l-models li 3ndek
        $stats = [
            'products_count'   => Product::count(),
            'orders_count'     => Order::count(),
            'clients_count'    => Client::count(),
            'categories_count' => Category::count(),
            'total_revenue'    => Order::sum('total_price'), // Hada howa l-flouss li dkhlo
        ];

        return view('dashboard', compact('stats'));
    }
}