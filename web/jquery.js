//login user
$(document).ready(function(){
    
    $("#login_form").submit(function(e){
       e.preventDefault(e);
        var username = $("#login_username").val();
        var pass = 4("#login_password").val();
        var data = $("#login_form").serialize();
        $.ajax({
            url : "LoginUser.php";
            type: "POST";
            data: data;
            success: function(result){
            
        }
        })
    });
    
});