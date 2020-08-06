
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-dark border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal text-white">ECOMMERCE</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-white" href="{{route('shop.index')}}">SHOP</a>
        <a class="p-2 text-white" href="#">ABOUT</a>
        <a class="p-2 text-white" href="#">BLOG</a>
        <a class="p-2 text-white" href="{{route('cart.index')}}">CART

        	@if(Cart::instance('default')->count() > 0)
        	<span class="badge badge-warning badge-pill">
        		
        		{{Cart::instance('default')->count()}}
        		
        	</span>
        	@endif
        </a>
      </nav>
    </div>