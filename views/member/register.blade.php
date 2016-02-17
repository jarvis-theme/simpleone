	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb -->
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">Register Account</li>
				</ul>
				<div class="row">
					<!-- Register Account-->
					<div class="span9">
						<h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
						{{Form::open(array('url'=>'member','method'=>'post','class'=>'form-horizontal'))}}
							<h3 class="heading3"> Personal Details</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Nama:</label>
										<div class="controls">
											<input type="text" name="nama" value="{{Input::old('nama')}}" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Email:</label>
										<div class="controls">
											<input type="text" name="email" value="{{Input::old('email')}}" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Telepon:</label>
										<div class="controls">
											<input type="text" name="telp" value="{{Input::old('telp')}}" class="input-xlarge" required>
										</div>
									</div>
								</fieldset>
							</div>
							<h3 class="heading3">Informasi Shipping</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label class="control-label">Alamat:</label>
										<div class="controls">
											<textarea class="input-xlarge" name="alamat" required>{{Input::old("alamat")}}</textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Kode Pos:</label>
										<div class="controls">
											<input type="text" name="kodepos" value="{{Input::old('kodepos')}}" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Negara:
										</label>
										<div class="controls">
											{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara,Input::old('negara'),array('required', "id"=>"negara", "data-rel"=>"chosen", "class"=>"span3"))}}
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Provinsi:
										</label>
										<div class="controls">
											{{Form::select('provinsi',array('' => '-- Pilih Provinsi --'), Input::old("provinsi"),array('required', "id"=>"provinsi", "data-rel"=>"chosen", "class"=>"span3"))}}
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Kota:
										</label>
										<div class="controls">
											{{Form::select('kota',array('' => '-- Pilih Kota --'), Input::old("kota"), array('required'=>'','id'=>'kota', 'class'=>'span3'))}}
										</div>
									</div>
								</fieldset>
							</div>
							<h3 class="heading3"> Password & Security</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Password:</label>
										<div class="controls">
											<input type="password" name="password" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Ulangi Password:</label>
										<div class="controls">
											<input type="password" name="password_confirmation" class="input-xlarge" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Kode Captcha:</label>
										<div class="controls">
											{{ HTML::image(Captcha::img(), 'Captcha image') }}<br><br>
											<input type="text" name="captcha" placeholder="Masukan kode yang tertera di atas" class="input-xlarge" required>
										</div>
									</div>
								</fieldset>
							</div>
							
							<div class="control-group">
								<label class="control-label rules"></label>
								<label class="checkbox inline">
									<input type="checkbox" name="readme" value="1" checked >
								</label>
								I have read and agree to the <a href="{{URL::to('service')}}" >Privacy Policy</a>
								&nbsp;
								<input type="Submit" class="btn btn-orange" value="Continue">
							</div>
						{{Form::close()}}
						<div class="clearfix"></div>
						<br>
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