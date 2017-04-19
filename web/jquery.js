//login user
$(document).ready(function(){
    //alert("ad");
    
    //when the submit button is clicked 
   $("#login_form").submit(function(e){
        
        e.preventDefault(e);//preventing the page from refreshing
        var data = $("#login_form").serialize();//getting the data from the login form
        
       //using ajax to check if the user exists 
       $.ajax({
           url : "LoginUser.php",
           type: "POST",
           data: data,
           success: function(result){
           alert(result);
            if(result){//if the user does not exist
             $("#login_error").css("display","inline");
            }
            else{//if the user exists
               
            }
        }
        })
    });
    
});

//register user
$(document).ready(function(){
   
    $("#register_form").submit(function(e){
        e.preventDefault(e);
        var data = $("register_form").serialize();
        alert(data);
        $.ajax({
            url: "RegisterUSer.php",
            type: "POST",
            data: data,
            success: function(result){
            
        }
        })
    });
    
});