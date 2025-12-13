  
  @extends('website.layout')
  @section('content')

  
<!-- CSRF token for AJAX --
<meta name="csrf-token" content="{{ csrf_token() }}">-->
<!-- Swiper CSS --
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />-->
<!-- ✅ Swiper JS 
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>-->

<style>
.testimonial-section {
  background: #f7f9f8;
  padding: 80px 20px;
  text-align: center;
}

.section-title {
  font-size: 32px;
  font-weight: 700;
  color: #2f5132;
  margin-bottom: 50px;
}

.testimonial-slider {
  position: relative;
  max-width: 700px;
  margin: auto;
  overflow: hidden;
  padding: 0 50px;
}

.testimonial-slide {
  display: none;
  padding: 30px 20px;
}

.testimonial-slide.is-active {
  display: block;
}

.testimonial-text {
  font-size: 18px;
  font-style: italic;
  margin-bottom: 25px;
  color: #444;
  line-height: 1.6;
}

.customer-info {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}

.customer-info img {
  border-radius: 50%;
  width: 50px;
  height: 50px;
}

.dots {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  gap: 8px;
}

.dot {
  width: 12px;
  height: 12px;
  background: #ccc;
  border-radius: 50%;
  cursor: pointer;
}

.dot.active {
  background: #2f5132;
  transform: scale(1.15);
}

.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #2f5132;
  color: #fff;
  border: none;
  font-size: 22px;
  padding: 8px 12px;
  cursor: pointer;
  border-radius: 50%;
}

.slider-btn:hover {
  background: #1d361f;
}

.prev { left: 10px; }
.next { right: 10px; }
/* Customer Info */
.customer-info {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 15px;
}

.customer-info img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
}

.customer-info h4 {
  font-size: 16px;
  margin: 0;
  color: #2f5132;
}

.customer-info span {
  font-size: 14px;
  color: #777;
}

/* Navigation Arrows */
.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #2f5132;
  color: #fff;
  border: none;
  font-size: 22px;
  padding: 10px 12px;
  border-radius: 50%;
  cursor: pointer;
  transition: background 0.2s, transform 0.15s;
  z-index: 5;
  box-shadow: 0 3px 8px rgba(0,0,0,0.12);
}

.slider-btn:hover {
  background: #4a6b4a;
  transform: translateY(-50%) scale(1.03);
}

/* place arrows inside the slider edge */
.prev { left: 12px; }
.next { right: 12px; }

/* responsive tweaks */
@media (max-width: 768px) {
  .testimonial-slider { padding: 0 20px; }
  .section-title { font-size: 24px; margin-bottom: 30px; }
  .testimonial-text { font-size: 16px; }
  .slider-btn { font-size: 20px; padding: 8px 10px; }
  .customer-info img { width: 50px; height: 50px; }
}

