<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function allProducts() {
        $products = Product::orderBy('id', 'desc')->paginate(9);
        return view('website.products', [
            'products' => $products,
        ]);
    }
    
    public function category($id){
        $products = Product::where('category_id',$id)->orderBy('id','desc')->paginate(9);
        return view('website.products', [
            'products' => $products,
        ]);
    }

    public function subCategory($id){
        $products = Product::where('subcategory_id',$id)->orderBy('id','desc')->paginate(9);
        return view('website.products',['products'=>$products]);
    }

    public function detail($id) {
        $product = Product::find($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                           ->where('id', '!=', $id)
                           ->orderBy('id', 'desc')
                           ->limit(4)
                           ->get();
    
        return view('website.product-detail', [
            'product' => $product,
            'products' => $relatedProducts
        ]);
    }
}
