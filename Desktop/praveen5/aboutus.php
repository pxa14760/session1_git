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
            /*body { background: #FFFFFF !important; } *//* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
             #backgroundImage{z-index: 1;}

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
        
          .sidebar {
  display: none;
  color :#2F4F4F;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 125px;
    bottom: 480px;
    right: 0;
    z-index: 1000;
    display: block;
    padding: 50px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #008B8B;
    border-right: 1px solid #eee;

  }


/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
 background-color: #2F4F4F;
}
.nav-sidebar > li > a
 {
  
  
  padding-right: 20px;
  padding-left: 20px;
}

.footer{
  position: absolute;
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
                      <li class="active"><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
                </div>
            </div>
          </div>
      </nav>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-10 main"><font color="#008B8B">
                    <p>I Praveen Reddy Arumalla, developed Billing and ticketing system as Part of Advanced Systems Project Course. </p>
                    <p>Billing and Ticketing System is a Web Template for Internet Service Providers developed by using HTML5, CSS3, BBOOTSTRAP, JavaScript, Jquery, AJAX, PHP, MySQL.</p>

                  </font>
              </div>
     
              </div>
          </div>
      

    
           

          </div>

  </body>
  </html>