</style>



  <!--------------- hero-section --------------->
    <section id="hero" class="hero">
        <div class="hero-section">
            <div class="container">
				
			
				
				
			{{--	@if($type === 'slider')
				
					 <div class="swiper hero-swiper">
                    <div class="swiper-wrapper hero-wrapper">
					 @foreach($activeSlider as $slider) 
                @foreach($slider->items as $datas) 
                        <div class="swiper-slide hero-slide">
                            <div class="hero-wrapper-slide wrapper-slide">
                                <div class="wrapper-info">
                                    <span class="wrapper-subtitle">{{$datas->content}}</span>
                                    <h1 class="wrapper-details">{{$datas->name}}</h1>
                                    <a href="/shop" class="shop-btn">Shop Now
                                        <span>
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                    transform="rotate(45 1.45312 0.914062)" />
                                                <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                    transform="rotate(135 8 7.45703)" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="wrapper-img">
                                    <img src="{{$datas->image}}" alt="img">
                                </div>
                            </div>
                        </div>
                        @endforeach
            @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
				
				
			

			@elseif($type === 'full_slider')
				
				
					<div class="swiper hero-swiper">
					  <div class="swiper-wrapper">
						   @foreach($activeSlider as $slider)
                @foreach($slider->items as $data)
						<!-- Slide 1 -->
						<div class="swiper-slide">
						  <img src="{{$data->image}}" alt="Slide 1" class="w-100 img-fluid">
						</div>
						     @endforeach
            @endforeach

						

					  <!-- Pagination (dots) -->
					  <div class="swiper-pagination" style="display:flex;justify-content:center"></div>

					</div>
				
				
			@else
				
			@endif --}}

				
				
				
				
				
				
				
               @if(!empty($active_div) && isset($active_div[0]) && $active_div[0]['id'] == 1)
                <div class="swiper hero-swiper">
                    <div class="swiper-wrapper hero-wrapper">
						
						

                    @foreach($slider as $datas)
                        <div class="swiper-slide hero-slide">
                            <div class="hero-wrapper-slide wrapper-slide">
                                <div class="wrapper-info">
                                    <span class="wrapper-subtitle">{{$datas->content}}</span>
                                    <h1 class="wrapper-details">{{$datas->name}}</h1>
                                    <a href="/shop" class="shop-btn">Shop Now
                                        <span>
                                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                    transform="rotate(45 1.45312 0.914062)" />
                                                <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                    transform="rotate(135 8 7.45703)" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <div class="wrapper-img">
                                    <img src="{{$datas->image}}" alt="img">
                                </div>
                            </div>
                        </div>
                    @endforeach   
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
						
				
				
				
				  @elseif(!empty($active_div) && isset($active_div[0]) && $active_div[0]['id'] == 2)
					<div class="swiper hero-swiper">
					  <div class="swiper-wrapper">
						  @foreach($full_slider as $data)
						<!-- Slide 1 -->
						<div class="swiper-slide">
						  <img src="{{$data->image}}" alt="Slide 1" class="w-100 img-fluid">
						</div>
						  @endforeach 

						

					  <!-- Pagination (dots) -->
					  <div class="swiper-pagination" style="display:flex;justify-content:center"></div>

					</div>
					@else
						
				@endif
				
				
					<div class="hero-service">
                    <div class="row gy-4">
                        <div class="col-lg-3  col-sm-6">
                            <div class="service-wrapper free-shipping">
                                <div class="service-img">
                                    <span>
                                        <svg width="32" height="37" viewBox="0 0 36 37" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H5.63636V24.1818H35" stroke="#F9FFFB" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="square" />
                                            <path
                                                d="M8.72763 35.0021C10.4347 35.0021 11.8185 33.6183 11.8185 31.9112C11.8185 30.2042 10.4347 28.8203 8.72763 28.8203C7.02057 28.8203 5.63672 30.2042 5.63672 31.9112C5.63672 33.6183 7.02057 35.0021 8.72763 35.0021Z"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                            <path
                                                d="M31.9073 35.0021C33.6144 35.0021 34.9982 33.6183 34.9982 31.9112C34.9982 30.2042 33.6144 28.8203 31.9073 28.8203C30.2003 28.8203 28.8164 30.2042 28.8164 31.9112C28.8164 33.6183 30.2003 35.0021 31.9073 35.0021Z"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                            <path d="M34.9982 1H11.8164V18H34.9982V1Z" stroke="#F9FFFB" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="square" />
                                            <path d="M11.8164 7.17969H34.9982" stroke="#F9FFFB" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="square" />
                                        </svg>

                                    </span>
                                </div>
                                <div class="service-content">
                                    <h5 class="service-info service-title">Free Shipping</h5>
                                    <p class="service-info service-details">When ordering over $100</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="service-wrapper free-shipping">
                                <div class="service-img">
                                    <span>
                                        <svg width="32" height="37" viewBox="0 0 32 34" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M31 17.4492C31 25.6992 24.25 32.4492 16 32.4492C7.75 32.4492 1 25.6992 1 17.4492C1 9.19922 7.75 2.44922 16 2.44922C21.85 2.44922 26.95 5.74922 29.35 10.6992"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10" />
                                            <path d="M30.7 2L29.5 10.85L20.5 9.65" stroke="#F9FFFB" stroke-width="2"
                                                stroke-miterlimit="10" stroke-linecap="square" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="service-content">
                                    <h5 class="service-info service-title">Free Return</h5>
                                    <p class="service-info service-details">Get Return within 30 days</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="service-wrapper free-shipping">
                                <div class="service-img">
                                    <span>
                                        <svg width="32" height="37" viewBox="0 0 32 38" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.6654 18.668H9.33203V27.0013H22.6654V18.668Z" stroke="#F9FFFB"
                                                stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" />
                                            <path
                                                d="M12.668 18.6654V13.6654C12.668 11.832 14.168 10.332 16.0013 10.332C17.8346 10.332 19.3346 11.832 19.3346 13.6654V18.6654"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                            <path
                                                d="M31 22C31 30.3333 24.3333 37 16 37C7.66667 37 1 30.3333 1 22V5.33333L16 2L31 5.33333V22Z"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="service-content">
                                    <h5 class="service-info service-title">Secure Payment</h5>
                                    <p class="service-info service-details">100% Secure Online Payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="service-wrapper free-shipping">
                                <div class="service-img">
                                    <span>
                                        <svg width="32" height="37" viewBox="0 0 32 35" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 13H5.5C2.95 13 1 11.05 1 8.5V1H7" stroke="#F9FFFB"
                                                stroke-width="2" stroke-miterlimit="10" />
                                            <path d="M25 13H26.5C29.05 13 31 11.05 31 8.5V1H25" stroke="#F9FFFB"
                                                stroke-width="2" stroke-miterlimit="10" />
                                            <path d="M16 28V22" stroke="#F9FFFB" stroke-width="2"
                                                stroke-miterlimit="10" />
                                            <path d="M16 22C11.05 22 7 17.95 7 13V1H25V13C25 17.95 20.95 22 16 22Z"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                            <path d="M25 34H7C7 30.7 9.7 28 13 28H19C22.3 28 25 30.7 25 34Z"
                                                stroke="#F9FFFB" stroke-width="2" stroke-miterlimit="10"
                                                stroke-linecap="square" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="service-content">
                                    <h3 class="service-info service-title">Best Quality</h3>
                                    <p class="service-info service-details">Original Product Guarenteed</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- hero-section-end --------------->

    <!--------------- category-section --------------->
    <section class="product-category product">
        <div class="container">
            <div class="section-title" style="justify-content:space-between;">
                <h3>Market Category</h3>
                <a href="/shop" class="view">View All</a>
            </div>
            <div class="category-section">


            @foreach($categorydata as $data)
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img src="{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}" alt="img">
                    </div>
                    <div class="wrapper-info">
                        <a href="/product_information?id={{$data->id}}" class="wrapper-details">{{$data->name}}</a>
                    </div>
                </div>
            @endforeach   
                
              
                
            </div>
            <div class="healthy-section">
                <div class="row gy-4 gx-5 gy-lg-0">
                    @foreach($addsdata as $data)
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="product-wrapper wrapper-two" data-aos="fade-up">
                            <div class="wrapper-img">
                                <img src="{{$data->adds_image}}" alt="img">
                            </div>
                            <div class="wrapper-info">
                                <span class="wrapper-subtitle">{{$data->adds_name}}</span>
                                <h2 class="wrapper-details">
                                    {{$data->adds_content}}
                                </h2>
                                <a href="product-sidebar.html" class="shop-btn">Shop Now
                                    <span>
                                        <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                                transform="rotate(45 1.45312 0.914062)" />
                                            <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                                transform="rotate(135 8 7.45703)" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--------------- category-section-end--------------->

    <!--------------- fresh-section--------------->
    <section class="product fresh">
        <div class="container">
            <div class="section-title" style="justify-content:space-between;">
                <h3>Fresh Vegetables</h3>
                <a href="/shop" class="view">View All</a>
            </div>
            <div class="fresh-section">
                <div class="row g-5">
                    @foreach($productdata->take(8) as $data)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
							<a href="/product_information?id={{$data->id}}">
                            <div class="product-img">
                      			 <img src="{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}"  alt="product-img">
                                <div class="product-cart-items">
         						</div>
                            </div>
							</a>
                            <div class="product-info">
                                <div class="ratings">
                                    <span>
                                        <svg width="90" height="18" viewBox="0 0 75 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                fill="#FFA800" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="/product_information?id={{$data->id}}" class="product-details">{{$data->name}}
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">RS.{{$data->m_price}}</span>
                                        <span class="new-price">RS.{{$data->s_price}}</span>
                                    </div>
                                </div>
                                <div class="product-cart-btn">
                              <a type="button" class="add-to-cart-btn product-btn" data-id="{{$data->id}}" onclick="addToCart({{$data->id}}, '{{$data->name}}', {{$data->m_price}}, {{$data->s_price}}, '{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}') "> <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg><span class="textContainer"> Add to Cart</span></a>
                                </div>


                            </div>
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </section>
    <!---------------fresh-section-end--------------->

    <!--------------- flash-section--------------->
    <section class="product flash-sale">
        <div class="container">
            <div class="flash-sale-section">
                <div class="countdown-section">
                    <div class="countdown-items">
                        <span id="day" class="number" style="color: red;"></span>
                        <span class=" text">Days</span>
                    </div>
                    <div class="countdown-items">
                        <span id="hour" class="number" style="color: skyblue;">0</span>
                        <span class="text">Hours</span>
                    </div>
                    <div class="countdown-items">
                        <span id="minute" class="number" style="color: green;">0</span>
                        <span class="text">Minutes</span>
                    </div>
                    <div class="countdown-items">
                        <span id="second" class="number" style="color: red;">0</span>
                        <span class="text">Seconds</span>
                    </div>
                </div>
                <div class="flash-sale-content">
                    <h2 class="wrapper-heading">WOO! Flash Sale </h2>
                    <p class="wrapper-details">You get into the 2k+ best Products in br Flash offer with as in <br>
                        shaped sofa
                        for sale.
                    </p>
                    <a href="product-sidebar.html" class="shop-btn">Shop Now
                        <span>
                            <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                    transform="rotate(45 1.45312 0.914062)" />
                                <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                    transform="rotate(135 8 7.45703)" />
                            </svg>
                        </span>
                    </a>
                </div>
                <div class="discount-item">
                    <h3 class="discount-primary">
                        <span class="discount-text">26%</span>
                        <span class="discount-inner-text">OFF</span>
                    </h3>
                </div>
            </div>

        </div>
    </section>
    <!--------------- flash-section-end--------------->

    <!--------------- top-sell-section--------------->
   
    <!--------------- top-sell-section-end--------------->

    <!--------------- juice-section--------------->
    <section class="product fresh juice-product">
        <div class="container">
            <div class="section-title" style="justify-content:space-between;">
                <h3>Drinks Juice</h3>
                <a href="/shop" class="view">View All</a>
            </div>
            <div class="juice-product-section">
                <div class="row g-5">
                    @foreach($productdata->take(8) as $data)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
						
                        <div class="product-wrapper" data-aos="fade-up">
							
                            <div class="product-img">
								<a href="/product_information?id={{$data->id}}" class="product-details">
								<div>
                                   <img src="{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}"  alt="product-img" style="max-width:200px;">
								</div>
								</a>
									<div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="white" />
                                                <path
                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                    fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="wishlist.html" class="favourite cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="#AE1C9A" />
                                                <path
                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                    fill="#000" />
                                            </svg>

                                        </span>
                                    </a>
                                    <a href="compaire.html" class="compaire cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="white" />
                                                <path
                                                    d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z"
                                                    fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="ratings">
                                    <span>
                                        <svg width="90" height="18" viewBox="0 0 75 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                fill="#FFA800" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="/product_information?id={{$data->id}}" class="product-details">{{$data->name}}
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">RS.{{$data->m_price}}</span>
                                        <span class="new-price">RS.{{$data->s_price}}</span>
                                    </div>
                                </div>
                   			 <div class="product-cart-btn">
								  <a type="button" class="add-to-cart-btn product-btn" data-id="{{$data->id}}" onclick="addToCart({{$data->id}}, '{{$data->name}}', {{$data->m_price}}, {{$data->s_price}}, '{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}') "> 
									  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
									   </svg>
									  <span class="textContainer"> Add to Cart</span>
									</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!--------------- juice-section-end--------------->

    <!--------------- best-product-section--------------->
    <section class="product best-product">
        <div class="container">
            <div class="best-product-section">
                <div class="product-wrapper">
                    <div class="product-info" id="info-left">
                        <h2 class="wrapper-heading">Get the best deal for Grocery</h2>
                        <p class="wrapper-details">You get into the 2k+ best Products in Flash offer with as into the
                            find to <br> makein shaped sofa for sale.
                        </p>
                        <a href="product-sidebar.html" class="shop-btn">Shop Now
                            <span>
                                <svg width="8" height="14" viewBox="0 0 8 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1.45312" y="0.914062" width="9.25346" height="2.05632"
                                        transform="rotate(45 1.45312 0.914062)" />
                                    <rect x="8" y="7.45703" width="9.25346" height="2.05632"
                                        transform="rotate(135 8 7.45703)" />
                                </svg>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- best-product-section--------------->
    <div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators (dots) -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner">
	  @foreach($adds as $add)
    <div class="carousel-item active">
      
		 <a href="{{ $add->url }}" target="_blank">
         <img src="{{$add->image}}" class="d-block w-100" alt="Slide 1">
        </a>
    </div>
	  
	  @endforeach
	  
	  
   {{-- <div class="carousel-item">
      <img src="https://picsum.photos/1920/600?random=2" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="https://picsum.photos/1920/600?random=3" class="d-block w-100" alt="Slide 3">
    </div> --}}
	  
	  
  </div>

  <!-- Controls -->
  <!--<button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>-->
