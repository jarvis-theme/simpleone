	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->  
			@if(!empty($kategoridetail))
				<ul class="breadcrumb">
					{{breadcrumbProduk(null,';  <span class="divider">/</span> ',';', true, $kategoridetail)}}	
				</ul>
			@else
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
					</li>
				</ul>
			@endif
				
				<div class="row">        
					<!-- Sidebar Start-->
					<aside class="span3">
						<!-- Category-->  
						<div class="sidewidt">
							<h2 class="heading2"><span>Categories</span></h2>
							<ul class="nav nav-list categories">
							{{--generateKategori($kategori,'<li>;</li>','',';',true)--}}
							@foreach($kategori as $key=>$kat )
								@if($kat->parent==0)
									<li>
										<a href="{{slugKategori($kat)}}">{{$kat->nama}}</a>
										<ul>
										@foreach($kategori as $key=>$kat2 )
											@if($kat2->parent==$kat->id)
												<li>
													<a href="{{slugKategori($kat2)}}">{{$kat2->nama}}</a>
												</li>
											@endif
										@endforeach
										</ul>
									</li>
								@endif
							@endforeach
							</ul>
						</div>
						<!--  Best Seller --> 
						@if(count($bestseller) > 0) 
						<div class="sidewidt">
							<h2 class="heading2"><span>Best Seller</span></h2>
							<ul class="bestseller">

							@foreach ($bestseller as $item)
								<li>
									<img width="50" height="50" src="{{URL::to(getPrefixDomain().'/produk/thumb/'.$item->gambar1)}}" alt="product" title="product">
									<a class="productname" href="{{slugProduk($item)}}"> {{$item->nama}}</a>
									<!-- <span class="procategory">Women Accessories</span> -->
									<span class="price">{{jadiRupiah($item->hargaJual)}}</span>
								</li>
							@endforeach

							</ul>
						</div>
						@endif
						<!-- Latest Product -->  
						<div class="sidewidt">
							<h2 class="heading2"><span>Latest Products</span></h2>
							<ul class="bestseller">

							@foreach ($koleksi as $item)
								<li>
									<img width="50" height="50" src="{{URL::to(getPrefixDomain().'/koleksi/thumb/'.$item->gambar)}}" alt="product" title="product">
									<a class="productname" href="{{slugProduk($item)}}"> {{$item->nama}}</a>
									<!-- <span class="procategory">Deskripsi</span> -->
									<span class="price">&nbsp;</span>
								</li>
							@endforeach

							</ul>
						</div>
						<!--  Must have -->  
						<div class="sidewidt">
							<!-- <h2 class="heading2"><span>Banner</span></h2> -->
							<div class="flexslider" id="mainslider">
								<ul class="slides">

								@foreach(getBanner(1) as $item)
									<li><a href="{{URL::to($item->url)}}"><img src="{{URL::to(getPrefixDomain().'/galeri/'.$item->gambar)}}" /></a></li>
								@endforeach

								</ul>
							</div>
						</div>
					</aside>
					<!-- Sidebar End-->
					<!-- Category-->
					<div class="span9">          
						<!-- Category Products-->
						<section id="category">
							<div class="row">
								<div class="span9">
									<!-- Sorting-->
									<div class="sorting well">
										<form class=" form-inline pull-left">
											Show:
											<select id="show" data-rel="{{URL::current()}}">
												<option value="12" {{Input::get('show')==12?'selected="selected"':''}}>12</option>
												<option value="25" {{Input::get('show')==25?'selected="selected"':''}}>25</option>
											</select>
										</form>
										<div class="btn-group pull-right">
											<button class="btn" id="list"><i class="icon-th-list"></i></button>
											<button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
										</div>
									</div>
									<!-- Category-->
									<section id="categorygrid">
										<ul class="thumbnails grid">
										@foreach($produk as $myproduk)
											<li class="span3">
												<a class="prdocutname" href="product.html">{{$myproduk->nama}}</a>
												<div class="thumbnail">
													<!-- <span class="sale tooltip-test">Sale</span> -->
													<a href="{{slugProduk($myproduk)}}">{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('class="img1"'))}}</a>
													<div class="shortlinks">
														<a class="details" href="{{slugProduk($myproduk)}}">DETAILS</a>
													</div>
													<div class="pricetag">
														<span class="spiral"></span><a href="{{slugProduk($myproduk)}}" class="productcart">ADD TO CART</a>
														<div class="price">
															<div class="pricenew">{{jadiRupiah($myproduk->hargaJual)}}</div>
															@if($myproduk->hargaCoret != 0)
															<div class="priceold">{{jadiRupiah($myproduk->hargaCoret)}}</div>
															@endif
														</div>
													</div>
												</div>
											</li>
										@endforeach
										</ul>

										<ul class="thumbnails list row">
											@foreach($produk as $myproduk)
											<li>
												<div class="thumbnail">
													<div class="row">
														<div class="span3">
															<!-- <span class="offer tooltip-test" >Offer</span> -->
															<a href="{{slugProduk($myproduk)}}">{{HTML::image(getPrefixDomain().'/produk/'.$myproduk->gambar1, $myproduk->nama, array('class="img1"'))}}</a>
														</div>
														<div class="span6">
															<a class="prdocutname" href="{{slugProduk($myproduk)}}">{{$myproduk->nama}}</a>
															<div class="productdiscrption"> {{$myproduk->deskripsi}}</div>
															<div class="pricetag">
																<span class="spiral"></span><a href="{{slugProduk($myproduk)}}" class="productcart">ADD TO CART</a>
																<div class="price">
																	<div class="pricenew">{{jadiRupiah($myproduk->hargaJual)}}</div>
																	<div class="priceold">{{jadiRupiah($myproduk->hargaCoret)}}</div>
																</div>
															</div>
															<div class="shortlinks">
																<a class="details" href="{{slugProduk($myproduk)}}">DETAILS</a>
															</div>
														</div>
													</div>
												</div>
											</li>
											@endforeach
										</ul>
										<div class="pagination pull-right">
											<ul>
												{{$produk->links()}}
											</ul>
										</div>
									</section>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>