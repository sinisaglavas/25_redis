<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function create(CreateProductRequest $request)
    {
        Product::create($request->validated()); // kratki put upisa u tabelu
        Cache::forget('allProducts'); // kada se unese novi proizvod obrisi kes - stalni prikaz novog proizvoda

        return redirect('/');
    }

    public function flush()
    {
        Cache::forget('allProducts');

        return redirect('/');
    }
}
