@extends('layouts.mainLayout')
@section('pageMenu')
  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
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

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <h2>Dashboard</h2>
                      <hr>
                      <br>
                      @if(session('message'))
                        <h2>{{session('message')}}</h2>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
@stop           
