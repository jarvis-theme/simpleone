	<div id="maincontainer">
		<section id="product">
			<div class="container">
				<!--  breadcrumb --> 
				<ul class="breadcrumb">
					<li>
						<a href="{{URL::to('/')}}">Home</a>
						<span class="divider">/</span>
					</li>
					<li class="active">My Account</li>
				</ul>
				<div class="row">        
					<!-- Register Account-->
					<div class="span9">
						<h1 class="heading1"><span class="maintext">My Account</span><span class="subtext"></span></h1>
						{{Form::open(array('url'=>'member/update','method'=>'put','class'=>'form-horizontal'))}}
							<h3 class="heading3"> Personal Details</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Nama:</label>
										<div class="controls">
											<input type="text" name="nama" value='{{$user->nama}}' required class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Email:</label>
										<div class="controls">
											<input type="text" name='email' value='{{$user->email}}' required class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label"><span class="red">*</span> Telepon:</label>
										<div class="controls">
											<input type="text" name='telp' value='{{$user->telp}}' required class="input-xlarge">
										</div>
									</div>
								</fieldset>
							</div>
							<h3 class="heading3">Informasi Shipping</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label class="control-label"> Alamat:</label>
										<div class="controls">
											<textarea class="input-xlarge" name='alamat' required>{{$user->alamat}}</textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">
											<span class="red">*</span>Kode Pos:</label>
										<div class="controls">
											<input type="text" name='kodepos' value='{{$user->kodepos}}' class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Negara:</label>
										<div class="controls">
											{{Form::select('negara',array('' => '-- Pilih Negara --') + $negara , ($user ? $user->negara :(Input::old("negara")? Input::old("negara") :"")), array('required'=>'', 'id'=>'negara', 'class'=>'span3'))}}
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Provinsi:</label>
										<div class="controls">
											{{Form::select('provinsi',array('' => '-- Pilih Provinsi --') + $provinsi , ($user ? $user->provinsi :(Input::old("provinsi")? Input::old("provinsi") :"")),array('required'=>'','id'=>'provinsi', 'class'=>'span3'))}}
										</div>
									</div>
									<div class="control-group">
										<label for="select01" class="control-label">
											<span class="red">*</span>Kota:</label>
										<div class="controls">
											{{Form::select('kota',array('' => '-- Pilih Kota --') + $kota , ($user ? $user->kota :(Input::old("kota")? Input::old("kota") :"")),array('required'=>'','id'=>'kota', 'class'=>'span3'))}}
										</div>
									</div>
								</fieldset>
							</div>
							<h3 class="heading3"> Password</h3>
							<div class="registerbox">
								<fieldset>
									<div class="control-group">
										<label  class="control-label"><span class="red">*</span> Password Lama:</label>
										<div class="controls">
											<input type="password" name="oldpassword" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label  class="control-label"><span class="red">*</span> Password Baru:</label>
										<div class="controls">
											<input type="password" name="password" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label  class="control-label"><span class="red">*</span> Password Confirm:</label>
										<div class="controls">
											<input type="password" name="password_confirmation"  class="input-xlarge">
										</div>
									</div>
								</fieldset>
							</div>
							
							<div class="form-actions">
								<input type="Submit" class="btn btn-orange pull-right" value="Update">
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