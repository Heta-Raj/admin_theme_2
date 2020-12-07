$(document).ready(function(){
	$("[name='resetpwd']").validate({
		rules:{
			email:{
				required:true,
				remote : {
					url : 'resetpwd.php',
					type : 'POST',
					data :{
						action : 'email_check',
						email : function(){
							return $("#email").val();
						},
					}
				}
			},
			password:{
				required:true,
				minlength : 5,
				remote : {
					url : 'resetpwd.php',
					type : 'POST',
					data :{
						action : 'pwd_reset',
						email : function(){
							return $("#email").val();
						},
						password: function(){
							return $("#password").val();
						},
					}
				}
			}	
		},
		messages :{
			email: {
				remote: jQuery.validator.format("{0} is not exists."),
			},
			password: {
				remote: jQuery.validator.format("Password is invalid."),
			},
		},
		submitHandler: function(form) {
			window.location.href = "login.php";
		}
	});
});