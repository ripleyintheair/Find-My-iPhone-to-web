$(document).ready(function() {
	$.ajax({
		url: 'findme.php',
		success: function(resp) {
			$('#addl').html("currently in "+resp.toLowerCase()+".");
		}
	});
});