  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>

      <div class="row">

        @foreach ($product as $products )




        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
                @php
                    $categoryClass = 'category-default';
                    $categorySlug = strtolower(str_replace(' ', '-', $products->category));
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
                    if (isset($categoryMap[$categorySlug])) {
                        $categoryClass = $categoryMap[$categorySlug];
                    }
                @endphp
                <div class="category-tag">
                    <span class="category-badge {{ $categoryClass }}">{{ $products->category }}</span>
                </div>

              <div class="img-box">
                <img src="/products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
                <h6>
                  Price
                  <span>
                    ${{$products->price}}
                  </span>
                </h6>
              </div>


              <div class="card-actions">
                <a href="{{url('product_details',$products->id)}}" class="btn btn-danger">
                    Details
                </a>
                <a class="btn btn-primary" href="{{url('add_cart',$products->id)}}">Add to Cart</a>
              </div>

          </div>
        </div>

        @endforeach







      </div>

    </div>
  </section>
