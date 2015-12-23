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
							@foreach(list_blog_category() as $key=>$value)
								<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
							@endforeach 
							</ul>
						</div>
						<div class="sidewidt">
							<h2 class="heading2"><span><!-- Must have --></span></h2>
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
							<div class="blogdetail">
								<h2 class="heading2"><span>{{$detailblog->judul}}</span></h2>
								<div class="blogicons">
									<div class="pull-left">
										<span class="mr10"><i class="icon-calendar"></i> {{waktuTgl($detailblog->updated_at)}} </span>
										<span class="mr10">
											<a href="{{blog_category_url($detailblog->kategori)}}"><i class="icon-tag"></i> {{$detailblog->kategori->nama}}</a>
										</span>
									</div>
								</div>
								<ul class="margin-none">
									<li class="listblcok">
										<div class="caption">
											<p> {{$detailblog->isi}}</p>
											<br>
										</div>
									</li>
								</ul>

								<!-- Paging-->
								<div class="row">
									<div class="pagination pull-right">
										<ul>
										@if(isset($prev))
											<li><a href="{{$prev->slug}}">Prev</a></li>
										@endif
										@if(isset($next))
											<li><a href="{{$next->slug}}">Next</a></li>
										@endif
										</ul>
									</div>
								</div>
								<hr>
								<!-- Leave Comment-->
								<section class="leavecomment">
									<h2 class="heading2"><span>Leave a comment</span></h2>
									{{$fbscript}}
                                	{{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}} 
								</section>
							</div>
						</section>
					</div>
				</div>
			</div>
		</section>
	</div>