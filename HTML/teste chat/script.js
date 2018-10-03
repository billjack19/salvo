(function() {
	$('#live-chat header').on('click', function() {
		$('.chat').slideToggle(300, 'swing');
		$('.chat-message-counter').fadeToggle(300, 'swing');
	});

	$('.chat-close').on('click', function(e) {
		e.preventDefault();
		$('#live-chat').hide(300);
		$('#live-chat').show(300);
		// $("#chatStandBy").show(300);
	});

	// $('.chat-open').on('click', function (e) {
		// e.preventDefault();
		// $("#chatStandBy").hide(300);
	// });
}) ();