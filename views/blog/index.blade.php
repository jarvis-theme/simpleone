	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->
				<div class="row">
					<!-- Sidebar Start-->
					<aside  class="span3">
						@if(count(list_blog_category()) > 0)
						<div class="sidewidt">
							<h2 class="heading2"><span>Blog Categories</span></h2>
							<ul class="nav nav-list categories">
								@foreach(list_blog_category() as $key=>$value)
								<li><a href="{{url(blog_category_url($value))}}">{{$value->nama}}</a></li>
								@endforeach
							</ul>
						</div>
						@endif
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
					<div class="span9">
						<!-- Blog start-->
						<section id="latestblog">
							@foreach(list_blog(null,@$blog_category) as $key=>$value)
							<div class="blogdetail">
								<h2 class="heading2"><a href="{{blog_url($value)}}">{{$value->judul}}</a></h2>
								<div class="blogicons">
									<div class="pull-left">
										<span class="mr10"><i class="icon-calendar"></i> {{waktuTgl($value->created_at)}} </span>
										<span class="mr10">
											<a href="{{blog_category_url($value->kategori)}}"><i class="icon-tag"></i> {{$value->kategori->nama}}</a>
										</span>
									</div>
								</div>
								<ul class="margin-none">
									<li class="listblcok">
										<div class="caption">
											<p> {{blogIndex($value->isi,330)}}</p>
											<a class="readmore" href="{{blog_url($value)}}"><br>Baca Selengkapnya →</a>
										</div>
									</li>
								</ul>
							</div>
							@endforeach
							<!-- Paging-->
							<div class="row">
								<div class="pagination pull-right">
									<ul>
										{{list_blog(null,@$blog_category)->links()}}
									</ul>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>