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
        <title>Products</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">
        <link href="css/button.css" rel="stylesheet">
        <style type="text/css">
           /* body { background: #FFFFFF !important; }*/ /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
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
    background-size:100% 100%;
    opacity: 0.4;
    filter:alpha(opacity=40);
    height:100%;
    width:100%;
 }
            
            #data {
                height: 320px;
                width: 200px;
                 border: 2px solid;
                border-radius: 8px;
                border-color: gray;
                color: violet;
                padding: 10px;
                margin: 10px;
                text-align: center;
            }
            #data:hover {
                 border: 5px solid;
                border-color: black;
                color: red;
                padding: 10px;
                background-color:gainsboro;
            }
                        #data>p{
                                  color: darkslategray;
                        }
                 #data>p:hover{
                                  color: rebeccapurple;
                                }
            
                        h2,
                           .h2 {
                                  font-size: 20px;
                                  color: #c0c0c0;
                                  margin: 50px;
                                }
            .login-form .field {
                                  background: linear-gradient(#fa7f2d, #ff6600, #fa7f2d);
                                  padding: 5px;
                                  box-shadow: inset 0 1px #fab587, 0 3px 3px #222;
                                  border-radius: 3px;
                                  margin-bottom: 9px;
                                  display: inline-block;
                                }
        </style>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/pregistration.js"></script>
        <script>
                $(document).ready(function(){
                    $("#ds").click(function(){
                        $("#internet").toggle();
                    }); 
                    $("#hs").click(function(){
                        $("#hosting").toggle();
                    });
                    $("#ips").click(function(){
                        $("#ip").toggle();
                    });

                });
        </script>
   
	</head>
<body>
    <div id="backgroundImage">
      <nav class="navbar navbar-inverse navbar-static-top" role = "navigation"  >
          <div class="container-fluid">
              <div class="col-md-8">
                  <marquee behavior="scroll" direction="left" color="#000000"><font color="#FFFFFF"> Welcome to billing and ticketing                                   system</font>
                  </marquee>
              </div>
              <div class="col-md-4" align="right"><font color="#FFFFFF">logged in as <?php echo "$row[username]" ?> <a href="logout.php"><font                       color="amber">Logout</a></font>
              </div>
          </div>
      </nav>
               
      <nav class="navbar navbar-default" style="background-image:url(images/bg1.jpg)" >
          <div class="container-fluid">
            <div class ="col-md-12">    
                
                    <ul class= "nav nav-pills nav-justified">
                      <li><a href="index.php">Home</a></li>
                      <li class="active"><a href="products.php">Products</a></li>
                      <li><a href="billing.php">Billing</a></li>
                      <li><a href="t1.php">Ticketing</a></li>
                      <li><a href="aboutus.php">About</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>   
             
            </div>
          </div>
      </nav>
       
             <div class="row">
                    <div class="col-md-12" style="margin:40px">
                      <div id="error" align="center">
                      </div>
                        <div class="row">
                        <div class="col-md-2" >
                        <div class="login-form">
                        <div class="field">
                            <button type="submit" id="ds"><font color="#ffffff"> Data Service</font> </button></br>
                            
                        </div>
                        </div>
                        </div>
                        <div id="internet" style="display:none;">
                        <div id="data" class="col-md-2" style="background-color:#B8860B">
                            
                            
                          
                            <p><font color="Royalblue" size="5px">Bronze</font></p>
                            <p>$<span style="font-size:250%">25</span>.99</br>
                                  FOR THE FIRST
                            6 MONTHS</br>
                                    Performance starter

                                    </br><span style="font-size:300%">25</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                            <button class="button" type="submit" id="bronze" ><p>Buy</p></button>
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#C0C0C0">
                            
                                <p><font color="Royalblue" size="5px">Silver</font></p>
                                <p>$<span style="font-size:250%">35</span>.99</br>
                                    FOR THE FIRST
                                    6 MONTHS</br>
                                    Performance

                                    </br><span style="font-size:300%">60</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                            <button class="button" type="submit" id="silver" ><p>Buy</p></button>
                           
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#DAA520">
                            
                            <p><font color="Royalblue" size="5px">Gold</font></p>
                                <p>$<span style="font-size:250%">77</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">120</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                          <button class="button" type="submit" id="gold" ><p>Buy</p></button>
                        </div>
                                <div id="data" class="col-md-2" style="background-color:#DCDCDC">
                            
                                <p><font color="Royalblue" size="5px">Platinum</font></p>
                                <p>$<span style="font-size:250%">99</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">160</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                          <button class="button" type="submit" id="platinum" ><p>Buy</p></button>
                        </div>
</div>
                       </div>
                    <div class="row">
                        <div class="col-md-2">
                        <div class="login-form">
                        <div class="field">
                            <button type="submit" id="hs"><font color="#ffffff"> Hosting Service</font> </button></br>
                            
                        </div>
                        </div>
                        </div>
                        <div id="hosting" style="display:none;">
                        <div id="data" class="col-md-2" style="background-color:#B8860B">
                            
                            
                          
                            <p><font color="Royalblue" size="5px">Host1</font></p>
                            <p>$<span style="font-size:250%">25</span>.99</br>
                                  FOR THE FIRST
                            6 MONTHS</br>
                                    Performance starter

                                    </br><span style="font-size:300%">25</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                            <button class="button" type="submit" id="host1" ><p>Buy</p></button>
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#C0C0C0">
                            
                                <p><font color="Royalblue" size="5px">Host 2</font></p>
                                <p>$<span style="font-size:250%">35</span>.99</br>
                                    FOR THE FIRST
                                    6 MONTHS</br>
                                    Performance

                                    </br><span style="font-size:300%">60</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                           <button class="button" type="submit" id="host2" ><p>Buy</p></button>
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#DAA520">
                            
                            <p><font color="Royalblue" size="5px">Host 3</font></p>
                                <p>$<span style="font-size:250%">77</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">120</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                          <button class="button" type="submit" id="host3" ><p>Buy</p></button>
                        </div>
                                <div id="data" class="col-md-2" style="background-color:#DCDCDC">
                            
                                <p><font color="Royalblue" size="5px">Host 4</font></p>
                                <p>$<span style="font-size:250%">99</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">160</span> Mbps</br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                          <button class="button" type="submit" id="host4" ><p>Buy</p></button>
                        </div>
                        </div>
                        
                        
                       </div>
                        <div class="row">
                        <div class="col-md-2">
                            <div class="login-form">
                        <div class="field">
                            <button type="submit"id="ips"><font color="#ffffff"> IP Service</font> </button></br>
                            
                        </div>
                        </div>
                            </div>
                    <div id="ip" style="display:none;">
                        <div id="data" class="col-md-2" style="background-color:#B8860B">
                            
                            
                          
                            <p><font color="Royalblue" size="5px">/30 block</font></p>
                            <p>$<span style="font-size:250%">25</span>.99</br>
                                  FOR THE FIRST
                            6 MONTHS</br>
                                    Performance starter

                                    </br><span style="font-size:300%">4</span></br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                            <button class="button" type="submit" id="ip30" ><p>Buy</p></button>
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#C0C0C0">
                            
                                <p><font color="Royalblue" size="5px">/29 block</font></p>
                                <p>$<span style="font-size:250%">35</span>.99</br>
                                    FOR THE FIRST
                                    6 MONTHS</br>
                                    Performance

                                    </br><span style="font-size:300%">8</span></br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                           <button class="button" type="submit" id="ip29" ><p>Buy</p></button>
                        </div>
                        <div id="data" class="col-md-2" style="background-color:#DAA520">
                            
                            <p><font color="Royalblue" size="5px">/28 block</font></p>
                                <p>$<span style="font-size:250%">77</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">16</span></br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                          <button class="button" type="submit" id="ip28" ><p>Buy</p></button>
                        </div>
                                <div id="data" class="col-md-2" style="background-color:#DCDCDC">
                            
                                <p><font color="Royalblue" size="5px">/27 block</font></p>
                                <p>$<span style="font-size:250%">99</span>.99</br>
                                    FOR THE FIRST
                            6 MONTHS</br>
                                    Extreme

                                    </br><span style="font-size:300%">32</span></br>
                                    Access to 100,000 wifi
                                    hotspots at no
                                    extra cost
                                </p>
                            <button class="button" type="submit" id="ip27" ><p>Buy</p></button>
                        </div>
                        </div>
                        
                       </div>
                    </div>
</div>
<div class="row">
                    <div class="col-md-2" >
                      <h2><font color="#008B8B">Register For Service</font></h2>

                      <form id="product_registration" method="POST">
                        <div class="login-form">
                          
                        
                            <div class="field" >
                           <!-- <div class="form-group">-->
                                  Account No : <input type="text" id="c_id" name="c_id" class="form-control">
                            </div><br>
                            <div class="field" >
                                  Password : <input type="password" id="password" name="password" class="form-control" ><br>
                            </div ><br>
                            <div class="field" >
                            <?php
                            $sql2 = $db_con->prepare("SELECT I_Name FROM internet_service");
                            $sql2->execute();
                            echo "internet service:<select name='I_Name' class='form-control'>";
                            while ($row1=$sql2->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option  value='" . $row1['I_Name'] ."'>" . $row1['I_Name'] ."</option>";
                            }
                            echo "</select>";
                            

                            $sql3 = $db_con->prepare("SELECT H_Name FROM hosting");

                             $sql3->execute(); 
                              
                            echo "Hosting:<select name='H_Name' class='form-control'>";
                            while ($row3=$sql3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option  value='" . $row3['H_Name'] ."'>" . $row3['H_Name'] ."</option>";
                            }
                            echo "</select>";

                            $sql4 = $db_con->prepare("SELECT ip_Name FROM ipblocks");
                             $sql4->execute(); 
                                    
                            echo "ipblocks:<select name='ip_Name' class='form-control'>";
                            while ($row4=$sql4->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option  value='" . $row4['ip_Name'] ."'>" . $row4['ip_Name'] ."</option>";
                            }
                            echo "</select>";
                            
                            ?>
                            <div>
                            <br>
                                <div>
                                        <button type="submit" id="submit" name="submit" class="btn btn-default"> Submit</button> <br><br>
                                </div>    
                            </div>
                            <br>
                            </div>
                          </div>
                    </form>
                    
                       
                </div>//for div registration
                 </div>//for row class
</div>//for id backgroundImage

            
     

		
         


</body>
</html>