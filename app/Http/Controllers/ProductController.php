<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {        
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function block()
    {
        $tittle = Setting::pluck('tittle')->first();
        $products = Product::where("flag",1)->get()->shuffle()->all();
        return view('products.block', compact('products','tittle'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {        
        $products = Product::where("flag",1)->get();
        $count = count($products);
        if($count == 5 && $request->flag == 1){
            return redirect()->route('products.index')->withErrors(['msg' => 'You can´t create because you have more 5 Flag select']);            
        }else{
            $request->validate([
                'name' => 'required|string|max:255',
                'summary' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'flag' => 'boolean',
            ]);
            $data = $request->only(['name', 'summary', 'flag']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('images', 'public');
            }
            Product::create($data);
            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {           
        if(!isset($request->flag) ){
            $request['flag'] = 0;
        }else{
            $request['flag'] = 1;
        }       
        $products = Product::where("flag",1)->get();
        $count = count($products);       
        if( $count == 5 && $request->flag == 1) {
            return redirect()->route('products.index')->withErrors(['msg' => 'You can´t create because you have more 5 Flag select']);
        }else{
            $request->validate([
                'name' => 'required|string|max:255',
                'summary' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'flag' => 'boolean',
            ]);
            $data = $request->only(['name', 'summary', 'flag']);                    
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $data['image'] = $request->file('image')->store('images', 'public');
            }
            $product->update($data);
            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
        }
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
