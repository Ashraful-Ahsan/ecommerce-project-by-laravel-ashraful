<!DOCTYPE html>
<html>

<head>
  @include('home.css');

  <style>
    .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .detail-box{
        padding: 15px;

    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>


  <!-- Product details start -->

    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>

      <div class="row">






        <div class="col-md-12">
          <div class="box">


              <div class="div_center">
                <img width="400" src="/products/{{$data->image}}" alt="">
              </div>

              <div class="detail-box">
                <h6>{{$data->title}}</h6>
                <h6>
                  Price
                  <span>
                    ${{$data->price}}
                  </span>
                </h6>
              </div>



              <div class="detail-box">
                @php
                    $categoryClass = 'category-default';
                    $categorySlug = strtolower(str_replace(' ', '-', $data->category));
                    $categoryMap = [
                        'electronics' => 'category-electronics',
                        'fashion' => 'category-fashion',
                        'home decor' => 'category-home-decor',
                        'toys' => 'category-toys',
                        'beauty' => 'category-beauty',
                        'sports' => 'category-sports',
                        'food' => 'category-food',
                        'health' => 'category-health',
                        'books' => 'category-books',
                        'accessories' => 'category-accessories',
                        'gadgets' => 'category-gadgets',
                        'kids' => 'category-kids',
                    ];
                    if(isset($categoryMap[$categorySlug])) {
                        $categoryClass = $categoryMap[$categorySlug];
                    }
                @endphp
                <h6>Category: <span class="category-badge {{ $categoryClass }}">{{ $data->category }}</span></h6>
                <h6> Available Quantity: {{$data->quantity}} </h6>
                  <span>
                    ${{$data->quantity}}
                  </span>
                </h6>
              </div>




              <div class="detail-box">
                <p>{{$data->description}}</p>
              </div>


              <div class="detail-box">
                <a class="btn btn-primary" href="{{url('add_cart',$data->id)}}">Add to Cart</a>
              </div>



          </div>
        </div>









      </div>

    </div>
  </section>





  <!-- Product details end -->








  <!-- info section -->

  @include('home.footer')

  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
