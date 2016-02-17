var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
	urlArgs: "v=001",
	waitSeconds: 60,
	shim: {
		"bootstrap" : {
			deps: ['jquery']
		},
		'jq_ui' : {
			deps : ['jquery']
		},
		"noty" : {
			deps : ['jquery']
		},
		"cart" : {
			deps : ['jquery']
		},
		'respondjs' : {
			exports : 'respond'
		},
		'applicationjs' : {
			deps : ['jquery']
		},
		'bootstrap_tooltip' : {
			deps : ['jquery', 'bootstrap']
		},
		'fancybox' : {
			deps : ['jquery']
		},
		'flexslider' : {
			deps : ['jquery']
		},
		'cloudzoom' : {
			deps : ['jquery', 'bootstrap'],
			exports : 'CloudZoom'
		},
		'validate' : {
			deps : ['jquery']
		},
		'caroufredsel' : {
			deps : ['jquery']
		},
		'mousewheel' : {
			deps : ['jquery']
		},
		'touchswipe' : {
			deps : ['jquery']
		},
		'debounce' : {
			deps : ['jquery']
		},
		'isotope' : {
			deps : ['jquery']
		},
	},

	paths: {
		// LIBRARY
		jquery              : dirTema+'/assets/js/lib/jquery',
		bootstrap           : dirTema+'/assets/js/lib/bootstrap',
		respondjs           : dirTema+'/assets/js/lib/respond.min',
		applicationjs       : dirTema+'/assets/js/lib/application',
		bootstrap_tooltip   : dirTema+'/assets/js/lib/bootstrap-tooltip',
		fancybox            : dirTema+'/assets/js/lib/jquery.fancybox',
		flexslider          : dirTema+'/assets/js/lib/jquery.flexslider',
		cloudzoom 			: dirTema+'/assets/js/lib/cloud-zoom.1.0.2.min',
		validate 			: dirTema+'/assets/js/lib/jquery.validate',
		caroufredsel		: dirTema+'/assets/js/lib/jquery.carouFredSel-6.1.0-packed',
		mousewheel			: dirTema+'/assets/js/lib/jquery.mousewheel.min',
		touchswipe			: dirTema+'/assets/js/lib/jquery.touchSwipe.min',
		debounce			: dirTema+'/assets/js/lib/jquery.ba-throttle-debounce.min',
		isotope				: dirTema+'/assets/js/lib/jquery.isotope.min',
		cart                : 'js/shop_cart',
		jq_ui               : 'js/jquery-ui',
		noty                : 'js/jquery.noty',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		main            : dirTema+'/assets/js/pages/default',
		produk          : dirTema+'/assets/js/pages/produk',
	}
});
require([
	'router',
	'cart',
	'main'
], function(router,cart,main){
	router.define('produk/*', 'produk@run');

	main.run();
	router.run();
	cart.run();
});