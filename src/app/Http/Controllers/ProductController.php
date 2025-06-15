<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        return view('index');
    }

    public function register(){
    return view('register');
    }

    public function detail(){
        return view('detail');
    }
    
    public function update(ProductRequest $request){
        $product = $request->only(['name','price','image','description']);
    }
    
    public function store(ProductRequest $request){
        $product = $request->only(['name','price','image','description']);
        Product::create($product);
        
        redirect('/product');
    }
    
    public function search(){
        //
    }
    
    public function destroy(){
        //
    }

    public function test(){
        return view('test');
    }
    
}