<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Product;

class OrderController extends Controller
{
   public function index() {
    $orders = Order::with('client', 'products')->get();
    return view('orders.index', compact('orders'));
}

public function create() {
    $clients = Client::all();
    $products = Product::all();
    
    return view('orders.create', compact('clients', 'products'));
}
public function store(Request $request) {
    // 1. Validation
    $request->validate([
        'client_id' => 'required|exists:clients,id',
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // 2. Hisab l-taman
    $product = Product::find($request->product_id);
    $total_price = $product->price * $request->quantity;

    // 3. Insertion f la base de données
    $order = Order::create([
        'client_id' => $request->client_id,
        'total_price' => $total_price,
        'status' => 'en attente',
    ]);

    // 4. Rbet l-produit f l-jadwal Pivot (order_products)
    $order->products()->attach($request->product_id, ['quantity' => $request->quantity]);

    // 5. Naqas l-stock
    $product->decrement('quantity', $request->quantity);

    // 6. HADI HIYA LI KAT-DIK L-INDEX (Redirect)
    return redirect()->route('orders.index')->with('success', 'Commande créée !');
}

public function show(Order $order) {
    $order->load('client', 'products');
    return view('orders.show', compact('order'));
}

    public function destroy(Order $order) {
        foreach ($order->products as $product) {
            $product->increment('quantity', $product->pivot->quantity);
        }
        
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée !');
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:validée,refusée',
        ]);

        // Si on refuse, on remet le stock (si ce n'était pas déjà annulé/refusé pour éviter double incrément)
        if ($request->status === 'refusée' && $order->status !== 'refusée' && $order->status !== 'annulée') {
            foreach ($order->products as $product) {
                $product->increment('quantity', $product->pivot->quantity);
            }
        }
        
        // Si on valide une commande qui était refusée/annulée, il faudrait théoriquement re-décrémenter le stock ? 
        // Simplification : on suppose qu'on passe de 'en attente' à 'validée' ou 'refusée'. 
        // Si on passe de 'refusée' à 'validée', il faut redécrémenter.
        if ($request->status === 'validée' && ($order->status === 'refusée' || $order->status === 'annulée')) {
             foreach ($order->products as $product) {
                 if ($product->quantity < $product->pivot->quantity) {
                     return back()->with('error', 'Stock insuffisant pour réactiver cette commande.');
                 }
                $product->decrement('quantity', $product->pivot->quantity);
            }
        }

        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Statut de la commande mis à jour !');
    }
}