		{{favicon()}}
		<!-- Default css-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

		{{generate_theme_css('simpleone/assets/css/bootstrap.css')}}
		{{generate_theme_css('simpleone/assets/css/bootstrap-responsive.css')}}
		{{generate_theme_css('simpleone/assets/css/flexslider.css')}}
		{{generate_theme_css('simpleone/assets/css/jquery.fancybox.css')}}
		{{generate_theme_css('simpleone/assets/css/portfolio.css')}}

		@if($tema->isiCss=='')	
		{{generate_theme_css('simpleone/assets/css/style.css')}}
		@else 	
		{{generate_theme_css('simpleone/assets/css/editstyle.css')}}
		@endif	
		
		{{generate_theme_css('simpleone/assets/css/cloud-zoom.css')}}