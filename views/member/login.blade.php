	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Login</li>
				</ul>
				<!-- Account Login-->
				<div class="row">  
					<div class="span9">
						<h1 class="heading1"><span class="maintext">Login</span><span class="subtext">First Login here to View All your account information</span></h1>
						<section class="newcustomer">
							<h2 class="heading2">New Customer </h2>
							<div class="loginbox">
								<h4 class="heading4"> Register Account</h4>
								<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
								<br><br>
								<a href="{{URL::to('member/create')}}" class="btn btn-orange">Continue</a>
							</div>
						</section>
						<section class="returncustomer">
							<h2 class="heading2">Returning Customer </h2>
							<div class="loginbox">
								<h4 class="heading4">I am a returning customer</h4>
								{{Form::open(array('url'=>'member/login','method'=>'post','class'=>'form-vertical'))}}
									<fieldset>
										<div class="control-group">
											<label  class="control-label">E-Mail Address:</label>
											<div class="controls">
												<input type="text" name='email' value='{{Input::old("email")}}'  class="span3" required>
											</div>
										</div>
										<div class="control-group">
											<label  class="control-label">Password:</label>
											<div class="controls">
												<input type="password" type="password" name="password" class="span3" required>
											</div>
										</div>
										<a class="" href="{{URL::to('member/forget-password')}}">Forgotten Password</a>
										<br><br>
										<button type="submit" class="btn btn-orange">Login</button>
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
								<li>
									<a href="{{URL::to('member/profile/edit')}}"> My Account</a>
								</li>
								<li>
									<a href="{{URL::to('member')}}">Order History</a>
								</li>
								<li>
									<a href="{{URL::to('konfirmasiorder')}}">Konfirmasi Order</a>
								</li>
							</ul>
						</div>
					</aside>
					<!-- Sidebar End-->
				</div>
			</div>
		</section>
	</div>