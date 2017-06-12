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
            <title>Home</title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <link href="css/login.css" rel="stylesheet">
            <link href="css/button.css" rel="stylesheet">
             <style type="text/css">
                 #backgroundImage{z-index: 1;}

#backgroundImage:before {
   content: "";
   position: fixed;
   z-index: -1;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   background-image: url(images/BG1.jpg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }
                 body {
  font-family: Georgia, "Times New Roman", Times, serif;
  color: #000;
}
                h1,
                 .h1{
                     font-family:Script MT cursive ;
                     color: #ffffff;
                    margin-left: 10px;
                     margin-bottom: 20px;
                 }


              h2,
              .h2 {
                    font-size: 20px;
                    color: #c0c0c0;
                    margin: 50px;
                  }
                  .message{
                    color:red;
                  }

                  .carousel-inner > .item > img,
                  .carousel-inner > .item > a > img {
                  width: 100%;
 
                  height: 100px;
                  }
                 
             </style>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <!--  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.min.js"> </script>-->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
                  <!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                   <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.min.js"> </script>
                   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>-->
                  <!--  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script> 
                  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
                  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    -->

   <script src= "js/loginscript.js"></script>
   <script>
$(document).ready(function(){
    $("#signin").click(function(){
        $("#div1").toggle();
    }); 
    $("#signup").click(function(){
        $("#div2").toggle();
    }); 

});
</script>
   
</head>
<body>
    <div id="backgroundImage">

   
      <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
                <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing                                system</font></marquee>
                  </div>
                      <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php">           <font color="amber">Logout</a></font></div>

              
            </div>
      </nav>
          <div class="row">
              <div class="col-md-8">
          <h1> Billing & Ticketing </h1>
              </div>
              <div class="col-md-4"> <button class="button" type="submit" id="signin" ><p>Login</p></button><button class="button" type="submit"                    id="signup"><p>Register</p></button></div>
                </div>
     <!-- <div class="container-fluid">
        <figure class="col-xs-12">
          <a href="/home"><img class="image img-responsive center-block wow fadeInUp" src="images/create_thumb.png" alt="Billing and Ticketing">           </a>
        </figure>
    
      </div>-->
      <!-- <nav class="navbar navbar-default" style="background-color: rgba(0,0,0,0);" style="background-image:url(images/bg1.jpg)" >-->
        <nav class="navbar navbar-default" style="background-image:url(images/bg1.jpg)" >
          <div class="container-fluid">
    
          
            <div class ="col-md-12">
               
                <div class="blog-masthead">
                    <ul class= "nav nav-pills nav-justified" >
                      <li><a href="index.php">Home</a></li>
                      <li><a href="products.php">Products</a></li>
                      <li><a href="billing.php">Billing</a></li>
                      <li><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul> 

                </div>
            </div>
       
    
        </div>
    </nav>
          </div>
        

   <div class="container-fluid">
        <div class="row">
        <div class="col-lg-8" >
          <h4><font color="#008B8B">About Billing and Ticketing</font></h4>
                        <p><font color="#008B8B">The Main purpose of Billing and Ticketing application is to provide all in one sollution for startup Internet Service Providers.</font></p>
                        <p><font color="#008B8B">Billing and Ticketing acts as a website and support operational and business services. This Application has 2 layered billing interface one for clients and other for Administrators.</font></p>
                    
          
        </div>
        
        
         <div class="col-sm-4"  >
          
        <div class="row"  >
         <!--  <button id="fade">Login</button><br><br>-->
        <div class="row2" >
            <div  id ="div1" style="display:none;" >
          <h2><font color="#008B8B">Login</font></h2>
       
          
          <form  method="POST" id="login-form">
                 <div id="error" ></div>
                 <div class="login-form">
                   <div class="field" >
                    Username:<input type="text" name="username" id="username" >
                   </div>
                  <div class="field with-btn">
                 
                       Password:<input type="password" name="password" id="password" >
                  </div>
                  <button type="submit" name="btn-login" id="btn-login" value="submit"> 
                  Sign In
               </button>
             </div>
        </form>
            </div> 
        </div>
      </div>
      <div class="row"  >
        <div class="row2" id = "div2" style="display:none;">
          <h2><font color="#008B8B">Sign UP</font></h2>
           <form  method="POST" id="registration-form">
                 <div id="error1" class="message" ></div>
      
                  <div class="login-form">
                     <div class="field">
                Username: <input type="text" name="username" id="username">
                First Name: <input type="text" name="fname" id="fname">
                Last Name : <input type="text" name="lname" id="lname" >
                Password:<input type="password" name="password" id="password" >
                Email : <input type="text" name="email" id="email" >
                Phone Number: <input type="text" name="phoneno" id="phoneno" >
                Address : <input type="text" name="address" id="address" >
                City: <input type="text" name="city" id="city">
                State: <input type="text" name="state"  id="state">
                Zip Code: <input type="text" name="zcode" id="zcode" >
                Country: <input type="text" name="country" id="country">
                
              </div>
              
  
              
              <button type="submit" name="btn-register" id="btn-register" value="Next"> 
                 Sign Up
               </button>
              
              
          </div>
        </form>
          
        </div>
          
        </div>
      </div>
    </div>
  </div>
  <div>

                
            
   

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
                   username: {
                   required: true,
                   },
                },
                   messages:
                {
                   fname:{
                      required: "please enter your firstname"
                     },
                   username:{
                      required: "please enter your username"
                   },
                      lname: "please enter your lastname"
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
                  url  : 'Registration2.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      
                  },
                  success :  function(response)
                  {      
                     $("#error1").html(response);
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
           });
</script>



</body>
</html>

 


