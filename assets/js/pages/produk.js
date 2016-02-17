define(['jquery', 'bootstrap', 'cloudzoom'], function($)
{
    return new function(){
        var self = this;
        self.run = function(){
            $(document).ready(function(){
                $("#thumb1").click(); 
            });
            
            // List & Grid View
            $('#list').click(function(){
                $(this).addClass ('btn-orange').children('i').addClass('icon-white')
                $('.grid').fadeOut()
                $('.list').fadeIn()
                $('#grid').removeClass ('btn-orange').children('i').removeClass('icon-white')
            });

            $('#grid').click(function(){
                $(this).addClass ('btn-orange').children('i').addClass('icon-white')
                $('.list').fadeOut()
                $('.grid').fadeIn()
                $('#list').removeClass ('btn-orange').children('i').removeClass('icon-white')
            });

            // Fancyboxpopup
            $("a.fancyboxpopup").fancybox().each(function() {
                $(this).append('<span class="viewfancypopup">&nbsp;</span>'); 
            });

            // Prdouctpagetab 
            $('#myTab a:first').tab('show')
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            });

            // Product thumbnails
            $('.thumbnail').each(function(){
                $(this).hover(
                    function(){
                        //$(this).children('a').children('img').fadeOut()
                        $(this).children('.shortlinks').fadeIn()
                    },
                    function(){ 
                        //$(this).children('a').children('img').fadeIn()
                        $(this).children('.shortlinks').fadeOut()
                    }
                );
            });

            // Product Thumb
            $('.mainimage li #wrap').hide()
            $('.mainimage li #wrap').eq(0).fadeIn()
            $('ul.mainimage li.producthtumb').click(function(){
                var thumbindex = $(this).index()
                $('.mainimage li #wrap').fadeOut(0)
                $('.mainimage li #wrap').eq(thumbindex).fadeIn()
                $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
            })

        };
    }
});