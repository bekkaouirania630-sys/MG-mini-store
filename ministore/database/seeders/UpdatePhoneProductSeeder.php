<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class UpdatePhoneProductSeeder extends Seeder
{
    public function run()
    {
        $category = Category::firstOrCreate(['name' => 'Phones']);
        
        $product = Product::updateOrCreate(
            ['name' => 'Smartphone Pro'], 
            [
                'price' => 5999.00,
                'category_id' => $category->id,
                'image' => 'products/phone_v2.png',
                'quantity' => 50
            ]
        );
        
        // Also try to find any product with 'phone' in name and update it
        $others = Product::where('name', 'like', '%phone%')->where('id', '!=', $product->id)->get();
        foreach($others as $other) {
            $other->update(['image' => 'products/phone_v2.png']);
        }
    }
}
