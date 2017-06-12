<?php
session_start();

if(isset($_SESSION['user_session']))
{
 
include_once 'db4.php';

$stmt = $db_con->prepare("SELECT * FROM login WHERE username=:username");
$stmt->execute(array(":username"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products Page</title>
        <link href="css/bootstrap.css" rel="stylesheet">
            <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">
        <link href="css/justified-nav.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <style type="text/css">
            body { background: #313D4C !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
        </style>

  </head>
<body>
  <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"   style="margin:0px" background-color="#EF5B3E">
          <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#EF5B3E"><font color="#FFFFFF"> Welcome to billing and ticketing system</font></marquee>
            </div>
            <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php">Logout</a></div>
            </div>
      </div>
  </nav>
  <nav class="navbar navbar-default" >
          <div class="container-fluid">
    
          <div class="row">
            <div class ="col-md-12">
                <div class="blog-masthead">
                    <ul class="nav nav-justified">
                      <li class="active"><a href="index.php">Home</a></li>
                      <li><a href="products.php">Products</a></li>
                      <li><a href="billing.php">Billing</a></li>
                      <li><a href="ticketing.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul> 

                    <!--<form class="navbar-form navbar-right" role="search">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                       <button type="submit" class="btn btn-default">Submit</button>
                    </form> -->
                </div>
            </div>
          </div>
    </nav>

    <div class="col-lg-4">
          <h4>Step 1</h4>
          <form  method="POST" id="registration-form">
                 <div id="error" ></div>
      
                  <div class="login-form">
                     <div class="field">
            
                First Name: <input type="text" name="fname" id="fname">
                Last Name : <input type="text" name="lname" id="lname" >
                Email : <input type="text" name="email" id="email" >
                Phone Number: <input type="text" name="phoneno" id="phoneno" >
                Address : <input type="text" name="address" id="address" >
                City: <input type="text" name="city" id="city">
                State: <input type="text" name="state"  id="state">
                Zip Code: <input type="text" name="zcode" id="zcode" >
                Country: <input type="text" name="country" id="country">
                
              </div>
              
  
              
              <button type="submit" name="btn-register" id="register" value="Next"> 
                 Next
               </button>
              
              <p class="message">
                  want to register <a href="http://dribbble.com/shots/421277-Login-freebie">registration link</a>
              </p>
          </div>
        </form>
        
        </div>

        <div class="col-lg-4">
          <h4>Step 2</h4>
          <form  method="POST" id="product-registration">
                 <div id="error" ></div>
      
                  <div class="login-form">
                     <div class="field">
            
                Client ID: <input type="text" name="fname" id="fname">
                Last Name : <input type="text" name="lname" id="lname" >
                Email : <input type="text" name="email" id="email" >
                Phone Number: <input type="text" name="phoneno" id="phoneno" >
                Address : <input type="text" name="address" id="address" >
                City: <input type="text" name="city" id="city">
                State: <input type="text" name="state"  id="state">
                Zip Code: <input type="text" name="zcode" id="zcode" >
                Country: <input type="text" name="country" id="country">
                
              </div>
              
  
              
              <button type="submit" name="btn-register" id="register" value="Next"> 
                 Next
               </button>
              
              <p class="message">
                  want to register <a href="http://dribbble.com/shots/421277-Login-freebie">registration link</a>
              </p>
          </div>
        </form>
        
        </div>
        
         
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$('document').ready(function()
            { 
               /* validation */
               $("#registration-form").validate({
                   rules:
                {
                   fname: {
                   required: true,
                   },
                   lname: {
                   required: true,
                   },
                },
                   messages:
                {
                   fname:{
                      required: "please enter your password"
                     },
                      lname: "please enter your email address"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#registration-form").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'registration1.php',
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
</script>
</body>
</html>