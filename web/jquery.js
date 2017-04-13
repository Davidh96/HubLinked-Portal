//login user
$(document).ready(function(){
    //alert("ad");
    
   $("#login_form").submit(function(e){
        //alert("asd");
        e.preventDefault(e);
        var username = $("#login_username").val();
        //var pass = 4("#login_password").val();
        var data = $("#login_form").serialize();
        //alert(data);
       $.ajax({
           url : "LoginUser.php",
           type: "POST",
           data: data,
           success: function(result){
           alert(result);
            if(result){
             $("#login_error").css("display","inline");
            }
            else{
               
            }
        }
        })
    });
    
});

//register user