</div>

    <!---------------new-arrival-section--------------->
    <section class="product arrival">
        <div class="container">
            <div class="section-title" style="justify-content:space-between;">
                <h3>New Arrivals</h3><!----We Can Take one model no need to take several models in it--------------->
                <a href="/shop" class="view">View All</a>
            </div>
            <div class="arrival-section">
                <div class="row g-5">
                    @foreach($new_arrival_data as $data)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
							<a href="/product_information?id={{$data->id}}" class="product-details">
                            <div class="product-img">
								 <img src="{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}"  alt="product-img" style="max-width:200px;">
								   <div class="product-cart-items">
                                    <a href="#" class="cart cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="white" />
                                                <path
                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M12 14.4482V16.5664H12.5466H13.0933V15.3957V14.2204L15.6214 16.7486L18.1496 19.2767L18.5459 18.8759L18.9468 18.4796L16.4186 15.9514L13.8904 13.4232H15.0657H16.2364V12.8766V12.33H14.1182H12V14.4482Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M23.4345 12.8766V13.4232H24.6052H25.7805L23.2523 15.9514L20.7241 18.4796L21.125 18.8759L21.5213 19.2767L24.0495 16.7486L26.5776 14.2204V15.3957V16.5664H27.1243H27.6709V14.4482V12.33H25.5527H23.4345V12.8766Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M15.6078 23.5905L13.0933 26.1096V24.9343V23.7636H12.5466H12V25.8818V28H14.1182H16.2364V27.4534V26.9067H15.0657H13.8904L16.4186 24.3786L18.9468 21.8504L18.5596 21.4632C18.35 21.2491 18.1633 21.076 18.1496 21.076C18.1359 21.076 16.9926 22.2103 15.6078 23.5905Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M21.1113 21.4632L20.7241 21.8504L23.2523 24.3786L25.7805 26.9067H24.6052H23.4345V27.4534V28H25.5527H27.6709V25.8818V23.7636H27.1243H26.5776V24.9343V26.1096L24.0586 23.5905C22.6783 22.2103 21.535 21.076 21.5213 21.076C21.5076 21.076 21.3209 21.2491 21.1113 21.4632Z"
                                                    fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a href="wishlist.html" class="favourite cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="#AE1C9A" />
                                                <path
                                                    d="M14.6928 12.3935C13.5057 12.54 12.512 13.0197 11.671 13.8546C10.9155 14.6016 10.4615 15.3926 10.201 16.4216C9.73957 18.2049 10.0745 19.9626 11.1835 21.6141C11.8943 22.6723 12.8135 23.6427 14.4993 25.1221C15.571 26.0632 18.8422 28.8096 19.0022 28.9011C19.1511 28.989 19.2069 29 19.5232 29C19.8395 29 19.8953 28.989 20.0442 28.9011C20.2042 28.8096 23.4828 26.0595 24.5471 25.1221C26.2404 23.6354 27.1521 22.6687 27.8629 21.6141C28.9719 19.9626 29.3068 18.2049 28.8454 16.4216C28.5849 15.3926 28.1309 14.6016 27.3754 13.8546C26.6237 13.1113 25.8199 12.6828 24.7667 12.4631C24.2383 12.3533 23.2632 12.3423 22.8018 12.4448C21.5142 12.7194 20.528 13.3529 19.6274 14.4808L19.5232 14.609L19.4227 14.4808C18.5333 13.3749 17.562 12.7414 16.3228 12.4631C15.9544 12.3789 15.1059 12.3423 14.6928 12.3935ZM15.9357 13.5104C16.9926 13.6935 17.9044 14.294 18.6263 15.2864C18.7491 15.4585 18.9017 15.6636 18.9613 15.7478C19.2367 16.1286 19.8098 16.1286 20.0851 15.7478C20.1447 15.6636 20.2973 15.4585 20.4201 15.2864C21.4062 13.9315 22.7795 13.2944 24.2755 13.4958C25.9352 13.7191 27.2303 14.8616 27.7252 16.5424C28.116 17.8717 27.9448 19.2668 27.234 20.5228C26.6386 21.5738 25.645 22.676 23.9145 24.203C23.0772 24.939 19.5567 27.9198 19.5232 27.9198C19.486 27.9198 15.9804 24.95 15.1319 24.203C12.4711 21.8557 11.4217 20.391 11.1686 18.6736C11.0049 17.5641 11.2393 16.3703 11.8087 15.4292C12.6646 14.0121 14.3318 13.2358 15.9357 13.5104Z"
                                                    fill="#000" />
                                            </svg>

                                        </span>
                                    </a>
                                    <a href="compaire.html" class="compaire cart-item">
                                        <span>
                                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="40" height="40" rx="3" fill="white" />
                                                <path
                                                    d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M18.8948 10.6751C18.8948 11.0444 18.8829 11.3502 18.871 11.3502C18.8591 11.3502 18.6645 11.3859 18.4461 11.4336C14.674 12.1959 11.8588 15.1779 11.3346 18.966C11.2115 19.8316 11.2632 21.1499 11.4498 22.0314C11.9223 24.2867 13.3875 26.4031 15.3252 27.642L15.5515 27.7849L16.1114 27.364C16.4171 27.1337 16.6712 26.9352 16.6712 26.9193C16.6712 26.9074 16.572 26.8439 16.4529 26.7803C15.8453 26.4627 15.0552 25.8274 14.5191 25.2278C13.5026 24.0882 12.8514 22.6984 12.641 21.2372C12.5655 20.6972 12.5655 19.6251 12.641 19.1129C12.8038 18.0289 13.185 17.0044 13.7568 16.1071C14.4715 14.9913 15.5594 14.0145 16.7507 13.4149C17.3542 13.1132 18.192 12.8273 18.7678 12.724L18.8948 12.7002V13.2561C18.8948 13.5618 18.9028 13.812 18.9147 13.812C18.9544 13.812 21.4361 11.9339 21.4361 11.9061C21.4361 11.8783 18.9544 10.0001 18.9147 10.0001C18.9028 10.0001 18.8948 10.3019 18.8948 10.6751Z"
                                                    fill="black" fill-opacity="0.2" />
                                                <path
                                                    d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z"
                                                    fill="#181818" />
                                                <path
                                                    d="M24.219 12.9662C23.9133 13.1965 23.6671 13.399 23.679 13.4149C23.6909 13.4347 23.81 13.5102 23.949 13.5856C25.1124 14.2448 26.1964 15.3566 26.8675 16.5914C27.2725 17.334 27.614 18.414 27.7092 19.2558C27.7887 19.9189 27.741 21.0585 27.614 21.662C27.066 24.2589 25.2593 26.3514 22.7657 27.2806C22.452 27.3957 21.6023 27.63 21.4911 27.63C21.4474 27.63 21.4355 27.5307 21.4355 27.0741C21.4355 26.7684 21.4276 26.5182 21.4157 26.5182C21.376 26.5182 18.8943 28.3963 18.8943 28.4241C18.8943 28.4519 21.376 30.3301 21.4157 30.3301C21.4276 30.3301 21.4355 30.0283 21.4355 29.6551V28.984L21.5864 28.9602C21.9557 28.9006 23 28.6187 23.3415 28.4837C26.4386 27.2726 28.559 24.5884 28.9997 21.3166C29.1149 20.4748 29.0633 19.1565 28.8806 18.2988C28.4081 16.0435 26.9429 13.9271 25.0052 12.6882L24.7789 12.5453L24.219 12.9662Z"
                                                    fill="black" fill-opacity="0.2" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
							</a>
                            <div class="product-info">
                                <div class="ratings">
                                    <span>
                                        <svg width="90" height="18" viewBox="0 0 75 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M22.5 0L24.1839 5.18237H29.6329L25.2245 8.38525L26.9084 13.5676L22.5 10.3647L18.0916 13.5676L19.7755 8.38525L15.3671 5.18237H20.8161L22.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M37.5 0L39.1839 5.18237H44.6329L40.2245 8.38525L41.9084 13.5676L37.5 10.3647L33.0916 13.5676L34.7755 8.38525L30.3671 5.18237H35.8161L37.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M52.5 0L54.1839 5.18237H59.6329L55.2245 8.38525L56.9084 13.5676L52.5 10.3647L48.0916 13.5676L49.7755 8.38525L45.3671 5.18237H50.8161L52.5 0Z"
                                                fill="#FFA800" />
                                            <path
                                                d="M67.5 0L69.1839 5.18237H74.6329L70.2245 8.38525L71.9084 13.5676L67.5 10.3647L63.0916 13.5676L64.7755 8.38525L60.3671 5.18237H65.8161L67.5 0Z"
                                                fill="#FFA800" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="product-description">
                                    <a href="/product_information?id={{$data->id}}" class="product-details">{{$data->name}}
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">RS.{{$data->m_price}}</span>
                                        <span class="new-price">RS.{{$data->s_price}}</span>
                                    </div>
                                </div>
                              			 <div class="product-cart-btn">
								  <a type="button" class="add-to-cart-btn product-btn" data-id="{{$data->id}}" onclick="addToCart({{$data->id}}, '{{$data->name}}', {{$data->m_price}}, {{$data->s_price}}, '{{ !empty($data->image) ? asset($data->image) : asset('default.png') }}') "> 
									  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
									   </svg>
									  <span class="textContainer"> Add to Cart</span>
									</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            </div>
           
			</section>

    <!---------------new-arrival-section-end--------------->
