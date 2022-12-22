@extends('layouts.website')
@section('pageContent')
<div class="main-banner" id="top">
     <div class="container">
        <div class="row">
            <h6 class="mb-0"> Stores /{{$store->name}}</h6>
        </div>
    </div>
</div>  
{{--  --}}
<div class="mt-3" id="top">
     <div class="container">
        <div class="row">
            <h2>{{$store->name}}</h2>
                @foreach ($product as $product )
                  <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('store/'. $store->name. '/' .$product->name )}}" style="color:black">
                        <img src="{{asset('uploads/product/' .$product->image)}}" style="height:200px; width:253px " alt="Product image">
                            <div class="card-body">
                            <h5>{{$product->name}}</h5>
                            <span class="float-start">{{$product->price}}</span>
                            <span class="float-end"><s>{{$product->discountPrice}}</s></span>
                        </div>
                    </div>
                </a>
            </div>
         @endforeach    
       </div>
     </div>
</div>
@stop 