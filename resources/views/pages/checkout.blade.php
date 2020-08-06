
@extends('layouts.master')
@section('title', 'Checkout')

@section('extra-stripe')
  <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

<br>
  <div class="container">
     @include('includes.message')
  </div>
	 
    <div class="container">

    <div class="row">

      <div class="col-md-6">
       
          <div>
              <h2><u>Checkout</u></h2>
              <br>
              <h4>Billing Details</h4>

              <div>
                  <form method = "POST" action="{{route('checkout.store')}}" id="payment-form">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="text" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                      <label> Address</label>
                      <input type="text" name="address" id="address" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                 <label> City</label>
                                 <input type="text" name="city" id="city" class="form-control">
                            </div>
                      </div>

                    <div class="col-md-6">
                        <div class="form-group">
                              <label> Phone</label>
                              <input type="text" name="phone" class="form-control">
                       </div>
                     </div> 


                     <div class="col-md-6">
                        <div class="form-group">
                              <label> Province</label>
                              <input type="text" name="province" id="province" class="form-control">
                       </div>
                     </div> 


                     <div class="col-md-6">
                        <div class="form-group">
                              <label> Postal Code</label>
                              <input type="text" name="postalcode" id="postalcode" class="form-control">
                       </div>
                     </div>  
                    

                    </div>

             
          


          <br>
              <h4>Payment Details</h4>

                   <div class="form-group">
                              <label> Name on Card</label>
                              <input type="text" name="name_on_card" id="name_on_card" class="form-control">
                   </div>


                  

                   <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                           <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div> 
                       </div>
                   </div>
                   </div>

                   <button class="btn btn-info btn-block" id="complete-order">Complete Order</button>
                </form>
              </div>
              </div>
            </div>
      <!-- END OF FIRST COLUMN -->


      <div class="vl col-md-1"></div>
        {{-- <div class = "your-order"> --}}
         <div class="col-md-5">
        <br>
         <h4 style="text-align: center;">Your Order</h4>
         
         <hr>

         
          @foreach(Cart::content() as $item)
            <div class="row">
              <div class="col-md-4">
             <img src="{{asset('img/'.$item->model->slug.'.jpg')}}" width="60%">
           </div>

           <div class="col-md-4">
             <h6>{{$item->model->name}}</h6>
             <h6>{{$item->model->details}}</h6>
             <h6>{{$item->model->price}}</h6>
           </div>

            <div class="col-md-4">
             <h6>QTY <span class="badge badge-pill badge-primary">{{$item->qty}}</span></h6>
           </div>

         </div>
         <hr>
          @endforeach
           
         <div class="row">
            <div class="col-md-6">  <h6>Subtotal</h6> </div>
            <div class="col-md-6">#{{Cart::subtotal()}}</div>

         </div>

          <div class="row">
            <div class="col-md-6">  <h6>Tax</h6> </div>
            <div class="col-md-6">#{{Cart::tax()}}</div>
            
         </div>
         <hr>
          <div class="row">
            <div class="col-md-6">  <h5 style="font-weight: bold;">Total</h5> </div>
            <div class="col-md-6" style="font-weight: bold;">#{{Cart::total()}}</div>
            
         </div>
         
      </div><!-- END OF SECOND COLUMN -->
    {{-- </div> --}}
      

      </div> <!-- END OF ROW -->
     

  </div> <!-- END OF CONTAINER-->

@endsection


@section('extra-js')
 
    <script>
      (function(){
                        // Create a Stripe client.
              var stripe = Stripe('pk_test_51H6eRgKePTxwK80gNe9hsfM2YC5XiLGZAZknpJFO6pVZGDqKIu4I3d2dFhavCQsCKRWwquIGGOzCln2RLZxoENdR00GtrnPMsX');

              // Create an instance of Elements.
              var elements = stripe.elements();

              // Custom styling can be passed to options when creating an Element.
              // (Note that this demo uses a wider set of styles than the guide below.)
              var style = {
                base: {
                  color: '#32325d',
                  fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                  fontSmoothing: 'antialiased',
                  fontSize: '16px',
                  '::placeholder': {
                    color: '#aab7c4'
                  }
                },
                invalid: {
                  color: '#fa755a',
                  iconColor: '#fa755a'
                }
              };

              // Create an instance of the card Element.
              var card = elements.create('card', {

                style: style,
                hidePostalCode: true
              });

              // Add an instance of the card Element into the `card-element` <div>.
              card.mount('#card-element');

              // Handle real-time validation errors from the card Element.
              card.on('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                  displayError.textContent = event.error.message;
                } else {
                  displayError.textContent = '';
                }
              });

              // Handle form submission.
              var form = document.getElementById('payment-form');
              form.addEventListener('submit', function(event) {
                event.preventDefault();

                //disable button to prevent repeated click
                document.getElementById('complete-order').disabled = true;

                var options = {
                  name: document.getElementById('name_on_card').value,
                  address_line1: document.getElementById('address').value,
                  address_city: document.getElementById('city').value,
                  address_state: document.getElementById('province').value,
                  address_zip: document.getElementById('postalcode').value
                }

                stripe.createToken(card, options).then(function(result) {
                  if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;

                    //enable button here
                    document.getElementById('complete-order').disabled = false;
                  } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                  }
                });
              });

              // Submit the form with the token ID.
              function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
              }
      })();
    </script>
  
@endsection    