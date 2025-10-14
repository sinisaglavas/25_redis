<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
//        if (Cache::has('allProducts'))
//        {
//            $products = Cache::get('allProducts');
//        } else {
//            $products = Product::latest()->take(9)->get();
//            Cache::put('allProducts', $products, '300'); // 300 sec ne gubi podatke
//        }
        $products = Cache::remember('allProducts', '300', function (){
            return Product::latest()->take(9)->get(); // ovaj kod menja onaj gore u komentaru
        });

        return view('welcome', [
            'products' => $products,
        ]);
    }
}
