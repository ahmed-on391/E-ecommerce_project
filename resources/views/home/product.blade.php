<section class="shop_section layout_padding bg-light">
  <div class="container">
    
    <div class="heading_container heading_center mb-5">
      <h2 style="font-weight: 900; color: #1a1a1a; letter-spacing: -1px;">
        أحدث <span style="color: #db4566;">المنتجات</span> وصلتنا 🛍️
      </h2>
      <p style="color: #888; font-size: 16px;">اكتشف مجموعتنا الجديدة المختارة بعناية لتناسب ذوقك</p>
      <div style="width: 60px; height: 4px; background: #db4566; margin: 15px auto; border-radius: 10px;"></div>
    </div>

    <div class="row">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 border-0 shadow-sm transition-all" style="border-radius: 25px; overflow: hidden; transition: 0.3s;">
          
          {{-- <div class="position-relative overflow-hidden" style="background: #f8f9fa;">
            <img src="products/{{ $products->image }}" cl ass="card-img-top" alt="{{ $products->title }}" 
                 style="height: 250px; object-fit: cover; transition: 0.5s;">
            
            <span class="position-absolute top-0 end-0 m-3 badge rounded-pill" style="background: #db4566; padding: 8px 15px;">جديد</span>
          </div> --}}
          <div class="position-relative overflow-hidden" style="background: #f8f9fa;">
    <img src="{{ file_exists(public_path('products/' . $products->image)) ? asset('products/' . $products->image) : $products->image }}"
         class="card-img-top" alt="{{ $products->title }}" 
         style="height: 250px; object-fit: cover; transition: 0.5s;">
    
    <span class="position-absolute top-0 end-0 m-3 badge rounded-pill" style="background: #db4566; padding: 8px 15px;">جديد</span>
</div>


          <div class="card-body text-center d-flex flex-column">
            <h5 class="card-title font-weight-bold" style="font-size: 18px; margin-bottom: 10px; color: #333;">
                {{ $products->title }}
            </h5>
            
            <div class="mb-3">
               <span class="h5 font-weight-bold" style="color: #db4566;">{{ number_format($products->price) }}</span>
               <small class="text-muted">EGP</small>
            </div>

            <div class="mt-auto">
              <div class="d-grid gap-2">
                <a href="{{ url('add_cart', $products->id) }}" class="btn text-white" 
                   style="background: #db4566; border-radius: 12px; font-weight: bold; padding: 10px;">
                   <i class="fa fa-shopping-cart"></i> أضف للسلة
                </a>
                <a href="{{ url('product_details', $products->id) }}" class="btn btn-outline-secondary border-0 text-sm">
                   عرض التفاصيل
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="{{ url('shop') }}" class="btn btn-dark px-5 py-3" style="border-radius: 50px; font-weight: 800; background: #222;">
        مشاهدة جميع الهدايا
      </a>
    </div>

  </div>
</section>

<style>
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(219,69,102,0.15) !important;
    }
    .card:hover img {
        transform: scale(1.1);
    }
    .shop_section {
        background: linear-gradient(180deg, #ffffff 0%, #f9f9f9 100%);
    }
</style>