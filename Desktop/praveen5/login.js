$("button#submit").click(function() {
	
	if($("#username").val()==""|| $("#password").val()=="")
  $("div#ack").html("Please enter both username and password");

   else 
   $.post($("#myForm").attr("action"),
      $("#myForm:input").serialzeArray(),
      function(data){
      	$("div#ack").html(data);
      });
   $("#myForm").submit(function(){
	return false;
});
});
