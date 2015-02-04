	<!-- produk -->
	<section id="featured" class="row mt40">
		<div class="container">
			<h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"><a style="text-decoration: none;" href="{{URL::to('produk')}}"> See Our Most featured Products</a></span></h1>
			<ul class="thumbnails">
				@foreach($produk as $key=>$myproduk)
					<li class="span3">
						<a class="prdocutname" href="{{slugProduk($myproduk)}}">{{shortName($myproduk->nama,16)}}</a>
						<div class="thumbnail">
						@if(is_terlaris($myproduk))
							<span class="sale tooltip-test">Featured</span>
						@endif
						@if(is_produkbaru($myproduk))
							<span class="sale tooltip-test">New</span>
						@endif
							{{is_outstok($myproduk)}}
							<a href="{{slugProduk($myproduk)}}"><img alt="{{$myproduk->nama}}" src="{{URL::to(getPrefixDomain().'/produk/'.$myproduk->gambar1)}}"></a>
							<div class="shortlinks">
								<a class="details" href="{{slugProduk($myproduk)}}">DETAILS</a>
								<!-- <a class="wishlist" href="#">WISHLIST</a> -->
							</div>
							<div class="pricetag">
								<span class="spiral"></span>
								<a href="{{slugProduk($myproduk)}}" class="productcart">View Product</a>
							
								@if($setting->checkoutType!=2)
								<div class="price">
									<div class="pricenew">{{jadiRupiah($myproduk->hargaJual)}}</div>
									@if($myproduk->hargaCoret != 0)
									<div class="priceold">{{jadiRupiah($myproduk->hargaCoret)}}</div>
									@endif
								</div>
								@endif							
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</section>

	<!-- new produk -->
	<section id="latest" class="row">
		<div class="container">
			<h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
			<ul class="thumbnails">
				<li class="span3">
					<a class="prdocutname" href="{{slugProduk($myproduk)}}">{{shortName($myproduk->nama,16)}}</a>
					<div class="thumbnail">
						<a href="{{slugProduk($myproduk)}}"><img alt="" src="{{URL::to(getPrefixDomain().'/produk/'.$myproduk->gambar1)}}"></a>
						<div class="shortlinks">
							<a class="details" href="{{slugProduk($myproduk)}}">DETAILS</a>
						</div>
						<div class="pricetag">
							<span class="spiral"></span>
							<a href="{{slugProduk($myproduk)}}" class="productcart">View Product</a>

							@if($setting->checkoutType!=2)
							<div class="price">
								<div class="pricenew">{{jadiRupiah($myproduk->hargaJual)}}</div>
								@if($myproduk->hargaCoret != 0)
								<div class="priceold">{{jadiRupiah($myproduk->hargaCoret)}}</div>
								@endif
							</div>
							@endif
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<!-- banner -->
	<section class="container smbanner">
		<div class="row">
		@foreach(getBanner(1) as $banner)
			<div class="span3">
				<a href="{{URL::to($banner->url)}}"><img width="950" src="{{URL::to(getPrefixDomain().'/galeri/'.$banner->gambar)}}"/></a>
			</div>
		@endforeach
		</div>
	</section>