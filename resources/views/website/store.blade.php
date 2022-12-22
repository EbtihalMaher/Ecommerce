@extends('layouts.website')
@section('pageContent')
<div class="main-banner" id="top">
     <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <h3>All Stores</h3> 
                <div class="row">
                    @foreach ($store as $item)
                        <div class="col-md-3 mb=3">
                            <a href="{{ url('viewStore/' .$item->name )}}" style="color:black;" >
                            <div class="card mt-3">
                                <img src="{{asset('uploads/store/' .$item->logoImage)}}" height="200px" width="253px" alt="Store image">
                                <div class="card-body">
                                    <h5>{{$item->name}}</h5>
                                   <p> 
                                    {{ $item->address}}
                                   </p>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
               </div>
            </div>
        </div>
     </div>
</div>
@stop 