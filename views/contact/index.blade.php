	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Kontak</li>
				</ul>
				<!-- Contact Us-->
				<h1 class="heading1"><span class="maintext">Contact</span><span class="subtext"> Contact Us for more</span></h1>
				<div class="row">
					<div class="span9">
						<h3>Map Location</h3>
						@if($kontak->lat=='0' || $kontak->lng=='0')
							<div class="span8"><iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe></div><br />
						@else
							<div class="span8"><iframe class="maplocation" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{str_replace(' ','+',$kontak->alamat)}}&amp;aq=0&amp;oq={{str_replace(' ','+',$kontak->alamat)}}&amp;sspn={{ $kontak->lat.','.$kontak->lng }}&amp;ie=UTF8&amp;hq=&amp;hnear={{str_replace(' ','+',$kontak->alamat)}}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></div><br />
						@endif
						<div class="span8">
							<form class="form-horizontal contactform" method="post">
								<fieldset>
									<div class="control-group">
										<label for="name" class="control-label">Nama </label>
										<div class="controls">
											<input type="text" class="required" id="name" name="namaKontak">
										</div>
									</div>
									<div class="control-group">
										<label for="email" class="control-label">Email</label>
										<div class="controls">
											<input type="email" class="required email" id="email" name="emailKontak">
										</div>
									</div>
									<div class="control-group">
										<label for="message" class="control-label">Pesan</label>
										<div class="controls">
											<textarea  class="required" rows="6" cols="40" name="message"></textarea>
										</div>
									</div>
									<div class="form-actions">
										<input class="btn btn-orange" type="submit" value="Submit" id="submit_id">
										<input class="btn" type="reset" value="Reset">
									</div>
								</fieldset>
							</form>
						</div>
					</div>
					
					<!-- Sidebar Start-->
					<div class="span3">
						<aside>
							<div class="sidewidt">
								<h2 class="heading2"><span>Contact</span></h2>
								<p> {{$kontak->alamat}}
									<br><br>
									Phone 1: {{$kontak->telepon}}<br>
									@if($kontak->hp)
									Phone 2: {{$kontak->hp}}<br>
									@endif
									Email: <a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a><br>
									@if($kontak->bb)
									Pin BB: {{$kontak->bb}}<br>
									@endif
								</p>
							</div>
						</aside>
					</div>
					<!-- Sidebar End-->
				</div>
			</div>
		</section>
	</div>