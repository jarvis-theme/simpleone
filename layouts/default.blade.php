<!DOCTYPE html>
<html lang="en">
	<head>
		{{ Theme::partial('seostuff') }} 
		{{ Theme::partial('defaultcss') }} 
		{{ Theme::asset()->styles() }} 
	</head>
	<body>
		{{ Theme::partial('header') }} 
		<div id="maincontainer">
			{{ Theme::place('content') }} 
		</div>
		{{ Theme::partial('footer') }} 
		{{ Theme::partial('defaultjs') }} 
		{{-- Theme::asset()->scripts() --}} 
		{{-- Theme::asset()->container('footer')->scripts() --}} 
		{{ Theme::partial('analytic') }} 
	</body>
</html>