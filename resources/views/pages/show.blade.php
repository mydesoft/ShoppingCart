 @extends('layouts.master')
  @section('title', $product->name)
  @section('content')
  <div class="crumb">
    <div aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('landing-page')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('shop.index')}}">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Laptop 6</li>
      </ol>
    </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
             <img src="{{asset('img/'.$product->slug.'.jpg')}}" width="60%">
          </div>
      </div>
      </div>


      <div class="col-md-6">
        
        <h4>{{$product->name}}</h4>
         <p>{{$product->details}}</p>
         <h4>#{{$product->price}}</h4>
         <h6>{{$product->description}}</h6>

         <br>

         <form method = "POST" action="{{route('cart.store')}}">
          {{csrf_field()}}

              <input type="hidden" name= "id" value="{{$product->id}}">

              <input type="hidden" name= "name" value="{{$product->name}}">
          
              <input type="hidden" name= "price" value="{{$product->price}}">
           
             <button class="btn btn-info btn-lg">Add To Cart</button>
         </form>
         
      </div>
        
    </div>
  </div>  <!-- END FIRST CONTAINER -->

<hr>
<br><br>
 
 @include('includes.might-like')
 
@endsection