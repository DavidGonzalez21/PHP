
var $ = jQuery.noConflict();

$(document).ready(function(){
	$('#compareStrings').on('click', function(event){
		event.stopImmediatePropagation();
		var firstString = $('#firstString').val();
		var secondString = $('#secondString').val();
		$.ajax({
			method: 'POST',
			url: 'init.php',
			dataType: 'JSON',
			data: {firstString : firstString, secondString : secondString},
			success: function(msg) {
				if(msg.error) {
					$('#resultOverlap').html(msg.error).removeClass('alert-success').addClass('alert-danger');
				}
				if(msg.success) {
						$('#resultOverlap').html(msg.success).removeClass('alert-danger').addClass('alert-success');
					}else {
						$('#resultOverlap').html('Could not compare Strings, try with different worlds').removeClass('alert-success').addClass('alert-danger');
					}
			},
			error: function(msg, err){
				console.log(msg, err)
			}
		})
	})
})
