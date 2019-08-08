$(function() {

	$(".course-image").hover(function() { 
		$(this).css('opacity','.8'); 
		$(".admin-action").css('z-index', '11');
		}, function() {
		$(this).css('opacity','1');
		});

	// Validation of the Question Form

	$(".question-form").submit(function() {

		$answers = $(".question-form #answers").val().split(' ');
		$right_answer = $(".question-form #right_answer").val();
		if($answers.indexOf($right_answer) === -1) {
			$(".errors").text("Ooops, Right Answer field must be one word of answers");
			$(".errors").css('display', 'block');
			return false;
		}else {
			return true;
		}
	});

});

