    <header>
        <div class="headerstrip">
            <div class="container">
                <div class="row">
                    <div class="span12"> <a href="{{URL::to('/')}}" class="logo pull-left"><img style="width: 200px;" src="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}" alt="SimpleOne" title="SimpleOne"></a> 
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
                                <input type="text" class="input-medium search-query" name="search" required placeholder="Search Here…">
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
                <div class="pull-right">
                    {{$ShoppingCart}}
                </div>
            </div>
            <div id="categorymenu">
                <nav class="subnav">
                    <ul class="nav-pills categorymenu">
                    <li><a class="active"  href="{{URL::to('/')}}">Home</a></li>
                    @if($katMenu!='1')   
                        @foreach($katMenu as $key=>$menu)
                            <li>
                            @if($menu->parent=='0')
                                <a href={{URL::to('category/'.$menu->slug)}}>{{$menu->nama}}</a>
                                @foreach($anMenu as $bug)
                                    @if($bug->parent==$menu->id)
                                        <div>
                                            <ul>
                                        @foreach($anMenu as $key1=>$submenu)
                                            @if($submenu->parent==$menu->id) 
                                                <li><a href={{URL::to('category/'.$submenu->slug)}}>{{$submenu->nama}}</a>
                                                    @foreach($anMenu as $bug)
                                                        @if($bug->parent==$submenu->id)
                                                        <div>
                                                            <ul>

                                                            @foreach($anMenu as $key2=>$submenu2)                                
                                                                @if($submenu->id==$submenu2->parent)

                                                                <li><a href={{URL::to('category/'.$submenu2->slug)}}>{{$submenu2->nama}}</a></li>

                                                                @endif
                                                            @endforeach

                                                            </ul>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </li>
                                            @endif
                                        @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            </li>
                        @endforeach
                    @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>