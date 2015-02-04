@if(Session::has('msg'))
<div class="success" id='message' style='display:none'>
	<p>Terima kasih, testimonial anda sudah terkirim.</p>
</div>
@endif

@if($errors->all())
<div class="error" id='message' style='display:none'>
	Terjadi kesalahan dalam menyimpan data.<br>
	<ul>
	@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
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
					<li class="active">Testimonial</li>
				</ul>     
		 
				<!-- features-->      
				<h1 class="heading1"><span class="maintext">Testimonial</span><span class="subtext">Our Costumers</span></h1>
				<!-- Typo--> 
				<section id="typography">
					<!-- Headings & Paragraph Copy -->     
					<div class="span8"> 
					@foreach ($testimonial as $key=>$items)   
						<blockquote >
							<p>{{$items->isi}}</p>
							<small> {{$items->nama}}</small>
						</blockquote>
						<br>
					@endforeach

						<div class="pagination pull-right">
							<ul>
								{{$testimonial->links()}}
							</ul>
						</div>
					</div>
					<div class="span3">
						<form style="border-left: 1px solid #e5e5e5;padding-left: 20px;" action="{{URL::to('testimoni')}}" id="ajax-contact-form" class="contactForm" method="post">
							<div id="note" style="font-size: large;"><strong>Buat Testimonial</strong></div><br>
							<div class="control-group">
								<label  class="control-label">Nama Pelanggan:</label>
								<div class="controls">
									<input type="text" name='nama' placeholder="Nama" value='{{Input::old("email")}}' required  class="span3">
								</div>
							</div>
							<div class="control-group">
								<label  class="control-label">Testimonial:</label>
								<div class="controls">
									<textarea name="testimonial" class="span3" placeholder="Your Testimonial" rows="10" cols="20"></textarea>
								</div>
							</div>
							<input type="submit" style="float:right;" name="submit" class="btn btn-orange" value="Kirim Testimonial">
						</form>
					</div>
				</section>
			</div>
		</section>
	</div>