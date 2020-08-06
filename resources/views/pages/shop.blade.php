
@extends('layouts.master')
@section('title','Shop')
@section('content')
  
<div class="crumb">
  <div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('landing-page')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shop</li>
  </ol>
</div>
</div>


	
  <div class="container">

    <div class="row">

      <div class="col-md-4">
        <h5>By Category</h5>
          <p><a href="">Laptops</a></p>
          <p><a href="">Mobile Phones</a></p>
          <p><a href="">Desktops</a></p>
          <p><a href="">Tablets</a></p>

        <h5>By Price</h5>
            <p><a href="">$0 - $700</a></p>
            <p><a href="">$700 - $2000</a></p>
            <p><a href="">$2000+</a></p>
            

    </div>
      
      <div class="col-md-8">
      <h4><u>Featured</u></h4>
    <br>
        <div class="row">
          @foreach($products as $product)
            <div class="col-md-3">
               <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('img/'.$product->slug.'.jpg')}}"width="80%"></a> 
               <a href="{{route('shop.show', $product->slug)}}"><p>{{$product->name}}</p></a> 
                <p> #{{$product->price}}</p>
      </div>
          @endforeach
          

    </div>
    
     
    </div>
 
  </div>
</div>
 
@endsection


 

	

