
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

          <div class="product-info text-center">
            <h5 class="product-title">{{ $products->title }}</h5>
            <p class="product-price text-danger fw-bold">{{ $products->price }} EGP</p>

            <div class="d-flex justify-content-center gap-2">
              <a href="{{ url('product_details', $products->id) }}" class="btn btn-outline-primary btn-sm">
                View Details
              </a>
              <a href="{{ url('add_cart', $products->id) }}" class="btn btn-success btn-sm">
                🛒 Add to Cart
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
