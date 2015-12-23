	<!-- produk -->
	<section id="featured" class="row mt40">
		<div class="container">
			<h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"><a class="nodecor" href="{{url('produk')}}"> See Our Most featured Products</a></span></h1>
			<ul class="thumbnails">
				{{-- */ $i=1 /* --}}
				@foreach(home_product() as $key=>$myproduk)
					<li class="span3">
						<a class="prdocutname" href="{{product_url($myproduk)}}">{{shortName($myproduk->nama,16)}}</a>
						<div class="thumbnail">
						@if(is_terlaris($myproduk))
							<span class="hot tooltip-test">HOT</span>
						@elseif(is_produkbaru($myproduk))
							<span class="new tooltip-test">NEW</span>
						@endif
							<a href="{{product_url($myproduk)}}"><img alt="{{$myproduk->nama}}" src="{{product_image_url($myproduk->gambar1,'medium')}}"></a>
							<div class="shortlinks">
								<a class="details" href="{{product_url($myproduk)}}">DETAILS</a>
								<!-- <a class="wishlist" href="#">WISHLIST</a> -->
							</div>
							<div class="pricetag">
								<span class="spiral"></span>
								<a href="{{product_url($myproduk)}}" class="productcart">Lihat Produk</a>
							
								@if($setting->checkoutType!=2)
								<div class="price">
									<div class="pricenew">{{price($myproduk->hargaJual)}}</div>
									@if($myproduk->hargaCoret != 0)
									<div class="priceold">{{price($myproduk->hargaCoret)}}</div>
									@endif
								</div>
								@endif							
							</div>
						</div>
					</li>
					@if($i%4 == 0)
					<div class="hidden-phone clearfix"></div>
					@endif
					{{-- */ $i++ /* --}}
				@endforeach
			</ul>
		</div>
	</section>

	<!-- new produk -->
	<section id="latest" class="row">
		<div class="container">
			<h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
			<ul class="thumbnails">
			{{-- */ $j=1 /* --}}
			@foreach(new_product() as $key=>$myproduk)
				<li class="span3">
					<a class="prdocutname" href="{{product_url($myproduk)}}">{{shortName($myproduk->nama,16)}}</a>
					<div class="thumbnail">
						<a href="{{product_url($myproduk)}}">
							<img alt="{{$myproduk->nama}}" src="{{url(product_image_url($myproduk->gambar1,'medium'))}}">
						</a>
						<div class="shortlinks">
							<a class="details" href="{{product_url($myproduk)}}">DETAILS</a>
						</div>
						<div class="pricetag">
							<span class="spiral"></span>
							<a href="{{product_url($myproduk)}}" class="productcart">Lihat Produk</a>

							@if($setting->checkoutType!=2)
							<div class="price">
								<div class="pricenew">{{price($myproduk->hargaJual)}}</div>
								@if($myproduk->hargaCoret != 0)
								<div class="priceold">{{price($myproduk->hargaCoret)}}</div>
								@endif
							</div>
							@endif
						</div>
					</div>
				</li>
				@if($j%4==0)
				<div class="hidden-phone clearfix"></div>
				@endif
				{{-- */ $j++ /* --}}
			@endforeach
			</ul>
		</div>
	</section>