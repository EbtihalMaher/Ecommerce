@extends('layouts.website')
@section('pageContent')
 
{{--  --}}
<div class="main-banner" id="top">
     <div class="container">
        <div class="row">
            
                @foreach ($products as $product )
                  <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('store/'.  $product->storeId. '/' .$product->id )}}" style="color:black">
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