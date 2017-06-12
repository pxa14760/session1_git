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
        <link href="css/login.css" rel="stylesheet">
        <style type="text/css">
          /*  body { background: #FFFFFF !important; } *//* Adding !important forces the browser to overwrite the default style applied by Bootstrap */     #backgroundImage{z-index: 1;}

#backgroundImage:before {
   content: "";
   position: absolute;
   z-index: -1;
   top: 0;
   bottom: 0;
   left: 0;
   right: 0;
   background-image: url(images/BG2.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }
        
        h2,
              .h2  {
                    font-size: 20px;
                    color: royalblue;
                    margin-top: 30px;
                  text-align: center
                  }
            
            h5,
              .h5  {
                    font-size: 15px;
                    color: royalblue;
                    margin: 10px;
                  text-align: center
                  }
            
            .login-form  {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
    width:  auto;
                align-content: center;
  
}

 .login-form .field {
  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
  padding: 5px;
  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
  border-radius: 3px;
  margin-bottom: 9px;
     margin-left: 20px;
  display: inline-block;
}
            .login-form .field1 {
  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
  padding: 5px;
  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
  border-radius: 3px;
  margin-bottom: 9px;
     margin-left: 20px;
  display:block;
  
}
            .login-form .field1 input {
  border: 1px solid #96450f;

  width:auto;
  padding: 5px;
  font-size: 19px;
  font-family: Helvetica Neue;
  font-weight: 600;
  box-shadow: 0 1px #fcb483, inset 0 3px 5px #aaa;
  border-radius: 3px;
  color: #666564;
}

 .login-form .field input {
  border: 1px solid #96450f;

  width: 200px;
  padding: 5px;
  font-size: 19px;
  font-family: Helvetica Neue;
  font-weight: 600;
  box-shadow: 0 1px #fcb483, inset 0 3px 5px #aaa;
  border-radius: 3px;
  color: #666564;
}
 .login-form .field select {
  border: 1px solid #96450f;
  
  width: 150px;
  padding: 5px;
  font-size: 19px;
  font-family: Helvetica Neue;
  font-weight: 600;
  box-shadow: 0 1px #fcb483, inset 0 3px 5px #aaa;
  border-radius: 3px;
  color: #666564;
}


 .login-form .field input:focus {
  outline: none;
  color: #333;
}

 .login-form .field.with-btn {
  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
  padding: 5px;
  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
  border-radius: 3px;
  margin-bottom: 9px;
  display: inline-block;
  
}

 .login-form .field.with-btn input {
  
  border: 1px solid #96450f;
  
  width: 150px;
  padding: 5px;
  font-size: 19px;
  font-family: Helvetica Neue;
  font-weight: 600;
  box-shadow: 0 1px #fcb483, inset 0 3px 5px #aaa;
  border-radius: 3px;
  color: #666564;
}

 .login-form button {
  border: none;
  display: block;
  width: 81px;
  height: 46px;
  margin-left: 9px;
  float: right;
  border-radius: 3px;
  background: linear-gradient(#70787e, #4b545b);
  text-transform: uppercase;
  font-family: Helvetica, Neue;
  font-size: 13px;
  font-weight: bold;
  cursor: pointer;
  color: #11161a;
  text-shadow: 0 1px 0 #727980;
  box-shadow: 0 3px 3px #222, inset 0 1px 0 #a8a8a8;
}

 .login-form button:hover {
  background: linear-gradient(#70787e, #545a5e);
}

 .login-form button:active {
  background: linear-gradient(#545c61, #545a5e);
  
}



.message {
  clear: both;
  font-family: Helvetica Neue;
  color: red;
  font-size: 13px;
  text-align: center;
  margin-top: 80px;
}

.message a {
  color: red;
  text-decoration: none;
  border-bottom: 1px dotted black;
}

.message a:hover {
  color: #ddd;
  border-bottom-color: #ddd;
}

        </style>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
	</head>
<body>
    <div id="backgroundImage">
      <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing system</font></marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font color="amber">Logout</a></font>
              </div>
          </div>
      </nav>
               
      <nav class="navbar navbar-default" style="background-image:url(images/bg1.jpg)">
          <div class="container-fluid">
            <div class ="col-md-12">    
                <div class="blog-masthead">
                    <ul class= "nav nav-pills nav-justified">
                      <li><a href="index.php">Home</a></li>
                      <li ><a href="products.php">Products</a></li>
                      <li><a href="billing.php">Billing</a></li>
                      <li><a href="t1.php">Ticketing</a></li>
                      <li ><a href="aboutus.php">About</a></li>
                      <li class="active"><a href="contact.php">Contact</a></li>
                    </ul>   
                </div>
            </div>
          </div>
      </nav>
          <div class="col-md-2"></div>
          <div class="col-md-8" style ="align:center">
              
              <h2 > Contact Form</h2>
              <h5> We will getback to you</h5>
              
             <form  method="POST" id="contact-form" >
                 <div id="error" ></div>
                 <div class="login-form" >
                   <div class="field" >
                    First Name:<input type="text" name="username" id="firstname" >
                   </div>
                     <div class="field" >
                    Last Name:<input type="text" name="username" id="lastname" >
                   </div>
                     <div class="field1" >
                    Email ID:<input type="text" name="username" id="email" >
                   </div><div class="field1" >
                    Phone:<input type="text" name="username" id="phone" >
                   </div>
                     <div class="field1" >
                    Message:<input type="text" name="username" id="message" >
                   </div>
                  <div class="button">
                  <button type="submit" name="btn-login" id="btn-login" value="submit"> 
                  Subit
               </button>
                     </div>
             </div>
        </form>
          </div>
          <div class="col-md-2"></div>

       

          
    </div>

  </body>
  </html>