<section class="testimonial-section">
  <div class="container">
    <h2 class="section-title">What Our Customers Say</h2>

    <div class="testimonial-slider">
      <button class="slider-btn prev" id="prev">&#10094;</button>

      <div class="slides">
		  @foreach($feedback as $data)
        <div class="testimonial-slide is-active">
          <p class="testimonial-text">
            {{$data->description}}
          </p>
          <div class="customer-info">
            <img src="{{$data->profile}}" alt="Sarah">
            <div>
              <h4>{{$data->name}}</h4>
              <span>
				
			 @if ($data->rating == 1)
                  ⭐☆☆☆☆ 
              @elseif($data->rating == 2)
                         ⭐⭐☆☆☆ 
               @elseif($data->rating == 3)
                           ⭐⭐⭐☆☆ 
                 @elseif($data->rating == 4)
                        ⭐⭐⭐⭐☆ 
              @elseif($data->rating == 5)
       				   ⭐⭐⭐⭐⭐ 
                  @else
                       --
                   @endif	
				
				</span>
            </div>
          </div>
        </div>
		  
	@endforeach	  
		  
		  

     
		  
		  
      </div>
      <button class="slider-btn next" id="next">&#10095;</button>
    </div>

    <div class="dots" id="dots"></div>
  </div>
