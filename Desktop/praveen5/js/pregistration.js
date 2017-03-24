$('document').ready(function()
            { 
               /* validation */
               $("#product_registration").validate({
                   rules:
                {
                   password: {
                   required: true,
                   },
                   c_id: {
                   required: true,
                   },
                },
                   messages:
                {
                   password:{
                      required: "please enter your password"
                     },
                      c_id: "please enter your account id"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#product_registration").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'pregistration.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      
                  },
                  success :  function(response)
                  {      
                     $("#error").html(response);
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
           });

    