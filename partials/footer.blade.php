	<!-- Footer -->
	<footer id="footer">
		<section class="footersocial">
			<div class="container">
				<div class="row">
					<div class="span3 aboutus">
						<h2>About Us </h2>
						<p> {{shortDescription(about_us()->isi,300)}} </p>
					</div>
					<div class="span3 contact">
						<h2>Contact Us </h2>
						<ul>
							@if($kontak->telepon)
							<li class="phone"> {{$kontak->telepon}}</li>
							@endif
							@if($kontak->hp)
							<li class="mobile"> {{$kontak->hp}}</li>
							@endif
							<li class="email"> <a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a></li>
							@if($kontak->bb)
							<img class="bbm" src="{{URL::to('img/bbm.png')}}" alt="BBM"> {{$kontak->bb}}
							@endif
						</ul>
					</div>
					<div class="span3 twitter">
						@if(count(list_blog()) > 0)
						<h2>Blog</h2>
						<ul>
							@foreach (list_blog(3) as $items)
							<li><a href="{{blog_url($items)}}">{{$items->judul}}</a><br /><small>diposting pada {{waktuTgl($items->created_at)}}</small></li>
							<br>
							@endforeach
						</ul>
						@endif
					</div>
					<div class="span3 facebook">
						<h2>Facebook </h2>
						{{ facebookWidget($kontak) }}
					</div>
				</div>
			</div>
		</section>
		<section class="footerlinks">
			<div class="container">
				<div class="info">
					<ul>
					@foreach(all_menu() as $key=>$group)
						@if($key==1)
							@foreach($group->link as $key=>$link)
							<li><a href="{{menu_url($link)}}">{{$link->nama}}</a></li>
							@endforeach
						@endif
					@endforeach
					</ul>
				</div>
				<div id="footersocial">
				@if($kontak->fb)
					<a href="{{$kontak->fb}}" title="Facebook" class="facebook">Facebook</a>
				@endif
				@if($kontak->tw)
					<a href="{{$kontak->tw}}" title="Twitter" class="twitter">Twitter</a>
				@endif
				@if($kontak->gp)
					<a href="{{$kontak->gp}}" title="Googleplus" class="googleplus">Googleplus</a>
				@endif
				</div>
			</div>
		</section>
		<section class="copyrightbottom">
			<div class="container">
				<div class="row">
					<div class="span6"> All Rights Reserved. Powered by <a class="nodecor" href="{{URL::to('http://jarvis-store.com')}}">Jarvis Store</a>.</div>
					<div class="span6 textright"> {{ Theme::place('title') }} @ {{date('Y')}} </div>
				</div>
			</div>
		</section>
		<a id="gotop" href="#">Back to top</a>
	</footer>
	{{pluginPowerup()}} 