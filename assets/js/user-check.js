$(document).ready(function(){
    $("#loginform").validate({
        rules:{
            username:{
                required:true,
                remote : {
                    url : 'usercheck.php',
                    type : 'POST',
                    data :{
                        action : 'login_username_check',
                        username : function(){
                            return $("#username").val();
                        },
                    }
                }
            },
            password : { 
                required : true, 
                minlength : 5,
                remote : {
                    url : 'usercheck.php',
                    type : 'POST',
                    data :{
                        action : 'login_password_check',
                        username : function(){
                            return $("#username").val();
                        },
                        password: function(){
                            return $("#password").val();
                        },
                    }
                }
            }
        },
        messages :{
           username: {
            remote: jQuery.validator.format("{0} is invalid."),
        },
        password: {
            remote: jQuery.validator.format("Password is invalid."),
        },    
    },
    submitHandler: function(form) {
        
        Toaster.registerr();
    }
});
});