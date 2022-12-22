@extends('layouts.website')
@section('pageContent')
<div class="main-banner" id="top">
     <div class="container">
        <div class="row">
        <h6 class="mb-0" >
         <a href="{{url('store')}}" style="-webkit-text-fill-color: black">  
            Stores  
         </a> /
         <a href="{{url('viewStore/' .$product->store->name) }}">  
            {{$product->store->name}}  
        </a> /
        <a href="{{url('store/' .$product->store->name . '/' .$product->name) }}">  
            {{$product->name}}  
        </a>  
            {{-- Stores /{{$product->store->name}}/ {{ $product->name}} --}}
        </h6>
    </div>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow product_data">
       <div class="card-body">
           <div class="row product_data">
            <div class="col-md-4 border-right">
                <img src="{{asset('uploads/product/' .$product->image)}}" class="w-100 " alt="">
            </div>
            <div class="col-md-8">
            <h2 class="mb-0">
                {{$product->name}}
                @if ($product->trending == '1' )
                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                @endif
            </h2>
            <hr>
            <label class="me-3">Price: <s>$ {{$product->price}} </s></label>
            <label class="fw-bold"> Discount Price: $ {{$product->discountPrice}} </s></label>
           
            <hr>

            

       </div>
       <div class="col-md-12">
        <hr>
        <h3>Description</h3>
        <p class="mt-3">
            {!! $product->description !!}
        </p>
       </div>
    </div>
</div>
</div>
@stop 