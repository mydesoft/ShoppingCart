 <div class="container">

    <h4>You Might Also Like...</h4>
    <br>
    <div class="row">
      @foreach($MightLike as $product)
         <div class="col-md-3">
          <a href="{{route('shop.show', $product->slug)}}">
        <img src="{{asset('img/'.$product->slug.'.jpg')}}" width="80%">
        <p>{{$product->name}}</p>
        <p>{{$product->details}}</p>
         <p>#{{$product->price}}</p>
       </a>
      </div>
      @endforeach
     
    </div>
  </div>