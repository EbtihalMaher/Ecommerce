@extends('layouts.mainLayout')
@section('pageMenu')
  <ul class="menu-inner py-1">
    <li class="menu-item ">
      <a href="{{ url('dashboard/index') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Products -->
    <li class="menu-item ">
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
        <li class="menu-item">
          <a href="{{ url('admin/product') }}" class="menu-link">
            <div data-i18n="Basic">Products</div>
          </a>
        </li>
      </ul>
    </li>
    
    <!-- Stores -->
    <li class="menu-item active">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-store"></i>
        <div data-i18n="Authentications">Stores</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item">
          <a href="{{ url('admin/store/create ') }}" class="menu-link" >
            <div data-i18n="Basic">Add Store</div>
          </a>
        </li>
        <li class="menu-item active" >
          <a href="{{ url('admin/') }}" class="menu-link">
            <div data-i18n="Basic">Stores</div>
          </a>
        </li>
      </ul>
    </li>
    <!-- Purchase Transactions -->
    <li class="menu-item">
      <a href="{{URL('dashboard/purchaseTransactions/purchaseTransaction')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-credit-card "></i>
        <div data-i18n="Tables">Purchase Transactions</div>
      </a>
    </li>
  </ul>
@stop           

@section('pageContent')
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
            
            <div class="container-xxl flex-grow-1 container-p-y">
            @if(session('message'))
              <div class="fw-bold py-3 mb-4 alert alert-success">{{ session('message') }}</div>
            @endif
              <h4 class="fw-bold py-3 mb-4">All Stores
                <a href="{{ url('admin/store/create ') }}" class="btn btn-primary float-end">Add Store</a>
              </h4>
              
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Stores Table</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Store Name</th>
                        <th scope="col">Store Address</th>
                        <th scope="col">logo</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                    @foreach ($store as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->address}}</td>
                        <td>
                          <img src="{{asset('uploads/store/' .$item->logoImage)}}" class="store-image"   alt="Image here " width="50" height="50" ></td>
                        <td>
                            <a  href= "{{url('admin/store/edit/' .$item->id) }}" class="btn btn-primary btn-center">Edit</a>

                        </td>
                        <td>
                        <a href= "{{URL('admin/store/delete/' .$item->id)}}" class="btn btn-danger btn-center">Delete</a>

                        </td>

                    </tr>
                    @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
              
            </div>
            <!-- / Content -->
@stop           
