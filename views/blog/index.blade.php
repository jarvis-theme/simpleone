	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->   
				<div class="row">        
					<!-- Sidebar Start-->
					<aside  class="span3">
						<div class="sidewidt">
							<h2 class="heading2"><span>Blog Categories</span></h2>
							<ul class="nav nav-list categories">
							@foreach($categoryList as $key=>$value)
								<li><a href="{{URL::to('blog/category/'.generateSlug($value))}}">{{$value->nama}}</a></li>
							@endforeach						
							</ul>
						</div>
						<div class="sidewidt">
							<h2 class="heading2"><span>Must have</span></h2>
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
					<div class="span9">
						<!-- Blog start-->   
						<section id="latestblog">    
						@foreach($data as $key=>$value)     
							<div class="blogdetail">
								<h2 class="heading2"><a href="{{slugBlog($value)}}">{{$value->judul}}</a></h2>
								<div class="blogicons">
									<div class="pull-left">
										<span class="mr10"><i class="icon-calendar"></i> {{waktuTgl($value->updated_at)}} </span>
										<span class="mr10">
											<a href="{{URL::to('blog/category/'.Str::slug($value->kategori->nama))}}"><i class="icon-tag"></i> {{$value->kategori->nama}}</a>
										</span>
									</div>
								</div>
								<ul class="margin-none">
									<li class="listblcok">
										<div class="caption">
											<p> {{blogIndex($value->isi,330)}}</p>
											<a style="font-size: small;font-weight: 600;color: #312B2B;" href="{{slugBlog($value)}}"><br>Baca Selengkapnya &rarr;</a>
										</div>
									</li>
								</ul>
							</div>
						@endforeach
							<!-- Paging-->
							<div class="row">
								<div class="pagination pull-right">
									<ul>
										{{$data->links()}}
									</ul>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>