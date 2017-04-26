<html>
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="applicants_style.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
require 'init.php';
require "navbar.php";
    echo $_SESSION["user"];
    echo $_SESSION["usertype"];
    
  
    ?>
<div class="container">
	<div class="well">
		<div class="row">
			<div class="col-sm-12">
				<h3>View Applicants</h3>
			</div>
		</div>
	</div>
</div>
<div class='container'>
	<div class='row'>
<?php    
require 'functions.php';
    $result1 = get_opps();  
    
echo "<div class='col-sm-2 sidenav'>
	<h4>Opportunities</h4>
	<ul class='nav nav-pills nav-stacked' id='opps'>";
      while( $row = $result1->fetch()){
            echo "<li><a>$row[0]</a></li>";
      };
                  //<li class='active'><a >#Title1</a></li>
		//#Title2
	
          echo "</ul>
	
		</div>
		
	";?>
		<div class="col-sm-10 list" id="c">
				<div class='container-fluid'>
					<div class='row'>
						<div class='col-sm-12 title' >
							<h4 id ="title">Cick on an opportunity to see its applicants</h4>
						</div>
					</div>
				</div><br>
                
                <div id= try></div>
				
			<!--<div class='container'><div class='row'><div class='col-sm-6'><a class='name'>Charles Acquah</a><br><a>Dublin Institute of Technology</a> <br/></div><div class='col-sm-6'><button class='btn btn-primary'>Accept</button><button class='btn btn-primary'>Decline</button</div></div></div><br>
				
				<div class='container'>
					<div class='row'>
						<div class='col-sm-6'>
							<a class='name'>David Hunt</a><br>
							<a>Beihang University</a> <br/>
						</div>
						<div class='col-sm-6'>
							<a href='' class='btn btn-primary' role='button'>Accept</a>
							<a href='' class='btn btn-primary' role='button'>Decline</a> 
						</div>
					</div//>

				</div>	-->		
			</div>
	</div>
</div>

<script>
$(document).ready(function(){
 
    $("#opps li").click(function(){//on('click','li',function(){
        //alert($(this).text());
        var title = $(this).text();
        $("#title").text(title);
        
        $.ajax({
            url : "get_applicants.php",
            type: 'GET',
            data: "name="+title,
            success: function(result){
                //alert("hb");
                //location.reload();
                //alert(result);
                //$("#c").append("asd");
                $("#c").append(result);
            }
        })
        
    });
    
});
</script>
</body>
</html>