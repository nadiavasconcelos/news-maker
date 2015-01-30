jQuery( function($) {
	jQuery('a').tipsy({
		gravity: 's'
	});
	setTimeout( function() {
		jQuery('.flash').html('');
	}, 15000);
});