$('document').ready(function()
            { 
               /* validation */
               $("#login-form").validate({
                   rules:
                {
                   password: {
                   required: true,
                   },
                   username: {
                   required: true,
                   },
                },
                   messages:
                {
                   password:{
                      required: "please enter your password"
                     },
                      username: "please enter your email address"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#login-form").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'login5.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      $("#error").fadeOut();
                      $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                  },
                  success :  function(response)
                  {      
                     if(response=="username and password correct")
                     {
                         window.alert("success function excecuting");
                        $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                        setTimeout(' window.location.href = "billing.php"; ',4000);
                     }
                     else{
                         
                         $("#error").fadeIn(1000, function(){      
                         $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                         $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                         });
                     }
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
           });
