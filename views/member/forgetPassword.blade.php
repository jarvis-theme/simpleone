	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Forget Password</li>
				</ul>
				<!-- Account Login-->
				<div class="row">  
					<div class="span9">
						<h1 class="heading1"><span class="maintext">Forget Password</span><span class="subtext"></span></h1>
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
							<h2 class="heading2">Forget Password </h2>
							<div class="loginbox">
								{{Form::open(array('url'=>'member/forgetpassword','method'=>'post','class'=>'form-vertical'))}}
									<fieldset>
										<div class="control-group">
											<label  class="control-label">Email Address:</label>
											<div class="controls">
												<input type="text" name="recoveryEmail" value="{{Input::old('email')}}" class="span3" required>
											</div>
										</div>
										<a href="{{URL::to('member')}}">Login</a>
										<br><br>
										<button type="submit" class="btn btn-orange">Reset Password</button>
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
									<a href="{{URL::to('member')}}"> My Account</a>
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