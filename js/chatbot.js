$(document).ready(function() {
	$('.chat-icon').click(function() {
		$('.chat-box').toggleClass('active');
	});

	$('.conv-form-wrapper').convform({selectInputStyle: 'disable'})
});

