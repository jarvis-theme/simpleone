	<section class="slider">
		<div class="container">
			<div class="flexslider" id="mainslider">
				<ul class="slides">
				@foreach ($slideshow as $val)	
					<li>
						<img src="{{URL::to(getPrefixDomain().'/galeri/'.$val->gambar.'?'.Time())}}" alt="{{$val->gambar}}" />
						@if($val->text)	
						<div class="title">
							<p>{{ $val->text }}</p>
						</div> 
						@endif	
					</li>
				@endforeach	
				</ul>
			</div>
		</div>
	</section>

	<section class="container otherddetails">
	@foreach(getBanner(2) as $banner)
		<a href="{{URL::to($banner->url)}}"><img width="1180" src="{{URL::to(getPrefixDomain().'/galeri/'.$banner->gambar)}}"/></a>
	@endforeach
	</section>