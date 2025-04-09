<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FirstController extends Controller
{
    // index開くで
    public function index(){
        $name = 'kai';
        $products = Product::where('price', '>=', 300)->get();
        return view('first',compact('name','products'));  //compact() 文字列で＄いらない　受け取るときは＄
        
    }
}
