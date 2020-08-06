 @extends('layouts.master')
@section('title', 'Cart')
@section('content')
<div class="crumb">
  <div aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('landing-page')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
  </ol>
</div>
</div>

<div class="container">
    @include('includes.message')

    @if(Cart::count() > 0)
       <h5>{{Cart::count()}} Item(s) in Your Shopping Cart</h5>
       <hr>
       <br>

       @foreach(Cart::content() as $item)
       <div class="row">
      
              <div class="col-md-3">
                  <a href="{{route('shop.show', $item->model->slug)}}"><img src="{{asset('img/'.$item->model->slug.'.jpg')}}" width="60%"></a>
              </div>
             <hr>

              <div class="col-md-3">
                <a href="{{route('shop.show', $item->model->slug)}}">
                  <h6>{{$item->model->name}}</h6>
                 <h6>{{$item->model->details}}</h6> 
                </a>
                 
              </div>


              <div class="col-md-2">
                <form method="POST" action="{{route('cart.destroy', $item->rowId)}}">
                  {{method_field('DELETE')}}
                  {{csrf_field()}}
                  
                  <button class="btn btn-default"><h6>Remove</h6></button>
                </form>


                <form method="POST" action="{{route('cart.SaveForLater', $item->rowId)}}">
                  {{csrf_field()}}
                  
                  <button class="btn btn-default"><h6>Save For Later</h6></button>
                </form>
              </div>

               <div class="col-md-2">
                  {{-- <div class="col-auto my-1"> --}}
                    <label class="mr-sm-2" for="qty">Quantity</label>
                    <select class="quantity text-primary" name = "quantity" data-id = "{{$item->rowId}}">
                      <option selected="">1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  {{-- </div> --}}
             </div>

              <div class="col-md-2">
                 <h6>#{{$item->model->price}}</h6>
               </div>
          
       </div>
       <hr>
     @endforeach

       
       
     
  </div> <!-- END OF CONTAINER -->

  

  <div class="container">
    
      <h5>Have a Code?</h5>
      
               <div class="card col-md-3">

                <div class="row">
                  <form>
                     
                        <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <input type="text" name="" class="form-control"> 
                                       </div>
                                  </div>

                                 <div class="col-md-6">
                                         <button class="btn btn-info">Apply</button> 
                                </div>

                            </div>
                        </div>
                    </form>
               </div>   
        </div>
      </div><!-- END OF SECOND CONTAINER -->

      <br>



      <div class="container">

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <p>Shopping Is Free Because We Are Awesome Like That.</p>
                </div>

                <div class="col-md-3">
                    <p>Subtotal</p>
                </div>


                <div class="col-md-3">
                    <p>#{{Cart::subtotal()}}</p>
                </div>
            </div>


             <div class="row">
                <div class="col-md-6">
                    
                </div>

                <div class="col-md-3">
                    <p>Tax</p>
                </div>


                <div class="col-md-3">
                    <p>#{{Cart::tax()}}</p>
                </div>
            </div>


             <div class="row">
                <div class="col-md-6">
                    
                </div>

                <div class="col-md-3">
                    <h5>Total</h5>
                </div>


                <div class="col-md-3">
                    <h5>#{{Cart::total()}}</h5>
                </div>
            </div>


        </div>
      </div> <!-- END OF THIRD CONTAINER -->


      <div class="container">
        <div class="row">
          <div class="col-md-5">
           <a href="{{route('shop.index')}}"> <button class="btn btn-info btn-lg">Continue Shopping</button></a>
          </div>

           <div class="col-md-2">
            <br><br>
          </div>

           <div class="col-md-5">
            <a href="{{route('checkout.index')}}"><button class="btn btn-info btn-lg">Proceed To Checkout</button></a>
          </div>
        </div>
        <br>
      </div>

      @else
      <div class="container">
         <h5>No Items in Cart!</h5>

         <a href="{{route('shop.index')}}"><button class="btn btn-info">Continue Shopping</button></a>
      </div>
      @endif

      <br>



      <div class="container">
          @if(Cart::instance('SaveForLater')->count() > 0)

        <h5>{{Cart::instance('SaveForLater')->count()}} Item(s) Saved For Later</h5>
     <hr>


  @foreach(Cart::instance('SaveForLater')->content() as $item)
     <div class="row">
            <div class="col-md-3">
                <a href="{{route('shop.show', $item->model->slug)}}"><img src="{{asset('img/'.$item->model->slug.'.jpg')}}" width="60%"></a>
          </div>

          <div class="col-md-3">
                <a href="{{route('shop.show', $item->model->slug)}}"><h6>{{$item->model->name}}</h6></a> 
                 <h6>{{$item->model->details}}</h6> 
           </div>


          <div class="col-md-3">
              <form method = "POST" action = "{{route('cart.DestroySaveForLater', $item->rowId)}}">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button class="btn btn-default"><h6>Remove</h6></button>
              </form>

              <form method = "POST" action = "{{route('cart.MoveBackToCart', $item->rowId)}}">
                    {{csrf_field()}}
                    <button class="btn btn-default"><h6>Move To Cart</h6></button>
              </form>
           </div>

           <div class="col-md-3">
              <h6>#{{$item->model->price}}</h6>
           </div>
       </div>
       <hr>
        @endforeach
      

       @else
       <h5>You Have No Item In Saved For Later!</h5>
       @endif
       
     
  </div> <!-- END OF CONTAINER -->


<hr>
<br><br>



@include('includes.might-like')
   
@endsection

@section('extra-js')
<script src = "{{asset('js/app.js')}}"></script>
  <script>
    (function(){
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element){
            element.addEventListener('change', function(){
                  const id = element.getAttribute('data-id')
                  axios.patch('/cart/${id}', {
                  quantity: this.value
                })
                .then(function (response) {
                  console.log(response);
                })
                .catch(function (error) {
                  console.log(error);
                });

            })
        })
    })();
  </script>
@endsection