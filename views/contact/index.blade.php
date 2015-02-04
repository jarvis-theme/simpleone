@if(Session::has('msg2'))
<div class="success" id='message' style='display:none'>
	Terima kasih, pesan anda sudah terkirim.
</div>
@endif

@if(Session::has('msg3'))
<div class="success" id='message' style='display:none'>
	Maaf, pesan anda belum terkirim.
</div>
@endif

@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br><br>
	@foreach($errors->all() as $message)
		-{{ $message }}<br>
	@endforeach
	</ul>
</div>
@endif


	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Contact</li>
				</ul>  
				<!-- Contact Us-->
				<h1 class="heading1"><span class="maintext">Contact</span><span class="subtext"> Contact Us for more</span></h1>
				<div class="row">
					<div class="span9">
						<h3>Map Location</h3>
						@if($kontak->lat=='0' || $kontak->lat=='0')
							<div class="span8"><iframe style="width:100%;padding-bottom: 30px;"  height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->lat.','.$kontak->lng }}&amp;aq=&amp;sll={{ $kontak->lat.','.$kontak->lng }}&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;t=m&amp;z=14&amp;output=embed"></iframe></div><br />
						@else
							<div class="span8"><iframe style="width:100%;padding-bottom: 30px;" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{ $kontak->alamat }}&amp;aq=0&amp;oq=gegerkalong+hil&amp;sspn=0.006849,0.009892&amp;ie=UTF8&amp;hq=&amp;hnear={{ $kontak->alamat }}&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe></div><br />
						@endif
						<div class="span8">
							<form class="form-horizontal contactform"  method="post">
								<fieldset>
									<div class="control-group">
										<label for="name" class="control-label">Nama </label>
										<div class="controls">
											<input type="text"  class="required" id="name" value="" name='namaKontak'>
										</div>
									</div>
									<div class="control-group">
										<label for="email" class="control-label">Email</label>
										<div class="controls">
											<input type="email"  class="required email" id="email" value="" name="emailKontak">
										</div>
									</div>
									<div class="control-group">
										<label for="message" class="control-label">Pesan</label>
										<div class="controls">
											<textarea  class="required" rows="6" cols="40" id="message" name="message"></textarea>
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
									<br>
									Phone 1: {{$kontak->telepon}}<br>
									@if($kontak->hp)
									Phone 2: {{$kontak->hp}}<br>
									@endif
									Email: <a href="mailto:{{$kontak->email}}">{{$kontak->email}}</a><br>
								</p>
							</div>
						</aside>
					</div>
					<!-- Sidebar End-->					
				</div>
			</div>
		</section>
	</div>