@extends("layouts.app")
@section('nav')
<li class="nav-item me-2">
    <a class="nav-link" href="/articles/cart">
       <img src="{{asset("images/shopping.svg")}}" alt="">
       <span class="badge rounded-pill bg-danger d-block" style="transform: translate(80%, -200%)">
      
        {{count($cart_total)}}
     
        </span>
    </a>
</li>
@endsection 

@section("content")
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

{{-- <script src="{{asset('js/script.js')}}"></script> --}}
<div class="container" style="height:auto; margin-bottom:40px;">


        @if (session('info'))
            <div class="alert alert-info">
                {{session('info')}}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6" style="padding-top: 140px">
                <h6 style="font-size:20px;">Men's Collection 2024</h6>
                <h3 style="font-size: 40px;font-weight:700;">New Arrivals</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum, dolores esse? Omnis ratione tempore, voluptates minus doloremque facilis ab ea odio hic molestiae natus explicabo, quae voluptas labore quod voluptatum?</p>
                <a href="#order" class="btn btn-primary">View All</a>
            </div>
            <div class="col-md-6" style="padding-top:100px;">
                <div class="card">
                     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnv-oBFbZgrAEaOqs_lC_ck6tjJkwBG2V5_w&s" alt="" class="img-thumbnail">
                    </div>
                </div>
        </div>
    </div> 

    {{-- Start Add to Cart  --}}
    <div class="container" style="padding-top: 80px;">

        {{-- <div class="row">
            @foreach ($products as $product)
                <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                    <img src="{{ $product->product_name}}" alt="">
                </div>
            @endforeach
        </div> --}}
        <div class="row">
            <h3 style="font-weight:700;" class="text-center">Categories</h3> <br> <br>
            <div class="col-md-4">
               
                <div class="card mt-2">
                  
                     <img src="{{asset("images/bag1.jpeg")}}" alt="">
                 
            </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-2">
                    <img src="{{asset("images/watch2.jpeg")}}" alt="">
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-2">
                    <img src="{{asset("images/shoe1.jpeg")}}" alt="">
                  
                </div>
            </div>
        </div>
    </div> 


     {{-- End Add to Cart  --}}

    <div class="container" style="padding-top: 80px">
       <div class="head text-center" style="gap:40px;">
        <h3 style="font-weight:700;">Product Overview</h3> <br>
            <ul class="d-flex text-center justify-content-center gap-5">
                <a href="" class="nav-link">ALL Products</a>
                <a href="" class="nav-link">Bag</a>
                <a href="" class="nav-link">Shoes</a>
                <a href="" class="nav-link">Watches</a>
            </ul>
       </div>
    </div>

    {{-- start product section  --}}
    
    <section class="container" id="order">
        <div class="collect d-flex" style="padding-top: 10px; gap:10px;">
            <div class="row">
                @foreach ($articles as $article)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        {{-- {{ $books->image }} --}}
                        <div class="card-body">
                            <img src="{{asset("images/$article->article_image")}}" alt="" style="height:180px; width:100%;" class="mb-3"> <br>
                            <div class="card-title">
                                <h4>{{$article->name}}</h4>
                               <div class="w-100 d-flex align-items-center justify-content-between">
                                   <span>${{$article->price}}</span>
                                   <a href=" {{ count((array) session('cart'))}}">
                                    <span class="btn btn-outline-primary rounded p-2">
                                        <img src="{{asset("images/shopping.svg")}}" alt="">
                                        Add to Cart
                                    </span>
                                   </a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div> 
           
        </div>
        <br>
        <a href="{{url("/articles/add")}}" class="btn btn-primary" type="submit">Order Now</a>
    </section>
    

   
@endsection