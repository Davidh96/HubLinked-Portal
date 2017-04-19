//login user
$(document).ready(function(){
    //alert("ad");
    
   // when the submit button is clicked 
   $("#login_form").submit(function(e){
        //alert("asd");
        e.preventDefault(e);//preventing the page from refreshing
        var data = $("#login_form").serialize();//getting the data from the login form
       //using ajax to send the form data to php page to check if user exists 
       $.ajax({
           url : "LoginUser.php",
           type: "POST",
           data: data,
           success: function(result){
            if(result){//if the user does not exist
                alert("in r");
                //   $("#login_error").css("display","inline");
            }
            else{//if the user exists   
            }
        }
        })
   });
    
});

