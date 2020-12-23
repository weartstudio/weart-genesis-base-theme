jQuery(document).ready(function( $ ) {

    
	/* $('.weart-slider').slick({
		autoplay: true,
		prevArrow: '<button type="button" class="weart-nav slick-prev"><i class="fas fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="weart-nav slick-next"><i class="fas fa-angle-right"></i></button>'
	}); */


	// plus div around image in productlist
	/* const loopProducts = $("li.entry.product > a.woocommerce-loop-product__link > img");
	loopProducts.wrap('<div class="featured-img"></div>'); */


	// search
	$("#weart-search-icon").click(function(){
		$(this).toggleClass('fa-times');
		$(this).parent().find('.search-form').toggleClass('active');
	});

});