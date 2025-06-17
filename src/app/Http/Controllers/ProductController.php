<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $order = $request->input('order');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        if ($order === 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($order === 'low') {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(10)->appends([
            'keyword' => $keyword,
            'order' => $order,
        ]);

        return view('index', compact('products', 'keyword', 'order'));
        }

    public function register(){
        $seasons = Season::all();
        return view('register',compact('seasons'));
    }

    public function detail($productId){
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();

        return view('detail',compact('product','seasons'));
    }
    
    public function update(UpdateProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $product->image = 'storage/' . $path;
        }

        $product->save();

        if ($request->has('season')) {
            $product->seasons()->sync($request->season);
        }

        return redirect()->route('products.detail', $productId)->with('message', '更新しました');
    }

    public function store(StoreProductRequest $request)
    {
        $productData = $request->only(['name', 'price', 'description']);

        if ($request->hasFile('image')) {
            // 「public/images」に保存 → パスは「storage/images/xxx.jpg」として保存
            $path = $request->file('image')->store('images', 'public');
            $productData['image'] = 'storage/' . $path;
        }

        $product = Product::create($productData);

        // 中間テーブル登録
        $seasonIds = $request->input('season', []);
        $product->seasons()->attach($seasonIds);

        return redirect('/products')->with('success', '商品を登録しました');
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $order = $request->input('order');

        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }

        // 並び替え処理
        if ($order === 'high') {
            $query->orderBy('price', 'desc'); // 高い順
        } elseif ($order === 'low') {
            $query->orderBy('price', 'asc'); // 安い順
        }

        $products = $query->paginate(10)->appends([
        'keyword' => $keyword,
        'order' => $order
         ]);

        return view('search', compact('products', 'keyword','order'));
    }
    
    public function destroy($productId){
        $product = Product::findOrFail($productId);
        $product->delete();
        return redirect('/products')->with('message','商品を削除しました');
    }    
}