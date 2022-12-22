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
      <ul class="menu-sub ">
        <li class="menu-item active">
          <a href="{{URL('admin/product/create')}}" class="menu-link">
            <div data-i18n="Basic">Add Product</div>
          </a>
        </li>
        <li class="menu-item ">
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
              <h4 class="fw-bold py-3 mb-4">Products</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form method="POST" action="{{ URL('admin/product/store') }}" enctype="multipart/form-data" id="my-form">
                      @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Store Name</label>
                          <div class="form-floating col-sm-10">
                            <select class="form-select"  name="storeId">
                              <option value="">Select a Store </option> 
                              @foreach ($store as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                            
                          </div>      
                            
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Product Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" />
                            @error('name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">description</label>
                          <div class="col-sm-10">
                            <input
                              name="description"
                              type="text"
                              class="form-control"
                              id="description"
                              placeholder="description of this product is ....."
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">price</label>
                          <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" id="price" placeholder="John Doe" />
                            @error('price')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Discount Price</label>
                          <div class="col-sm-10">
                            <input type="text" name="discountPrice" class="form-control" id="discountPrice" placeholder="John Doe" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label  class="col-sm-2 col-form-label" for="">Status</label>
                          <div class="col-sm-10">
                            <input type="checkbox" class="mt-2" name="status"> 
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label  class="col-sm-2 col-form-label" for="">Trending</label>
                          <div class="col-sm-10">
                            <input type="checkbox" class="mt-2" name="trending"> 
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name" >image</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="image" id="image" />
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" id="add-btn">ADD</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
@stop           
