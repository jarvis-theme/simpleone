	<header>
		<div class="headerstrip">
			<div class="container">
				<div class="row">
					<div class="span12"> 
						@if( logo_image_url() )
						<a href="{{URL::to('/')}}" class="logo pull-left">
							{{HTML::image(logo_image_url(), 'Logo '.Theme::place('title'), array('style'=>'max-height:100%;width: 194px;'))}}
						</a> 
						@else
						<span class="logotext">
							<strong>
								 <a href="{{URL::to('/')}}" class="logo pull-left">{{ short_description(Theme::place('title'),16) }}</a>
							</strong>
						</span>
						@endif
						
						<!-- Top Nav Start -->
						<div class="pull-left">
							<div class="navbar" id="topnav">
								<div class="navbar-inner">
									<ul class="nav" >
										<li><a class="home active" href="{{URL::to('/')}}">Home</a></li>
									@if ( ! Sentry::check())
										<li><a href="{{URL::to('konfirmasiorder')}}" class="shoppingcart">Konfirmasi</a></li>
										<li class="login"><a href="{{URL::to('member/create')}}" class="myaccount">Register</a></li>
										<li ><a href="{{URL::to('member')}}" class="myaccount">Login</a></li>
									@else
										<li><a href="{{URL::to('konfirmasiorder')}}" class="shoppingcart">Konfirmasi</a></li>
										<li><a href="{{URL::to('member/profile/edit')}}" class="myaccount">My Account</a></li>
										<li class="myaccount"><a href="{{URL::to('logout')}}" class="myaccount">Logout</a></li>
									@endif
									</ul>
								</div>
							</div>
						</div>
						<!-- Top Nav End -->
						<div class="pull-right">
							<form class="form-search top-search" action="{{URL::to('search')}}" method="post">
								<input type="text" class="input-medium search-query" name="search" placeholder="Search Here…" required>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="headerdetails">
				<div class="pull-left">
					<ul class="nav language pull-left">
						<!-- <li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">US Doller <b class="caret"></b></a>
							<ul class="dropdown-menu currency">
								<li><a href="#">US Doller</a> </li>
								<li><a href="#">Euro </a> </li>
								<li><a href="#">British Pound</a> </li>
							</ul>
						</li> 
						<li class="dropdown hover"> <a href="#" class="dropdown-toggle" data-toggle="">English <b class="caret"></b></a>
							<ul class="dropdown-menu language">
								<li><a href="#">English</a> </li>
								<li><a href="#">Spanish</a> </li>
								<li><a href="#">German</a> </li>
							</ul>
						</li>-->
					</ul>
				</div>
				<div class="pull-right" id="shoppingcartplace">
					{{shopping_cart()}}
				</div>
			</div>
			<div id="categorymenu">
				<nav class="subnav">
					<ul class="nav-pills categorymenu">
						<li><a class="active" href="{{URL::to('/')}}">Home</a></li>
						@foreach(list_category() as $key=>$menu)
						@if($menu->parent == '0')
						<li>
							<a href="{{category_url($menu)}}">{{$menu->nama}}</a>
							@if($menu->anak->count() > 0)
							<div>
								<ul>
								@foreach($menu->anak as $submenu)
									@if($submenu->parent == $menu->id)
									<li>
										<a href="{{category_url($submenu)}}">{{$submenu->nama}}</a>
										@if($submenu->anak->count() > 0)
										<div>
											<ul>
											@foreach($submenu->anak as $submenu2)
												@if($submenu2->parent == $submenu->id)
												<li><a href="{{category_url($submenu2)}}">{{$submenu2->nama}}</a></li>
												@endif
											@endforeach
											</ul>
										</div>
										@endif
									</li>
									@endif
								@endforeach
								</ul>
							</div>
							@endif
						</li>
						@endif
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
	</header>