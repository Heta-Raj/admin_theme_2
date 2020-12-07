$(document).ready(function() {
	var user_id = $("#id").val();
	var SelectedCountry = $(".country option:selected").val();

	//State onWindow Load
	$.ajax({
		type: "POST",
		url: "edit_validate.php",
		data: { user_id : user_id, country_id: SelectedCountry, action: 'state_windowload' } 
	}).done(function(data){
		$("#state").html(data);			
		//State onWindow Load
		var SelectedState = $(".state option:selected").val();
		$.ajax({
			type: "POST",
			url: "edit_validate.php",
			data: { user_id : user_id, state_id : SelectedState, action: 'city_windowload' } 
		}).done(function(data){
				$("#city").html(data);			
		});
	});

	//-------------------------------------------------

	$('select.country').change(function(){
		var SelectedCountry = $(".country option:selected").val();
	$.ajax({
		type: "POST",
		url: "edit_validate.php",
		data: { country_id : SelectedCountry, action: 'country' } 
	}).done(function(data){
		if (data === '') {
			$('.test').hide();
		}else{
			$('.test').show();
			$("#state").html(data);			
		}
	});	
	});

	$('select.state').change(function(){
		var SelectedState = $(".state option:selected").val();
		$.ajax({
			type:"POST",
			url:"edit_validate.php",
			data:{
				state_id : SelectedState,
				action : 'state'
			}
		}).done(function(data){
			if (data === '') {
				$('.test').hide();
			}else{
				$('.test').show();
				$("#city").html(data);			
			}
		});
	});

	$("[name='edit_profile']").validate({
		rules:{
			username:{
				required : true,
				remote: {
					type: 'POST',
					url : 'edit_validate.php',
					data:{
						action: 'user_reset',
						username: function() {
							return $( "#username" ).val();
						},
					}
				}
			},
			email:{
				required:true,
				remote:{
					type: 'POST',
					url : 'edit_validate.php',
					data :{
						action:'email_reset',
						email: function(){
							return $("#email").val();
						},
					}
				}
			},	
			country :{
				required:true,
			},
			state :{
				required:true,
			},
			city:{
				required:true,
			},
			dob:{
				required:true,
			}
		},
		messages:{
			username:{
				remote: jQuery.validator.format("{0} is already in use."),
			},
			email :{
				remote: jQuery.validator.format("{0} is already in use."),
			},
		}
	});

	$('#edit_user_reg').validate({
		rules:{
			username:{
				required : true,
				remote: {
					type: 'POST',
					url : 'edit_validate.php',
					data:{
						action: 'user_reg_edit',
						username: function() {
							return $( "#username" ).val();
						},
						id: function() {
							return $( "#id" ).val();
						},
					}
				}
			},
			email:{
				required:true,
				remote:{
					type: 'POST',
					url : 'edit_validate.php',
					data :{
						action:'email_reg_edit',
						email: function(){
							return $("#email").val();
						},
						id: function() {
							return $( "#id" ).val();
						},
					}
				}
			},	
			country :{
				required:true,
			},
			state :{
				required:true,
			},
			city:{
				required:true,
			},
			dob:{
				required:true,
			}
		},
		messages:{
			username:{
				remote: jQuery.validator.format("{0} is already in use."),
			},
			email :{
				remote: jQuery.validator.format("{0} is already in use."),
			},
		}
	});
});