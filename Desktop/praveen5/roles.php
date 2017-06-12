<?php
session_start();

if(!isset($_SESSION['user_session']))
{

 header("Location: index.php");

}
else if (isset($_SESSION['user_session']))
{

include_once 'db4.php';
$rle ="admin";

$stmt = $db_con->prepare("SELECT role FROM login WHERE username=:username");
$stmt->execute(array(":username"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
 foreach ($row as $value) 
 	if($value !== $rle){
 		header("Location: billing.php");	
 	}
 $stmt = $db_con->prepare("SELECT * FROM login WHERE username=:username");
$stmt->execute(array(":username"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

}
?>

<!DOCTYPE html>
<html>
		<head>
			  <title>Roles Page</title>
			  <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link href="css/bootstrap.css" rel="stylesheet">
              <link href="css/login.css" rel="stylesheet">
              <style type="text/css">
              	/*body { background: #F0F8FF !important; }*/
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
    background-size: 100% 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }


              	/* Sidebar navigation */
.sidebar {
  display: none;
  color :#2F4F4F;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 70px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 50px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #008B8B;
    border-right: 1px solid #eee;

  }
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

                    
h2,
.h2 {
  font-size: 30px;
  color: #000;
}
.main {
  padding: 20px;
  text-align: center;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
    text-align: center;
  }
}
.main .page-header {
  margin-top: 0;
}

  .login-form  {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle;
    width:  auto;
  
}

 .login-form .field {
  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
  padding: 5px;
  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
  border-radius: 3px;
  margin-bottom: 9px;
  display: inline-block;
}

 .login-form .field input {
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
  display: inline-block;
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

.table-bordered{
     border-width: 1px;
    border-style: double;
        border-color: black;                
    color: black;
                  }                  

.table-bordered > tbody > tr:nth-of-type(odd) {
  background-color: #fff;
   border-width: 1px;
    border-style: double;
    border-color: black;
}
.table-bordered > tbody > tr:nth-of-type(even) {
  background-color: #ccc;
   border-width: 1px;
    border-style: double;
        border-color: black;
        
}
.table-bordered > th {
    background-color: #ccc;
    color: blue;
    border-width: 2px;
    border-style: double;
     border-color: black;
}
.table-bordered > td{
  border-width: 2px;
    border-style: double;
 border-color: black;

}.table-bordered{
     border-width: 1px;
    border-style: double;
        border-color: black;                
    color: black;
                  }                  

.table-bordered > tbody > tr:nth-of-type(odd) {
  background-color: #fff;
   border-width: 1px;
    border-style: double;
    border-color: black;
}
.table-bordered > tbody > tr:nth-of-type(even) {
  background-color: #ccc;
   border-width: 1px;
    border-style: double;
        border-color: black;
        
}
.table-bordered > th {
    background-color: #ccc;
    color: blue;
    border-width: 2px;
    border-style: double;
     border-color: black;
}
.table-bordered > td{
  border-width: 2px;
    border-style: double;
 border-color: black;

}

              </style>

              <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
              
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
</head>
<body>

	<body>
        <div id="backgroundImage">
      <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing system</font></marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font color="#2F4F4F">Logout</a></font>
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
                      <li ><a href="billing.php">Billing</a></li>
                      <li><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
                </div>
            </div>
          </div>
      </nav>

      <div class="login-form">

      	<div class="field">

      		<button type="submit" id="roles" name="roles"><font color="#ffffff"> Edit Roles</font> </button>


      	</div>

      </div>

     <div class="row">
        <div id="div1" class ="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
           <div class="table-responsive">
            <table class="table table-bordered" border="1">
              <div id="table" align="center"></div>
              <div id="error" align="center" class="message"></div>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
      	<div class ="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      	<div class="table-responsive" >  
      		<table class="table table-bordered" border="1">
                       
                     <div id="live_data" style="display:none;"></div>                 
                </div> 
            </table>
        </div>
      </div>
          </div>
        </div>

<script type="text/javascript">
$(document).ready(function(){
                

                  $("#roles").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "roles":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });
                    
                   $('#live_data').fadeIn();  
                  });
                  });


</script>
<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var username = $('#username').text();  
           var password = $('#password').text();
           var role = $('#role').select();  
           if(username == '')  
           {  
                alert("Enter username");  
                return false;  
           }  
           if(password == '')  
           {  
                alert("Enter password");  
                return false;  
           }  
            if(role == '')  
           {  
                alert("role");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{username:username, password:password, role:role},  
                 dataType:"text",
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.password', function(){  
           var id = $(this).data("id1");  
           var password = $(this).text();  
           edit_data(id, password, "password");  
      });  
      $(document).on('blur', '.role', function(){  
           var id = $(this).data("id2");  
           var role = $(this).text();  
           edit_data(id,role, "role");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id =$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>  



</body>
</html>