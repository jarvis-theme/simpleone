	<section class="slider">
		<div class="container">
			<div class="flexslider" id="mainslider">
				<ul class="slides">
				@foreach(slideshow() as $val)
					<li>
						@if(!empty($val->url))
						<a href="{{filter_link_url($val->url)}}" target="_blank">
						@else
						<a href="#">
						@endif
							<img src="{{slide_image_url($val->gambar)}}" alt="{{$val->title}}" />
						</a>
					</li>
				@endforeach	
				</ul>
			</div>
		</div>
	</section>

	<section class="container otherddetails">
		@foreach(horizontal_banner() as $banner)
		<a href="{{URL::to($banner->url)}}">
			<img class="horizontal_banner" width="1180" src="{{banner_image_url($banner->gambar)}}" alt="Info Promo" />
		</a>
		@endforeach
	</section>