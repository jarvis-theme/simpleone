	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->  
			@if(!empty($kategoridetail))
				<ul class="breadcrumb">
					{{breadcrumbProduk(@$produk,'  <span class="divider">/</span> ;',';', true, @$category, @$collection)}}	
				</ul>
			@else
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">
						<a href="{{URL::to('produk')}}">Produk</a>
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
							@foreach(list_category() as $key=>$kat )
								@if($kat->parent==0)
									<li>
										<a href="{{category_url($kat)}}">{{short_description($kat->nama, 30)}}</a>
										@foreach(list_category() as $key=>$kat2 )
											@if($kat2->parent == $kat->id)
											<ul>
												<li>
													<a href="{{category_url($kat2)}}">{{$kat2->nama}}</a>
												</li>
											</ul>
											@endif
										@endforeach
									</li>
								@endif
							@endforeach
							</ul>
						</div>
						<!--  Best Seller --> 
						@if(count(best_seller()) > 0) 
						<div class="sidewidt">
							<h2 class="heading2"><span>Best Seller</span></h2>
							<ul class="bestseller">
								@foreach (best_seller() as $item)
								<li>
									<img width="50" height="50" src="{{product_image_url($item->gambar1,'thumb')}}" alt="{{$item->nama}}" title="product">
									<a class="productname" href="{{product_url($item)}}"> {{$item->nama}}</a>
									<span class="price">{{price($item->hargaJual)}}</span>
								</li>
								@endforeach
							</ul>
						</div>
						@endif
						<!-- Latest Product -->  
						<div class="sidewidt">
							<h2 class="heading2"><span>Latest Products</span></h2>
							<ul class="bestseller">
								@foreach(list_koleksi() as $item)
								<li>
								    {{ HTML::image(koleksi_image_url($item->gambar,'thumb'), $item->nama, array('width' => '50','height'=>'50'))}}
									<a class="productname" href="{{koleksi_url($item)}}"> {{$item->nama}}</a>
									<!-- <span class="procategory">Deskripsi</span> -->
									<span class="price"> </span>
								</li>
								@endforeach
							</ul>
						</div>
						<!--  Must have -->  
						<div class="sidewidt">
							<h2 class="heading2"><span>Must have</span></h2>
							<div class="flexslider" id="mainslider">
								<ul class="slides">
								@foreach(vertical_banner() as $item)
									<li>
										<a href="{{url($item->url)}}">
											<img src="{{url(banner_image_url($item->gambar))}}" alt="Info Promo" />
										</a>
									</li>
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
										{{-- */ $i=1 /* --}}
										@foreach(list_product(Input::get('show'), @$category, @$collection) as $myproduk)
											<li class="span3">
												<a class="prdocutname" href="{{product_url($myproduk)}}">
													{{short_description($myproduk->nama, 30)}}
												</a>
												<div class="thumbnail">
													@if(is_terlaris($myproduk))
														<span class="hot tooltip-test">HOT</span>
													@elseif(is_produkbaru($myproduk))
														<span class="new tooltip-test">NEW</span>
													@endif
													<a href="{{product_url($myproduk)}}">{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array("class"=>"img1"))}}</a>
													<div class="shortlinks">
														<a class="details" href="{{product_url($myproduk)}}">DETAILS</a>
													</div>
													<div class="pricetag">
														<span class="spiral"></span><a href="{{product_url($myproduk)}}" class="productcart">Lihat Produk</a>
														<div class="price">
															<div class="pricenew">{{price($myproduk->hargaJual)}}</div>
															@if($myproduk->hargaCoret != 0)
															<div class="priceold">{{price($myproduk->hargaCoret)}}</div>
															@endif
														</div>
													</div>
												</div>
											</li>
											@if($i%3==0)
											<div class="hidden-phone clearfix"></div>
											@endif
											{{-- */ $i++ /* --}}
										@endforeach
										</ul>

										<ul class="thumbnails list row">
											@foreach(list_product(Input::get('show'), @$category, @$collection) as $myproduk)
											<li>
												<div class="thumbnail">
													<div class="row">
														<div class="span3">
															@if(is_terlaris($myproduk))
																<span class="hot tooltip-test">HOT</span>
															@elseif(is_produkbaru($myproduk))
																<span class="new tooltip-test">NEW</span>
															@endif
															<a href="{{product_url($myproduk)}}">{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array("class"=>"img1"))}}</a>
														</div>
														<div class="span6">
															<a class="prdocutname" href="{{product_url($myproduk)}}">{{$myproduk->nama}}</a>
															<div class="productdiscrption"> {{$myproduk->deskripsi}}</div>
															<div class="pricetag">
																<span class="spiral"></span><a href="{{product_url($myproduk)}}" class="productcart">Lihat Produk</a>
																<div class="price">
																	<div class="pricenew">{{price($myproduk->hargaJual)}}</div>
																	@if($myproduk->hargaCoret != 0)
																	<div class="priceold">{{price($myproduk->hargaCoret)}}</div>
																	@endif
																</div>
															</div>
															<div class="shortlinks">
																<a class="details" href="{{product_url($myproduk)}}">DETAILS</a>
															</div>
														</div>
													</div>
												</div>
											</li>
											@endforeach
										</ul>
										<div class="pagination pull-right">
											<ul>
												{{list_product(Input::get('show'), @$category, @$collection)->links()}}
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