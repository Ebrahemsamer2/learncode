$(function() {

	$(".course-image").hover(function() { 
		$(this).css('opacity','.8'); 
		$(".admin-action").css('z-index', '11');
		}, function() {
		$(this).css('opacity','1');
		});

});