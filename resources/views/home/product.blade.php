<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center mb-5">
      <h2 class="fw-bold">🛍️ Latest Products</h2>
      <p class="text-muted">Check out our newly added items</p>
    </div>

    <div class="row g-4">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="product-box">
          <div class="product-img">
            <img src="products/{{ $products->image }}" alt="{{ $products->title }}">
            <span class="badge-new">New</span>
          </div>

          <div class="product-info">
            <h5 class="product-title">{{ $products->title }}</h5>
            <p class="product-price">{{ $products->price }} EGP</p>
            <a href="{{ url('product_details', $products->id) }}" class="btn btn-details">
              View Details
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
