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
						@foreach (list_testimonial() as $key=>$items) 
						<blockquote >
							<p>{{$items->isi}}</p>
							<small> {{$items->nama}}</small>
						</blockquote>
						<br>
						@endforeach

						<div class="pagination pull-right">
							<ul>{{ list_testimonial()->links() }}</ul>
						</div>
					</div>
					<div class="span3">
						<form action="{{URL::to('testimoni')}}" id="ajax-contact-form" class="contactForm testimo" method="post">
							<div id="note" class="largefont"><strong>Buat Testimonial</strong></div><br>
							<div class="control-group">
								<label  class="control-label">Nama Pelanggan:</label>
								<div class="controls">
									<input type="text" name="nama" placeholder="Nama" value="{{Input::old('email')}}" class="span3" required>
								</div>
							</div>
							<div class="control-group">
								<label  class="control-label">Testimonial:</label>
								<div class="controls">
									<textarea name="testimonial" class="span3" placeholder="Testimonial anda" rows="10" cols="20"></textarea>
								</div>
							</div>
							<input type="submit" name="submit" class="btn btn-orange pull-right" value="Kirim Testimonial">
						</form>
					</div>
				</section>
			</div>
		</section>
	</div>