@extends('layouts.website')
@section('pageContent')

<div class=" main-banner" id="top">
    <div class="container">
        <div class="row">
            <h3 style="margin-right:30px;">Featured products</h3>
        
            @foreach ($featured_products as $product )
            <div class="col-md-3 mb-3">
                <a href="{{url('store/' .$product->store->name . '/' .$product->name) }}" style="color:black;"> 
                <div class="card">
                    <img src="{{asset('uploads/product/' .$product->image)}}"  style="height:200px; width:253px " alt="Product image">
                    <div class="card-body">
                        <h5>{{$product->name}}</h5>
                        <span class="float-start">{{$product->price}}</span>
                        <span class="float-end"><s>{{$product->discountPrice}}</s></span>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h3 style="margin-right:70px;">Trending Stores</h3>
            @foreach ($trending_store as $store )
            <div class="col-md-3 mt=3 ">
                <a  href="{{ url('viewStore/' .$store->name )}}" style="color:black;">
                <div class="card">
                    <img src="{{asset('uploads/store/' .$store->logoImage)}}" height="200px" width="253px" alt="Store image">
                    <div class="card-body">
                        <h5>{{$store->name}}</h5>
                        <p> 
                            {{ $store->address}}
                        </p>
                    </div>
                </div>
            </a>
            </div>
            @endforeach
           
        </div>
    </div>
</div>

   
@stop 