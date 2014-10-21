/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
$(function(){
	$('.__fotorama').fotorama({
		nav: 'dots',
		transition: 'fade',
		click: false,
		autoplay: 15000,
		transitionDuration: 800,
		loop: true,
		cropToFit: true,
		zoomToFit: true,
		width: '100%',
		height: $(window).height(),
		arrowNext: '<div class="arrows right_arrow"></div>',
		arrowPrev: '<div class="arrows left_arrow"></div>'
	});
});