</section>

    <!---------------popular-sales-section--------------->
   <!-- <section class="product popular-sale footer-padding" style="display:none;">
        <div class="container">
            <div class="section-title" style="justify-content:space-between;">
                <h3>Popular Sales</h3>
                <a href="/shop" class="view">View All</a>
            </div>
            <div class="popular-sale-section">
                <div class="row g-5">
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="website-assets/images/homepage-one/product-img/p-img-26.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-29.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-31.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-34.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-27.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-30.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-32.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-35.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-28.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-12.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-33.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-wrapper" data-aos="fade-up">
                            <div class="product-img">
                                <img src="assets/images/homepage-one/product-img/p-img-36.webp" alt="product-img">
                            </div>
                            <div class="product-info">
                                <div class="product-description">
                                    <a href="product-info.html" class="product-details">Fresh Red Tomatos
                                    </a>
                                    <div class="price">
                                        <span class="price-cut">$12.99</span>
                                        <span class="new-price">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!---------------popular-sales-section-end--------------->



    <div id="toast" class="fixed bottom-5 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded opacity-0 transition-opacity">
    Product added to cart!
</div>
  <!-- Toast -->
  <div id="toast" class="fixed bottom-5 left-1/2 transform -translate-x-1/2 bg-green-500 
                      text-white px-4 py-2 rounded opacity-0">
    Text added successfully!
  </div>

  <script>
    const buttons = document.querySelectorAll('.add-to-cart-btn');
    const toast = document.getElementById('toast');

    buttons.forEach(button => {
      button.addEventListener('click', () => {
        const productId = button.getAttribute('data-id');
        const textContainer = button.querySelector('.textContainer');

        // Change text for that product
        textContainer.textContent = `Added (ID: ${productId})`;

        // Show toast
        toast.textContent = `Product ${productId} added successfully!`;
        toast.style.opacity = '1';

        setTimeout(() => {
          toast.style.opacity = '0';
        }, 2000);
      });
    });

