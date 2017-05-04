//login user
$(document).ready(function(){
    
   // when the submit button is clicked 
   $("#login_form").submit(function(e){
        e.preventDefault(e);//preventing the page from refreshing
        var data = $("#login_form").serialize();//getting the data from the login form
        //using ajax to send the form data to php page to check if user exists 
       $.ajax({
           url : "LoginUser.php",
           type: "POST",
           data: data,
           success: function(result){
            if(result > 0){//if the user does not exist
                $("#login_error").css("display","inline");
            }
            else{//if the user exists  
                $("#login_error").css("display","inline");
                window.location.href ="index.php?"
            }
        }
        })
   });
    
      $("#infochange").click(function(){
          alert("an email with the link to change has been sent");   
    });
});

