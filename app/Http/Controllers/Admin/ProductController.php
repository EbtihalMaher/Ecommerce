<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('dashboard.products.product' ,compact('product'));
    }

    public function create(){
        $store= Store::all();
        return view('dashboard.products.addProduct',compact('store'));
    }

    public function store(ProductFormRequest $request){
        
        $validatedData = $request->validated();

        $product = new Product;
        $product->name =$validatedData['name'];
        $product->description =$validatedData['description'];
        $product->storeId =$validatedData['storeId'];
        $product->price =$validatedData['price'];
        $product->discountPrice =$validatedData['discountPrice'];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product/',$filename);
            $product->image = $filename;
        };
        $product->trending =$request->trending == true ? '1':'0';
        $product->status =$request->status == true ? '1':'0';
        $product->save();

        return redirect('admin/product')->with('message', 'Product Added Successfully');
    }

    public function edit($id){
      $store= Store::all();

        $product = Product::find($id);
        return view('dashboard.products.editProduct',compact('product','store'));
      }
  
      public function update(ProductFormRequest $request, $id){
      
        $validatedData = $request->validated();
        $product =Product::find($id);
        $product->name =$validatedData['name'];
        $product->description =$validatedData['description'];
        $product->storeId =$validatedData['storeId'];
        $product->price =$validatedData['price'];
        $product->discountPrice =$validatedData['discountPrice'];
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product/',$filename);
            $product->image = $filename;
        };
        $product->trending =$request->trending == true ? '1':'0';
        $product->status =$request->status == true ? '1':'0';
        $product->update();

        return redirect('admin/product')->with('message', 'Updated Successfully');

    
      }

      public function destroy($id){
        $product = Product::find($id);
        if($product->image){ 
          $path = 'uploads/product/'.$product->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
        }
        $product->delete();
        return redirect('admin/product')->with('message',"Product Deleted Successfully");
    }
}
