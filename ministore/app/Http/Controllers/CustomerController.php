<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // 1. Voir uniquement les produits disponibles
    public function index() {
        $products = Product::where('quantity', '>', 0)->with('category')->get();
        return view('customer.shop', compact('products'));
    }

    // 2. Créer une commande (simplifié pour le client)
    public function storeOrder(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        // Vérifier si le stock est suffisant
        if ($product->quantity < $request->quantity) {
            return back()->with('error', 'Stock insuffisant !');
        }

        // Find or create Client from Auth User
        $user = Auth::user();
        $client = \App\Models\Client::firstOrCreate(
            ['email' => $user->email],
            ['name' => $user->name, 'phone' => ''] 
        );

        // Créer la commande liée au client
        $order = Order::create([
            'client_id' => $client->id, 
            'total_price' => $product->price * $request->quantity,
            'status' => 'en attente',
        ]);

        $order->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        
        // Décrémenter le stock
        $product->decrement('quantity', $request->quantity);

        return redirect()->route('customer.orders')->with('success', 'Commande passée avec succès !');
    }

    // 3. Voir mes commandes
    public function myOrders() {
        $user = Auth::user();
        $client = \App\Models\Client::where('email', $user->email)->first();
        
        $orders = $client ? Order::where('client_id', $client->id)->with('products')->latest()->get() : collect();
        
        return view('customer.orders', compact('orders'));
    }

    // 4. Supprimer/Annuler ma commande (si elle est encore en attente)
    public function cancelOrder(Order $order) {
        $user = Auth::user();
        $client = \App\Models\Client::where('email', $user->email)->first();

        if (!$client || $order->client_id !== $client->id) {
            abort(403); 
        }

        if ($order->status !== 'en attente') {
            return back()->with('error', 'Impossible d\'annuler une commande déjà traitée.');
        }

        // Remettre le stock
        foreach ($order->products as $product) {
            $product->increment('quantity', $product->pivot->quantity);
        }

        $order->delete();
        return back()->with('success', 'Commande annulée.');
    }
}