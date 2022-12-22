<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFormRequest;
use App\Models\Store;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function index(){
        $store = Store::all();
        return view('dashboard.stores.store' ,compact('store'));
    }

    public function create(){
        return view('dashboard.stores.addStore');
    }

    public function store(StoreFormRequest $request){
        $validatedData = $request->validated();

        $store = new Store;
        $store->name =$validatedData['name'];
        $store->address =$validatedData['address'];
        if($request->hasFile('logoImage')){
            $file = $request->file('logoImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/store/',$filename);
            $store->logoImage = $filename;
        };
        $store->popular =$request->popular == true ? '1':'0';
        $store->status =$request->status == true ? '1':'0';
        $store->save();

        return redirect('admin/')->with('message', 'Store Added Successfully');
    }

    public function edit($id){

        $store = Store::find($id);
        return view('dashboard.stores.editStore',compact('store'));
      }
  
      public function update(StoreFormRequest $request, $id){
        $validatedData = $request->validated();
        $store =Store::find($id);
        $store->name =$validatedData['name'];
        $store->address =$validatedData['address'];
        if($request->hasFile('logoImage')){
            $file = $request->file('logoImage');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/store/',$filename);
            $store->logoImage = $filename;
        };
        $store->popular =$request->popular == true ? '1':'0';
        $store->status =$request->status == true ? '1':'0';
        $store->update();

        return redirect('admin/')->with('message', 'Updated Successfully');

    
      }

      public function destroy($id){
        $store = store::find($id);
        if($store->image){ 
          $path = 'uploads/store/'.$store->image;
          if(File::exists($path))
          {
            File::delete($path);
          }
        }
        $store->delete();
        return redirect('admin/')->with('message',"Store Deleted Successfully");

    }

      
}
