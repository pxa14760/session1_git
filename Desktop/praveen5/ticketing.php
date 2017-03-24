<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: t1.php");
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
            <title>Billing Test Page</title>
            <link href="css/bootstrap.css" rel="stylesheet">
             <link href="css/login.css" rel="stylesheet">
            <style type="text/css">
            /*body { background: #FFFFFF !important; } */
            /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
                       
           
                 /*
 * Base structure
 */
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
    background-size: 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }   

.main {
  font-size: 18px;
  line-height: 1.5;
  padding: 15px;
  margin-top: 50px;
}

/* Hide for mobile, show later */
.sidebar {
  display: none;
  color :#2F4F4F;
}
@media (min-width: 768px) {
  .sidebar {
    position: relative;
    top: 70px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #40E0D0;
    border-right: 1px solid #eee;

  }
}
                

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > a,
.nav-sidebar > li> a:hover,
.nav-sidebar > li> a:focus {
  color: #fff;
 background-color: royalblue;
}
.nav-sidebar > li > a
 {
  
 color: whitesmoke;
     font-size: 20px;
  
}

.btn-group :hover{
   color: #000;
 background-color: #2F4F4F !important; 
                    
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

}


/*
 * Main content
 */


               
            </style>
             <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                <!--  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/additional-methods.min.js"> </script>-->
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
             
</head>
      <body>
    <div id= "backgroundImage">
        <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing                               system</font></marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font                      color="amber">Logout</a></font>
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
                      <li class="active"><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
                 </div>
             </div>
           </div>
         </nav>
            
    <div class="container-fluid">
      <div class="row">
                 <div class="col-sm-3 col-md-2 sidebar" style="background-image:url(images/bg1.jpg)">
                      <ul class="nav nav-sidebar">
                        <li><a class="btn-group btn-group-justified" type="submit" id="tr">Tickets Report</a></li>
                        <li><a class="btn-group btn-group-justified" type="submit" id="ct">Create Ticket </a></li>
                        <li><a class="btn-group btn-group-justified" type="submit" id="ut" >Update/Close Ticket</a></li>

                      </ul>
                      <ul class="nav nav-sidebar">
                        <li><a href="">Nav item</a></li>

                      </ul>
                      <ul class="nav nav-sidebar">
                        <li><a href="">Nav item again</a></li>

                      </ul>
                </div>
                <div class="col-md-10">
            
                    <div class="row">
                        <div class="col-md-10">

                       <div id="div1" style="display:none;" >
                    
                      <form id="create_ticket"  method="POST">
                        
                         <div class="login-form">
                          <h4><font color="#008B8B">Create Ticket</font></h4>
                         <div class="field">
                        <?php
                            $servername = "localhost";
                           $username = "root";
                            $password = "";
                           $dbname = "asp";

                            // Create connection
                           $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                               die("Connection failed: " . $conn->connect_error);
                            } 
                          $sql = "SELECT C_id FROM customers";

                              
                              $result = $conn->query($sql);
                            echo "Account ID:<select name='C_id' class='form-control'>";
                            while ($row=$result->fetch_assoc()) {
                               echo "<option  value='" . $row['C_id'] ."'>" . $row['C_id'] ."</option>";
                            }
                            echo "</select>";
                            $conn->close();
                            ?>
                          </div>

                            <div class= "field">
                            Status: <select name="status" class="form-control">
                                        <option value="open">Open</option>
                                        <option value="pending">Pending</option>
                                        <option value="close">Close</option>
                                        
                                    </select>
                                  </div>
                                 <div class="field">
                            Severity: <select name="severity" class="form-control">
                                        <option value="Low">Low</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Hign">High</option>
                                        
                                      </select>
                                    </div>
                            <div class="field">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "asp";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                           } 
                          $sql = "SELECT username FROM login";

                              
                            $result = $conn->query($sql);
                            echo "Assign to:<select name='username' class='form-control'>";
                            while ($row=$result->fetch_assoc()) {
                               echo "<option  value='" . $row['username'] ."'>" . $row['username'] ."</option>";
                            }
                            echo "</select>";
                           $conn->close();
                            ?>
                          </div>
                            <div class="field">
                                  Problem : <input type="text" id="problem" name="problem" class="form-control">
                            </div>
                           <div class="field">
                                  Description : <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                            </div >
                            <div class="button">
                                  <button type="submit" id="submit" name="submit" class="btn btn-default"> Submit</button> 
                                </div>
                          </div>
                      </form>
                  </div>
                 </div>
                    </div>
                    <div class="row">
                  <div id="div2" class="col-md-10" style="display:none;">
                    
                    <div class="table-responsive">
                      <h4><font color="#008B8B"> Ticket Report</font></h4>
                      <table class="table table-bordered" border="1">
                        <div id="table" align="center"></div>
                        <div id="error1" align="center" ><font color="#2F4F4F"></font></div>
                      </table>
                    </div>
                  </div>
                    </div>
                    <div class="row">
                    <div id="div3"  class = "col-md-10" style="display:none;">
                    <div class="table-responsive">
                      <h4><font color="#008B8B">Update</font></h4>
                      <table class="table table-bordered" border="1">
                        <div id="table2" align="center"></div>
                        <div id="error1" align="center" ><font color="#2F4F4F"></font></div>
                      </table>
                    
                    
                       <form method="POST" id="update">
                          <div class="login-form">
                            <div class="field">
                                  Ticket NO : <input id="ticketno" name="ticketno" class="form-control" />
                            </div >
                            <div class="button">
                                  <button type="submit" id="submit" name="submit" class="btn btn-default"> Submit</button> 
                                </div>

                          </div>
                        </form>
                      </div>
                      
                    </div>
                    </div>
                
                  
                  
                  </div>
                </div>
            </div>

        
          
    </div>
         
     
    
      <script type="text/javascript">
                   $('document').ready(function()
            { 
               /* validation */
               $("#create_ticket").validate({
                   rules:
                {
                   
                   username: {
                   required: true,
                   },
                },
                   messages:
                {
                   
                      lname: "please enter your email address"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#create_ticket").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'create_ticket.php',
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


                $("#ct").click(function(){
                    $("#div1").toggle();
                }); 

                          
                   
            
             
           

             $("#tr").click(function(){

                    $("#div2").toggle();
                       

                    $.ajax({
                      url: "is.php",
                      type: "POST",
                      async: false,
                      data: {
                        "tr":1
                      },
                      success:function(d){
                        $("#table").html(d);

                      }

                    });

                  });
              });

</script>
<script type="text/javascript">
$("#ut").click(function(){

                    $("#div3").toggle();
$('document').ready(function()
            { 
             
               $("#update").validate({
                   rules:
                {
                   
                   ticketno: {
                   required: true,
                   },
                },
                   messages:
                {
                   
                      ticketno: "please enter your email address"
                },
                submitHandler: submitForm 
                });  
               /* validation */
    
               /* login submit */
              function submitForm()
             { 

                var data = $("#update").serialize();
    
                $.ajax({
    
                  type : 'POST',
                  url  : 'is.php',
                  data : data,
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      
                  },
                  success :  function(d)
                  {      

                    $("#table2").html(d); 
                  }
                });
                    return false;
              }/* Submit form closing
                    /* login submit */
             });

      });  
</script>
     
      
      </body>
</html>