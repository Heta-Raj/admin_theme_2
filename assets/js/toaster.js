var Toaster = function () {
toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": 300,
          "hideDuration": 1000,
          "timeOut": 5000,
          "extendedTimeOut": 1000,
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      }

    var Register = function () {
            toastr.remove();
            toastr.options.positionClass = "toast-top-right";
            toastr.success('Registration Success', 'Success');
    }   
     var Delete = function() {
       toastr.remove();
       toastr.options.positionClass = "toast-top-right";
       toastr.success('delete Success', 'Success');
    }
    
    return{        
        registerr: function () {
            Register();
            if (Register) {
                setTimeout(function(){
                window.location = "index.php";
                },2000);
            }
        },
        delete_data: function(){


           Delete();
        
        if (Delete) {
          setTimeout(function(){
          },2000);
        }
      }
    }

   

}();