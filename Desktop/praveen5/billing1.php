<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: index.php");
}

include_once 'db4.php';

$stmt = $db_con->prepare("SELECT * FROM login WHERE username=:username");
$stmt->execute(array(":username"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Getting Started with Bootstrap</title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <!-- <link href="css/login.css" rel="stylesheet"> -->
			<style type="text/css">
   body { background: #F0F8FF !important; }
    /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
      



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

.table-bordered{
                    
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
  display: inline-block;
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
  color: #bbb;
  font-size: 13px;
  text-align: center;
  margin-top: 80px;
}

.message a {
  color: #bbb;
  text-decoration: none;
  border-bottom: 1px dotted #bbb;
}

.message a:hover {
  color: #ddd;
  border-bottom-color: #ddd;
}

    
</style>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
              
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
           <script type="text/javascript">
                   $('document').ready(function()
            { 
               /* validation */
               $("#search_form").validate({
                   rules:
                {
                   
                   search_box: {
                   required: true,
                   },
                },
                   messages:
                {
                   
                      search_box: "please enter your email address"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#search_form").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'search.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      
                  },
                  success :  function(response)
                  {      

                     $("#error").html(response);
                     if(response=="Ticket Created Successfully")
                     {
                        $("#div1").fadein();
                     }
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
           });
</script>
</head>

<body>
      <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing system</font></marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font color="#2F4F4F">Logout</a></font>
              </div>
          </div>
      </nav>
               
      <nav class="navbar navbar-default" >
          <div class="container-fluid">
            <div class ="col-md-12">    
                <div class="blog-masthead">
                    <ul class= "nav nav-pills nav-justified">
                      <li><a href="index.php">Home</a></li>
                      <li ><a href="products.php">Products</a></li>
                      <li class="active"><a href="billing.php">Billing</a></li>
                      <li><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
                </div>
            </div>
          </div>
      </nav>
 
 
      <!--<div class="col-sm-3 col-md-2 sidebar">-->
    <!--     <div style="border-style:outset; background-color:#C0C0C0;">
          <ul class="nav nav-justified">
            <li class="classic"><a class="btn-group btngroup-justified" type="submit" id="customer">Customer Data </a></li>
            <li><a class="btn-group btn-group-justified" type="submit" id="invoice">Invoice</a></li>
            <li><a class="btn-group btn-group-justified" type="submit" id="is" >Internet Service</a></li>
            <li><a class="btn-group btn-group-justified" type="submit" id="hs" >Hosting Service</a></li>
            <li><a class="btn-group btn-group-justified" type="submit" id="ip" >IP Blocks</a></li>
            
          </ul>
        </div>-->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                       <ul class="nav nav-sidebar">
            
                            <li><a class="btn-group btngroup-justified" type="submit" id="customer"><font color="#2F4F4F">Customer Data </font></a></li>
                          <li><a class="btn-group btn-group-justified" type="submit" id="invoice"><font color="#2F4F4F">Invoice</font></a></li>
                          <li><a class="btn-group btn-group-justified" type="submit" id="is" ><font color="#2F4F4F">Internet Service</font></a></li>
                          <li><a class="btn-group btn-group-justified" type="submit" id="hs" ><font color="#2F4F4F">Hosting Service</font></a></li>
                          <li><a class="btn-group btn-group-justified" type="submit" id="ip" ><font color="#2F4F4F">IP Blocks</font></a></li>
                       </ul>
                       <ul class="nav nav-sidebar">
                           <li><a href=""><font color="#2F4F4F">Nav item</font></a></li>
           
                       </ul>
                       <ul class="nav nav-sidebar">
                            <li><a href=""><font color="#2F4F4F">Nav item again</font></a></li>
           
                        </ul>
            </div>
          <div class="row">
            <div id="div1" class ="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" > 
              

              <form id="search_form" method="POST" >
                    <div class="login-form">
                      <div class="field">

                                           Table: <select name="tablename"  ><font color="#000000">
                                                    <option value="customers">customers</option>
                                                    <option value="hosting">hosting</option>
                                                    <option value="internet_service">internet_service</option>
                                                    <option value="ip_service">ip_service</option>
                                                    <option value="login">login</option>
                                                    <option value="tickets">tickets</option>
                                                    <option value="invoice">invoice</option>
                                             </font></select>
                      </div>
                      <div class="field">  column: <input type ="text" name="column " id="column"  value=""/></div>
                      <div class="field with-btn">  Search: <input type ="text" name="search_box" id="search_box"  value=""/> </div>

                       <button type="submit" name="search" id="search" class="btn btn-default" value="search the table">search</button></div>
                  
              </form>
             
            </div>
          </div>

      <div class="row">
        <div id="div1" class ="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
           <div class="table-responsive">
            <table class="table table-bordered" border="1">
              <div id="table" align="center"></div>
              <div id="error" align="center"></div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
         <!-- <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>-->
            <script type="text/javascript">
              $(document).ready(function(){
                

                  $("#is").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "internet":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });

                  $("#hs").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "hosting":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });
                  $("#ip").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "ip":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });
                  $("#customer").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "customer":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });
              
                    $("#invoice").click(function(){

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "invoice":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });
             
              });
          
            </script>
           
           
      </body>
</html>


