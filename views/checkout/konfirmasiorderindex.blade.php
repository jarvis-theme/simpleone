	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Konfirmasi Order</li>
				</ul>
				 <!-- Account Login-->
				<div class="row">
					<div class="span9">
						<h1 class="heading1"><span class="maintext">Order Confirmation</span><span class="subtext"></span></h1>
						<section class="newcustomer">
							<h2 class="heading2"> </h2>
							<div class="loginbox">
								<h4 class="heading4"> Login Account</h4>
								<p>By create account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
								<br><br>
								<a href="{{URL::to('member')}}" class="btn btn-orange">Continue</a>
							</div>
						</section>
						<section class="returncustomer">
							<h2 class="heading2">Konfirmasi Order </h2>
							<div class="loginbox">
								{{Form::open(array('url'=>'konfirmasiorder','method'=>'post','class'=>'form-vertical'))}}
									<fieldset>
										<div class="control-group">
											<label  class="control-label"></label>
											<div class="controls">
												<input class="span3" type="text" placeholder="Kode Order" name="kodeorder" required >
											</div>
										</div>
										<br><br>
										<button type="submit" class="btn btn-orange">Cari Kode</button>
									</fieldset>
								{{Form::close()}}
							</div>
						</section>
					</div>
					
					<!-- Sidebar Start-->
					<aside class="span3">
						<div class="sidewidt">
							<h2 class="heading2"><span>Account</span></h2>
							<ul class="nav nav-list categories">
								<li><a href="{{URL::to('member/profile/edit')}}"> My Account</a></li>
								<li><a href="{{URL::to('member')}}">Order History</a></li>
								<li><a href="{{URL::to('konfirmasiorder')}}">Konfirmasi Order</a></li>
							</ul>
						</div>
					</aside>
					<!-- Sidebar End-->
				</div>
			</div>
		</section>
	</div>