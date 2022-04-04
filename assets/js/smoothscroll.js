/**
 * Theme: Flat Blocks
 * 
 * Javascript for touch-enabled carousels and smooth scrolling internal links.
 *
 * @package flat-blocks
 * 
 * This excellent code comes from https://css-tricks.com/snippets/jquery/smooth-scrolling/
 * with only the addition of $(document).ready(function() added.
 */
 
( function( $ ) {

	// Touchscreen swipe through carousel (slider)
	/*$(document).ready(function() {  
	   if ($.mobile) {
			//must target by ID, so these need to be used in your content
			$('#myCarousel, #myCarousel2, #agnosia-bootstrap-carousel, #carousel-example-generic').swiperight(function() {  
				$(this).carousel('prev');  
			});  
			$('#myCarousel, #myCarousel2, #agnosia-bootstrap-carousel, #carousel-example-generic').swipeleft(function() {  
				$(this).carousel('next');  
			});  
		}
	});*/

	// Smooth scroll to anchor within the page
	/*$(document).ready(function() {
		$('.smoothscroll').click(function() {
		  var target = $(this.hash);
		  var offset = $('body').css('padding-top');
		  if (offset) offset = offset.replace('px','');
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html,body').animate({
			  scrollTop: ( target.offset().top - offset )
			}, 1000);
			return false;
		  }
	});*/
	
	// Select all links with hashes
	$(document).ready(function() {
		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
			// On-page links
			if (
			  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
			  && 
			  location.hostname == this.hostname
			) {
			  // Figure out element to scroll to
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			  
			  //var topOffset = $('body').css('padding-top');
			  var topOffset = $('.wp-site-blocks').css('padding-top');
			  if (topOffset) topOffset = topOffset.replace('px','');

			  // Does a scroll target exist?
			  if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				$('html, body').animate({
				  /*scrollTop: ( target.offset().top)*/
				  scrollTop: ( target.offset().top - topOffset )
				}, 1000, function() {
				  // Callback after animation
				  // Must change focus!
				  var $target = $(target);
				  $target.focus();
				  if ($target.is(":focus")) { // Checking if the target was focused
					return false;
				  } else {
					$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
					$target.focus(); // Set focus again
				  };
				});
			  }
			}
		  });
	});
	
} )( jQuery );