<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(CreateProductRequest $request)
    {
        Product::create($request->validated()); // kratki put upisa u tabelu

        return redirect('/');
    }
}
