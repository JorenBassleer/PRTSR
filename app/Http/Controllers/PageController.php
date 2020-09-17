<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class PageController extends Controller
{
    public function productShow(Product $product)
    {  
        return view('products.show');
    }
    public function productCreate()
    {  
        return view('products.create');
    }
}
