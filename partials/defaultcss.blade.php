		<!-- Default css-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

		{{HTML::style(dirTemaToko().'simpleone/assets/css/bootstrap.css')}}
		{{HTML::style(dirTemaToko().'simpleone/assets/css/bootstrap-responsive.css')}}
		{{HTML::style(dirTemaToko().'simpleone/assets/css/flexslider.css')}}
		{{HTML::style(dirTemaToko().'simpleone/assets/css/jquery.fancybox.css')}}
		{{HTML::style(dirTemaToko().'simpleone/assets/css/portfolio.css')}}

	@if($tema->isiCss=='')	
		{{HTML::style(dirTemaToko().'simpleone/assets/css/style.css')}}
	@else 	
		{{HTML::style(dirTemaToko().'simpleone/assets/css/editstyle.css')}}
	@endif	
		
		{{HTML::style(dirTemaToko().'simpleone/assets/css/cloud-zoom.css')}}
		<link rel="shortcut icon" href="{{URL::to(getPrefixDomain().'/galeri/'.$toko->logo)}}">