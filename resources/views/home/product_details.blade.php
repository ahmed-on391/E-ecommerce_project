<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $data->title }}</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    body { font-family: 'Poppins', sans-serif; background: #f5f6fa; color: #101010; margin: 0; }
    .container { max-width: 1000px; margin: auto; padding: 20px; }

    .heading_container { text-align: center; margin-top: 20px; }
    .heading_container h2 { font-size: 1.8rem; font-weight: 700; margin-bottom: 5px; }
    .heading_container p { color: #666; font-size: 14px; }

    .product-section { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
    .product-images { flex: 1 1 300px; min-width: 280px; }

    /* Carousel */
    .carousel { position: relative; overflow: hidden; border-radius: 12px; }
    .carousel-images { display: flex; transition: transform 0.5s ease; }
    .carousel-images img { width: 100%; height: auto; object-fit: cover; transition: transform 0.3s ease; }
    .carousel-images img:hover { transform: scale(1.1); cursor: zoom-in; }
    
    .carousel-btn { position: absolute; top: 50%; transform: translateY(-50%); background: rgba(0,0,0,0.4); color: #fff; border: none; padding: 10px; border-radius: 50%; cursor: pointer; }
    .carousel-btn.left { left: 10px; }
    .carousel-btn.right { right: 10px; }

    .product-info { flex: 1 1 300px; min-width: 280px; text-align: right; }
    .product-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 10px; }
    .product-price { font-size: 1.3rem; color: #007bff; font-weight: bold; margin-bottom: 15px; }
    .product-short-description { font-size: 0.95rem; color: #555; margin-bottom: 15px; }
    .product-description { font-size: 0.9rem; color: #333; line-height: 1.5; }

    .stars i { color: #ffc107; margin-right: 2px; font-size: 14px; }
    .rating { margin-bottom: 15px; }

    .btn-main, .btn-secondary {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      font-size: 14px;
      margin-bottom: 10px;
      transition: all 0.3s ease;
    }

    .btn-main { background: linear-gradient(135deg, #007bff, #00a8ff); color: #fff; }
    .btn-main:hover { transform: scale(1.05); background: linear-gradient(135deg, #0062cc, #007bff); }
    .btn-secondary { background: #6c757d; color: #fff; }
    .btn-secondary:hover { background: #5a6268; }

    .product-extra { margin-top: 30px; padding: 15px; background: #fff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .product-extra h4 { margin-bottom: 10px; font-size: 1.2rem; font-weight: 600; }

    /* Responsive */
    @media (max-width: 768px) { .product-section { flex-direction: column; gap: 15px; } }
    @media (max-width: 480px) { .container { padding: 10px; } .heading_container h2 { font-size: 1.4rem; } }
  </style>
</head>
<body>
  <div class="container">
    <div class="heading_container">
      <h2>{{ $data->title }}</h2>
      <p>تفاصيل المنتج</p>
    </div>

    <div class="product-section">
      <!-- Carousel الصور -->
      <div class="product-images">
        <div class="carousel">
          <div class="carousel-images" id="carousel-images">
            @foreach(json_decode($data->images ?? '[]') as $img)
              <img src="{{ asset('products/'.$img) }}" alt="{{ $data->title }}">
            @endforeach
            @if(empty(json_decode($data->images ?? '[]')))
              <img src="{{ asset('products/'.$data->image) }}" alt="{{ $data->title }}">
            @endif
          </div>
          <button class="carousel-btn left" onclick="prevSlide()">&#10094;</button>
          <button class="carousel-btn right" onclick="nextSlide()">&#10095;</button>
        </div>
      </div>

      <div class="product-info">
        <h3 class="product-title">{{ $data->title }}</h3>
        <p class="product-price">{{ $data->price }} EGP</p>
        <p class="product-short-description">{{ $data->short_description ?? 'وصف قصير للمنتج' }}</p>

        <div class="rating stars">
          @for($i=1; $i<=5; $i++)
            <i class="fa fa-star" style="color: {{ $i <= ($data->rating ?? 4) ? '#ffc107' : '#e4e5e9' }}"></i>
          @endfor
          <span>({{ $data->reviews_count ?? 0 }} مراجعات)</span>
        </div>

        <div>
          <a href="#" class="btn-main">إضافة إلى السلة</a>
          <a href="#" class="btn-main">اشتري الآن</a>
          <a href="{{ url('/') }}" class="btn-secondary">العودة للمتجر</a>
        </div>
      </div>
    </div>

    <div class="product-extra">
      <h4>تفاصيل المنتج</h4>
      <p class="product-description">{{ $data->description ?? 'لا توجد تفاصيل إضافية للمنتج.' }}</p>
    </div>
  </div>

  <script>
    let index = 0;
    const carousel = document.getElementById('carousel-images');
    const total = carousel.children.length;

    function showSlide(i) {
      index = i;
      if(index < 0) index = total - 1;
      if(index >= total) index = 0;
      carousel.style.transform = `translateX(-${index * 100}%)`;
    }

    function nextSlide() { showSlide(index + 1); }
    function prevSlide() { showSlide(index - 1); }
  </script>
</body>
</html>
