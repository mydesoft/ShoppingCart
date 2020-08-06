<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('Ionicons/css/ionicons.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet"  href="{{asset('css/app.css')}}">
        <link rel="stylesheet"  href="{{asset('css/responsive.css')}}">

       </head>
        
        <!-- HEADER SECTION -->
        <header>
           <div class="top-nav container">
               <div class="logo">Ecommerce Site</div>

                <ul>
                    <li>
                        <a href="{{route('shop.index')}}">Shop</a>
                        <a href="#">About</a>
                        <a href="#">Blog</a>
                        <a href="{{route('cart.index')}}">Cart 
                        @if(Cart::instance('default')->count() > 0)
                         <span class="badge badge-warning badge-pill">
                
                         {{Cart::instance('default')->count()}}
                
                        </span>
                        @endif

                        </a>

                    </li>
                   
                </ul>
            </div> <!--end top-nav -->

            <div class="hero container">
                <div class="hero-copy">
                    <h1>CSS Grid Example</h1>
                    <p>A Practical Ecommerce Site Using Grid For Typical Webiste Layout</p>

                    <div class="hero-buttons">
                        <a href="#" class="button button-white">Button 1 </a>
                        <a href="#" class="button button-white">Button 2 </a>
                    </div>

                </div> <!--end hero-copy -->

                <div class="hero-image">
                    <img src="img/hero-laptop.jpg">
                </div>


            </div> <!--end hero-->
        </header>

        <div class="featured-section">
            <div class="container">
                <h1 class="text-center">Our Products</h1>

                <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="text-center button-container">
                    <a href="#" class="button">Featured</a>
                     <a href="#" class="button">On Sale</a>
                </div>
            

            <div class="products text-center">
                @foreach($products as $product)
                  <div class="product">
                    <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('img/'.$product->slug.'.jpg')}}" width="65%">
                    </a>
                   <div><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></div> 
                    <div class="product-price"> #{{$product->price}}</div>
                </div>  
                @endforeach
         
            </div>  <!-- End Products -->

            <div class="text-center button-container">
                <a href="{{route('shop.index')}}" class="button">View More Products</a>
            </div>

        </div> <!-- End Container -->

        </div>   <!-- End Featured Section --> 


        <div class="blog-section">
            <div class="container">
                <h1 class="text-center"> From Our Blog</h1>
                <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                <div class="blog-posts">
                    <div class="blog-post">
                        <a href="#"><img src="img/blog1.jpg"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</div>
                    </div>

                      <div class="blog-post">
                        <a href="#"><img src="img/blog2.jpg"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</div>
                    </div>

                      <div class="blog-post">
                        <a href="#"><img src="img/blog3.jpg"></a>
                        <a href="#"><h2 class="blog-title">Blog Post Title</h2></a>
                        <div class="blog-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</div>
                    </div>
                </div> <!-- End Blog-Posts -->
            </div> <!-- End Container -->
        </div><!-- End Blog-section -->

        <footer>
            <div class="footer-content container">
                <div class="made-with">Made With <i class="fa fa-heart"></i>by MydeSoft</div>
                <ul>
                    <li>Follow me:</li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div> <!-- End Footer-Content -->

        </footer>

    </body>
</html>
