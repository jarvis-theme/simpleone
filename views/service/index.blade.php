	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb  -->
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Syarat & Ketentuan</li>
				</ul>
				<!-- features-->
				<h1 class="heading1"><span class="maintext">Syarat & Ketentuan</span><span class="subtext">Layanan Pelanggan, Kebijakan Layanan dan Kebijakan Pengembalian</span></h1>
				<!-- Typo--> 
				<section id="typography">
					<!-- Headings & Paragraph Copy -->
					<h2 class="heading2">1. Kebijakan Layanan</h2>
					<p> {{$service->privacy}}</p>
					<br>
					<h2 class="heading2">2. Kebijakan Pengembalian</h2>
					<p> {{$service->refund}} </p>
					<br>
					<h2 class="heading2">3. Kebijakan Privasi</h2>
					<p> {{$service->tos}} </p>
				</section>
			</div>
		</section>
	</div>