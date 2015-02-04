	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">{{$data->judul}}</li>
				</ul>     
		 
				<!-- features-->      
				<h1 class="heading1"><span class="maintext">{{$data->judul}}</span><span class="subtext"></span></h1>
				<!-- Typo--> 
				<section id="typography">      
					<!-- Headings & Paragraph Copy -->      
					<p> {{$data->isi}} </p><br>
				</section>
			</div>
		</section>
	</div>