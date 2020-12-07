$(document).ready( function() {
    $("[name='reg']").validate({
      rules:{
        username : {
            required : true,
            remote : {
                url : 'user_reg.php',
                type : 'POST',
                data :{
                    action : 'user_check',
                    username : function(){
                        return $("#username").val();
                    },
                }
            }
        },
        firstname : {
            required : true,
                       },

        lastname : {
            required : true,
            },
      
        email : {
            required : true,
            remote : {
                url : 'user_reg.php',
                type : 'POST',
                data :{
                   action : 'email_check',
                   email : function(){
                    return $("#email").val();
                    },
                }
            }
         },
        password : {
            required :true,
            minlength : 5,
        }

        },

        messages : {
             username : {
                remote : jQuery.validator.format("{0} is invalid."),
            },
            firstname : {
                remote : jQuery.validator.format("{0} is invalid."),
            },
            lastname : {
                remote : jQuery.validator.format("{0} is invalid."),
            },
            email :{
             remote : jQuery.validator.format("{0} is invalid."), 
            },
            password : {
                remote : jQuery.validator.format("Password must contain 5 char."),
            }, 
        },

    });
    $("select.country").change(function(){
        var selectCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "country.php",
            data: { state_id : selectCountry } 
        }).done(function(data){
            $("#state").html(data);    
             
           if (data === '<option selected="">Choose...</option>' || data === '') {
             $("#state").html('<option selected="">Choose...</option>'); 
        }     
        });
    });
    $("select.state").change(function(){
        var selectState = $(".state option:selected").val();
        $.ajax({
            type: "POST",
            url: "country.php",
            data: { city_id : selectState } 
        }).done(function(data){
            $("#city").html(data);   
            if (data === '<option selected="">Choose...</option>' || data === '') {
             $("#city").html('<option selected="">Choose...</option>'); 
        } 

        });
    });

});