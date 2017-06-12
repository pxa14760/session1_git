<?php
session_start();

if(isset($_SESSION['user_session']))
{
 header("Location: ticketing.php");
}
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Billing Test Page</title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/login.css" rel="stylesheet">
            <style type="text/css">
            /*body { background: #FFFFFF !important; }*/
            /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
                 #backgroundImage{z-index: 1;}

#backgroundImage:before {
   content: "";
   position: fixed;
   z-index: -1;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   background-image: url(images/BG2.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }
            h1,h2,
                  .h2 {
                    font-size: 30px;
                    color: #fff;
                  }

                  p {
                    color: #fff;
                  }
                  .table-striped{
                    width: auto;
                    text-align: center;
                     border-width: 2px;
                      border-style: double;
    border-color: black;
    color: black;
                  }                  

                  .table-striped > tbody > tr:nth-of-type(odd) {
                    background-color: #fff;
                     border-width: 1px;
                      border-style: double;
    border-color: black;
                  }
                  .table-striped > tbody > tr:nth-of-type(even) {
                    background-color: #ccc;
                     border-width: 1px;
                      border-style: double;
                          border-color: black;
                          text
                  }
                  th {
                      background-color: #ccc;
                      color: blue;
                      border-width: 2px;
                      border-style: double;
    border-color: black;
                  }
                  td{
                    border-width: 2px;
                      border-style: double;
    border-color: black;

                  }
                  h2,
                  .h2 {
                    font-size: 30px;
                    color: #fff;
                  }
            </style>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <!--  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.min.js"> </script>-->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
            <!-- <script src= "js/loginscript.js"></script>-->
   
      </head>
      <body>
          <div id="backgroundImage"></div>
        <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing system</font></marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font color="#2F4F4F">Logout</a></font>
              </div>
          </div>
      </nav>
               
      <nav class="navbar navbar-default" style="background-image:url(images/bg1.jpg)" >
          <div class="container-fluid">
            <div class ="col-md-12">    
                <div class="blog-masthead">
                    <ul class= "nav nav-pills nav-justified">
                      <li><a href="index.php">Home</a></li>
                      <li ><a href="products.php">Products</a></li>
                      <li ><a href="billing.php">Billing</a></li>
                      <li class="active"><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
                </div>
            </div>
          </div>
      </nav>
        
    <!-- Example row of columns -->
   <!--  <div class="container">
      <img src="images/create_thumb.png" class="img-responsive" alt="logo" width="auto"  margin="100px" align="center">
  </div>-->
    
      <h1 align="center" ><font color="#000000"> Support System </font></h1>
    
     
      <div class="row">
        <div class="col-lg-4" >
          <h2><font color="#000000">Create Ticket</font></h2>
          <p><font color="#000000">Are you facing problem with services? if so kindly enter customer id and type in your problem. there on we will take care. Sorry for the inconvinience caused.</font></p>
            <form  method="POST" id="ticket-form">
                 
                  <div class="login-form">
                      <div class="field">
                        Customer ID: <input type="text" name="customer_id" id="customer_id" >
                        Problem: <input type="text" name="problem" id="problem" >
                      </div>

                      
      
                      <button type="submit" name="btn-login" id="btn-login" value="submit"> 
                            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit
                      </button>
                  </div>
            </form>
          
        </div>
        <div class="col-lg-4" >
          <h2><font color="#000000">Check Status</font></h2>
          <p><font color="#000000">Is your problem not sorted yet? If you want to check status how far the problem is sorted, Kindly enter the ticket number in provided field and click on submit.</font></p>
              <form  method="POST" id="check-status">
                 
                  <div class="login-form">
                        <div class="field">
                            Ticket Id: <input type="text" name="status" id="status" >
                        </div>
                      <button type="submit" name="check-status" id="check-status" value="check-status"> 
                       <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                     </button>

                     </div>
           
              </form>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<!--<div class="table-responsive">
                              <table class="table table-striped" border="1">
                                <div id="table" align="center"></div>
                              </table>
                        </div>-->
              </div>
       </div>
        <div class="col-lg-4" >
          <h2><font color="#000000">Employee Login </font></h2>
          <p><font color="#000000">To update, close an existing ticket, login with employee credentials and you will be redirected to ticketing page.
          There you can create , update close ticket and assign to employees , prioratise the ticket based on severity.</font></p>
           <form  method="POST" id="login-form">
                 
      
      
                  <div class="login-form">
                     <div class="field">
                    Username:<input type="text" name="username" id="username" >
                   </div>

                  <div class="field with-btn">
                    Password:   <input type="password" name="password" id="password" >
                  </div>
  
                <button type="submit" name="btn-login" id="btn-login" value="submit"> 
                 <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
               </button>
              </div>
            </form>
          </div>
          
        </div>
		<div class="row">
				<div class="table-responsive">
                              <table class="table table-striped" border="1">
                                <div id="table" align="center"></div>
                              </table>
                        </div>
		
		</div>
        
        
          </div>
     
        <script type="text/javascript">
$('document').ready(function()
            { 
               /* validation */
               $("#check-status").validate({
                   rules:
                {
                   status: {
                   required: true,
                   },
                   
                },
                   messages:
                {
                   status:{
                      required: "please enter your password"
                     },
                      
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#check-status").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'check_status.php',
                  data : data,
                 
                  success :  function(response)
                  {     
                     $("#table").html(response);
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
           });
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
                  url  : 'login4.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      $("#error").fadeOut();
                      $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                  },
                  success :  function(response)
                  {      
                     if(response=="ok")
                     {
                         window.alert("success function excecuting");
                        $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                        setTimeout(' window.location.href = "ticketing.php"; ',4000);
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
          
</script>
      
      </body>
</html>