document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".testimonial-slide");
  const nextBtn = document.getElementById("next");
  const prevBtn = document.getElementById("prev");
  const dotsContainer = document.getElementById("dots");

  let currentIndex = 0;

  // Show Slide
  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove("is-active");
      if (i === index) slide.classList.add("is-active");
    });

    const dots = dotsContainer.querySelectorAll(".dot");
    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });
  }

  // Create Dots
  slides.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.classList.add("dot");
    if (i === 0) dot.classList.add("active");
    dot.addEventListener("click", () => {
      currentIndex = i;
      showSlide(currentIndex);
    });
    dotsContainer.appendChild(dot);
  });

  // Navigation
  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  });

  prevBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
  });

  // Auto Slide
  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  }, 5000);

  showSlide(currentIndex);
});
</script>



<script>
// Cart array to hold session data
let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
	

// Function to add product to cart
function addToCart(id, name, mrp, price,img) {
    const existingProduct = cart.find(item => item.id === id);
    if (existingProduct) {
        existingProduct.qty += 1;
        existingProduct.tot = existingProduct.qty * existingProduct.price;

    } else {
        const tot = price;
        cart.push({ id, name, mrp, price, qty: 1,img});
    }
	updateCart();
}

// Function to update the cart display

</script>	
<script>
  var swiper = new Swiper(".hero-swiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
    @endsection