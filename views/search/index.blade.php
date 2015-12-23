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
						<!-- Category-->    
						<div class="sidewidt">
							<h2 class="heading2"><span>Categories</span></h2>
							<ul class="nav nav-list categories">
							@foreach(list_category() as $key=>$kat )
								@if($kat->parent==0)
								<li>
									<a href="{{category_url($kat)}}">{{$kat->nama}}</a>
									<ul>
									@foreach(list_category() as $key=>$kat2 )
										@if($kat2->parent==$kat->id)
										<li>
											<a href="{{category_url($kat2)}}">{{$kat2->nama}}</a>
										</li>
										@endif
									@endforeach
									</ul>
								</li>
								@endif
							@endforeach
							</ul>
						</div>
						 <!-- Other-->
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
								<ul>
									{{$hasilpro->links()}}
								</ul>
							</div>
						</div>
					</div>

					@else
					<li>Hasil tidak ditemukan</li>
					@endif
				</div>
			</div>
		</section>
	</div>