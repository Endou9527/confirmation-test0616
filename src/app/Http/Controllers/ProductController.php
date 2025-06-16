<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function register(){
        return view('register');
        // $seasons = Season::all();
        // return view('register',compact('seasons'));
    }

    public function detail($productId){
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();

        return view('detail',compact('product','seasons'));
    }
    
    public function update(ProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // 画像処理（もしアップロードされた場合）
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = $path;
        }

        $product->save();

        // 中間テーブル（seasons）も更新
        if ($request->has('season')) {
            $product->seasons()->sync($request->season);
        }

        return redirect()->route('products.detail', $productId)->with('message', '更新しました');
    }
    
    public function store(ProductRequest $request)
    {
    // 商品情報を保存（imageアップロード含む場合）
    $productData = $request->only(['name', 'price', 'description']);
    $productData['image'] = $request->file('image')->store('images', 'public');
    $product = Product::create($productData);

    // 季節のID（配列）を取得して、中間テーブルに保存
    $seasonIds = $request->input('season', []);
    $product->seasons()->attach($seasonIds);

    return redirect('/products')->with('success', '商品を登録しました');
    }
    
    public function search(Request $request){
        $keyword = $request->input('keyword');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        $products = $query->paginate(10);

        return view('search', compact('products', 'keyword'));
    }
    
    public function destroy(Request $request){
        $product = Product::find($request->id)->delete();
        return redirect('/products')->with('message','商品を削除しました');
    }

    public function test(){
        return view('test');
    }
    
}