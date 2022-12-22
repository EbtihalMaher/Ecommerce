@extends('layouts.mainLayout')
@section('pageMenu')
<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item ">
      <a href="{{ url('dashboard/index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Products -->
    <li class="menu-item active">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
        <div data-i18n="Authentications">Products</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{URL('admin/product/create')}}" class="menu-link">
            <div data-i18n="Basic">Add Product</div>
          </a>
        </li>
        <li class="menu-item active">
          <a href="{{ url('admin/product') }}" class="menu-link">
            <div data-i18n="Basic">Products</div>
          </a>
        </li>
      </ul>
    </li>
    
    <!-- Stores -->
    <li class="menu-item ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Authentications">Stores</div>
      </a>
      <ul class="menu-sub ">
        <li class="menu-item ">
          <a href="{{ url('admin/store/create ') }}" class="menu-link" >
            <div data-i18n="Basic">Add Store</div>
          </a>
        </li>
        <li class="menu-item " >
          <a href="{{ url('admin/') }}" class="menu-link">
            <div data-i18n="Basic">Stores</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Purchase Transactions -->
    <li class="menu-item active">
      <a href="{{URL('dashboard/purchaseTransactions/purchaseTransaction')}} " class="menu-link">
        <i class="menu-icon tf-icons bx bx-credit-card "></i>
        <div data-i18n="Tables">Purchase Transactions</div>
      </a>
    </li>
  </ul>
@stop           

@section('pageContent')
<div class="content">
                 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                        <div class="bg-light rounded h-100 p-4">
                           
                            <h6 class="mb-4">Purchases</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                           
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Store</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Report</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>


 @foreach ($purchaseTransactions as $purchaseTransaction)
              <tr>
            
                <td>{{ $purchaseTransaction->product->name }}</td>   
                <td><img src="{{asset('uploads/product/' .$purchaseTransaction->image)}}" class="product-image"   alt="Image here " width="50" height="50" ></td>
                <td>{{ $purchaseTransaction->product->description }}</td>   
                <td>{{ $purchaseTransaction->product->store->name }}</td>
                <td>{{ $purchaseTransaction->price }}</td> 
                <td>{{ $purchaseTransaction->created_at }}</td>  
                <td>
                    <a  href="{{URL('/report/'.$purchaseTransaction->productId)}}" class="bg-success px-1 border rounded text-white mx-1">
                        <i class="far fa-edit fa-fw"></i>
                    </a>  
                </td>
            </tr>
            @endforeach
          </tbody>
          </table>
    </div>
    <div class="row">
      <div class="col-12">
   
      </div>
    </div>   
</div>
        
</div>
@stop   