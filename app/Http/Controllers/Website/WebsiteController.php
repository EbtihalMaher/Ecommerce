<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\StoreFormRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    public function index(){

        $featured_products = Product::where('trending', '1')->take(5)->get();
        $trending_store = Store::where('popular', '1')->take(5)->get();
        return view('website.index', compact('featured_products', 'trending_store'));
    }

    
    public function store(){
        
        $store = Store::where('status', '0')->get();
        return view('website.store', compact('store'));

    }

    public function viewStore($name){

        // dd(2);
        $store= Store::where('name', $name)->first();

        if($store){
            $product = Product::where('storeId', $store->id)->where('status', 0)->get();
            return view('website.product',compact('store','product'));
        }else{
            
            return redirect('/')->with('status' , "name doest exists");
        }
      
    }

    public function productview($storeName,$productName) {
        if(Store::where('name', $storeName)->exists())
        {
            
            if(Product::where('name', $productName)->exists()){
                
                $product=  Product::where('name', $productName)->first();
                return view('website.productView',compact('product'));        }
            else{
                return redirect('/')->with('status' , "The Link was broken");
            }
    }
    else{
         return redirect('/')->with('status' , "No such Category Found ");
    }
    }

    public function addPurchaseTransaction($id,$price){
        $purchase = new PurchaseTransaction();
        $purchase->productId = $id;
        $purchase->price = $price;
       
        $result = $purchase->save();
         return redirect()->back();
    }


    public function search(Request $request)
    {
    $search = $request['search'];
    $products = Product::where('name', 'LIKE', "%$search%")->get();

    return view('website.product',compact('products'));
    

    }
        
        
}
