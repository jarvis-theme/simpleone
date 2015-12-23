	<section class="slider">
		<div class="container">
			<div class="flexslider" id="mainslider">
				<ul class="slides">
				@foreach(slideshow() as $val)
					<li>
						@if($val->text=='')	
						<a href="#">
						@else
						<a href="{{filter_link_url($val->text)}}" target="_blank">
						@endif	
							<img src="{{slide_image_url($val->gambar)}}" alt="Slideshow" />
						</a>
					</li>
				@endforeach	
				</ul>
			</div>
		</div>
	</section>

	<section class="container otherddetails">
	@foreach(horizontal_banner() as $banner)
    <a href="{{URL::to($banner->url)}}"><img width="1180" src="{{banner_image_url($banner->gambar)}}" class="horizontal_banner" /></a>
    @endforeach
	</section>