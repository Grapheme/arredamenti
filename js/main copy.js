var arrndmt = window.arrndmt || {};
arrndmt.win = $(window);
arrndmt.lang = $('.guest_lang, ._lang');
arrndmt.social = $('.guest_social, ._social');
arrndmt.respCatImg = function() {
	var catImg = $('.catalog-item-body img');
	catImg.css({ width: '100%' });
	catImg.height( catImg.width() / 1.4910486 );
}
function returnWrapperFlow() {	 	
	$('.wrapper').css({ overflow: 'auto' });	 		
}; 

function animateContent() {
 	$('#main').animate({ opacity: '1'}, 400);
 	var delay = 0;
  	$('.wrapper').css({ overflow: 'hidden' });
  		$('.js_animate_left').css({ position: 'relative', opacity: '0', left: $(this).width() + 100 }).delay( 150 ).each( function(){ 
  			$(this).delay( delay ).animate({ opacity: '1', left: '0px' }, 600); 
  			delay += 200;
  		});
  		
  		delay = 0;
  		
		$('.js_animate_right').css({ position: 'relative', opacity: '0', right: $(this).width() + 100 }).delay( 75 ).each( function(){
			$(this).delay( delay ).animate({ opacity: '1', right: '0px' }, 600 );
			delay += 200;
		});
		
		delay = 0;
		
		$('.js_animate_top').css({ position: 'relative', opacity: '0', top: $(this).width() + 100 }).delay( 75 ).each( function(){
			$(this).delay( delay ).animate({ opacity: '1', top: '0px' }, 800);
			delay += 200;
		});						  	
};

$(document).ready( function() {		
	arrndmt.respCatImg();
 	animateContent();

	$('.js_top_no_delay').css({ position: 'relative', opacity: '0', top: $(this).width() + 100 }).animate({ opacity: '1', top: '0px' }, 800);
	 returnWrapperFlow();	
	/* =============================================================
	   Lang and social jumpers on init
	   ============================================================= */
	
	if ($(window).width() < 769) {
			$(function() {
				detLang = arrndmt.lang.detach();
				detSocial = arrndmt.social.detach();	
				$('body').append(detLang).append(detSocial);
			});	
	};
	
	/* =============================================================
	   Small-menu opening event
	   ============================================================= */
	$('.small-menu-button').click( function() {
		$('.small-menu').slideToggle( 800 , function() {
			
											if ( $(arrndmt.lang).is(":hidden") && $(arrndmt.social).is(":hidden") ) {
												$(arrndmt.lang).fadeIn( 800 );
												$(arrndmt.social).fadeIn( 800 );
											}
											else {
												$(arrndmt.lang).fadeOut( 200 );
												$(arrndmt.social).fadeOut( 200 );										
											}
			
		});
	});
});

$(window).resize( function() {
	arrndmt.respCatImg();
	/* Rescaling Fotorama on Window Resize */
	$('.__fotorama').trigger('rescale', ['100%', arrndmt.win.height(), 700/467, 333]);
	
	/* =============================================================
	   Hide widgets
	   ============================================================= */
	
	if ($(window).width() <= 480){
		if ($('.small-menu').is(":hidden")) {
			$(arrndmt.lang).fadeOut( 200 );
			$(arrndmt.social).fadeOut( 200 );
		}
	}
	
	/* =============================================================
	   Lang and social jumpers on resize
	   ============================================================= */
	
	if ($(window).width() <= 486) {
			$(function() {
				detLang = arrndmt.lang.detach();
				detSocial = arrndmt.social.detach();	
				$('body').append(detLang).append(detSocial);
			});
		}
		else {
			$(function() {
				detLang = arrndmt.lang.detach();
				detSocial = arrndmt.social.detach();				
				$('.wrapper, .index-wrapper').append(detLang).append(detSocial);
				detLang.show();
				detSocial.show();
		});
	};
	
	/* ==============================================================
	   Close small menu if we resize too far
	   ============================================================== */
	
	if ($(window).width() >= 480 && $('.small-menu').is(":visible")) {
		$('.small-menu').slideUp( 400 );
	}
		
});

$(window).load( function(){
	$('.applead__item h2').add( $('.fotorama .applead__item img') ).fadeIn( 800 );
});