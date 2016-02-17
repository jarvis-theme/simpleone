	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Search</li>
				</ul>
				<div class="row">
					<!-- Sidebar Start-->
					<aside  class="span3">
						<div class="sidewidt powerup">
							{{pluginSidePowerup()}}
						</div>
						@if(count(list_category()) > 0)
						<!-- Category-->
						<div class="sidewidt">
							<h2 class="heading2"><span>Categories</span></h2>
							<ul class="nav nav-list categories">
								@foreach(list_category() as $key=>$kat )
									@if($kat->parent==0)
										<li>
											<a href="{{category_url($kat)}}">{{short_description($kat->nama, 30)}}</a>
											@if($kat->anak->count() > 0)
											<ul>
												@foreach(list_category() as $key=>$submenu)
												@if($submenu->parent == $kat->id)
													<li>
														<a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
														@if($submenu->anak->count() > 0)
														<div>
															<ul>
															@foreach($submenu->anak as $submenu2)
																@if($submenu2->parent == $submenu->id)
																<li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
																@endif
															@endforeach
															</ul>
														</div>
														@endif
													</li>
												@endif
												@endforeach
											</ul>
											@endif
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						@endif
						@if(count(list_koleksi()) > 0)
						<!-- Latest Product -->
						<div class="sidewidt">
							<h2 class="heading2"><span>Collection</span></h2>
							<ul class="bestseller">
								@foreach(list_koleksi() as $item)
								<li>
									{{ HTML::image(koleksi_image_url($item->gambar,'thumb'), $item->nama, array('width' => '50','height'=>'50'))}}
									<a class="productname" href="{{koleksi_url($item)}}"> {{$item->nama}}</a>
									<span class="price"> </span>
								</li>
								@endforeach
							</ul>
						</div>
						@endif
						 <!-- Other-->
						<div class="sidewidt">
							<h2 class="heading2"><!-- <span>Must have</span> --></h2>
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

					@if($jumlahCari!=0)
					 <!-- Blog listing-->
					<div class="span9 bloggrid">
						<h1 class="heading1"><span class="maintext">Search Result</span><span class="subtext"></span></h1>
						<ul class="thumbnails">
						{{-- */ $i=1 /* --}}
						@foreach($hasilpro as $myproduk)
							<li class="span3">
								<div class="thumbnail">
									<a href="{{product_image_url($myproduk->gambar1,'medium')}}" class="fancyboxpopup">
										{{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama)}}<span class="viewfancypopup">&nbsp;</span>
									</a>
									<div class="caption">
										<a href="{{product_url($myproduk)}}" class="bloggridtitle">{{short_description($myproduk->nama,30)}}</a>
										<div class="author">Harga : <a href="#"> {{price($myproduk->hargaJual)}}</a>
										</div>
										<div>
											<!-- <span class="mr10"> <a href="#"><i class="icon-tag"></i> css3, html5, responsive</a> </span> -->
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
						<!-- Paging-->
						<div class="row">
							<div class="pagination pull-right">
								<ul>{{ $hasilpro->links() }}</ul>
							</div>
						</div>
					</div>

					@else
					<li>Hasil pencarian tidak ditemukan.</li>
					@endif
				</div>
			</div>
		</section>
	</div>