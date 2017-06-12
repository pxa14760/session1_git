<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Getting Started with Bootstrap</title>
            <link href="css/bootstrap.css" rel="stylesheet">
            <!-- Custom styles for this template -->
            <link href="css/signin.css" rel="stylesheet">
            <!-- <link href="css/justified-nav.css" rel="stylesheet">-->
             <link href="css/login.css" rel="stylesheet">
             <style type="text/css">
                  body { background: #313D4C !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
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
                    -->
    <script src= "js/loginscript.js"></script>

      
</head>

<body>
   



	<div id="show-result" >
		<a href="create.php">create</a>
	</div>
	<script text/javascript >

	$(document).ready(function(){

		$("#create").click(function(){

			$.ajax({
    
                  type : 'POST',
                  url  : 'create.php',
                  beforeSend: function()
                  { 
                       window.alert("beforeSend function excecuting");
                      
                  },
                  success :  function(response)
                  {      
                     if(response=="ok")
                     {
                         window.alert("success function excecuting");
                        
                     else{
                         
                         window.alert("creating of table failed");
                     }
                  }
                });
                    return false;

		});

	});
	</script>
	</body>

</html>