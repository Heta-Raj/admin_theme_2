$(document).ready(function(){
	$("[name='form1']").validate({
		rules : {
			username : {
				required : true,
				remote: {
                        url: "ajaxcheck.php",
                        type: "POST",
                        data: {
                            action: 'username_check',
                            username: function() {
                              return $( "#username" ).val();
                            },
                          }
                    }
			},
			email : { 
				required : true,
				remote: {
                        url: "ajaxcheck.php",
                        type: "POST",
                        data: {
                            action: 'email_check',
                            email: function() {
                              return $( "#email" ).val();
                            },
                          }
                    }
                },
			password : { 
				required : true, 
				minlength : 5
			},
		},
		  messages: {
                username: {
                    remote: jQuery.validator.format("{0} is already in use."),
                },
                email: {
                    remote: jQuery.validator.format("{0} is already in use."),
                }
            },
	})
});
