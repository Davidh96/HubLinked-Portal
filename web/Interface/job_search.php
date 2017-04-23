<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="	"></script>		
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css">
        <script src="../jquery-3.1.1.min.js"></script>
        <script src="../jquery.js"></script>
	</head>
<body>
<?php
    require '../nav_bar_update.html';
?>
<div class="search_bar">
<nav class="navbar navbar-default" id="job_search_bar" >
  <div class="container-fluid" >
      <form class="navbar-form navbar-right" id="job_search">
          <input type="text" class="form-control " placeholder="Search by Field" name="job_field" id="job_field">
          <input type="text" class="form-control" placeholder="Search by Location" name="job_location" id="job_location">
          <input type="text" class="form-control" placeholder="Search by Company" name="job_company" id="job_company">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>  
      </form>
    </div>
</nav>
</div>
<!--
<nav class="navbar navbar-default" id = "search_bar" >
  <div class="container-fluid" >
	
	 <form class="navbar-form navbar-left" >
	 
        <div class="form-group" id = "Search_box">
          <input type="text" class="form-control" placeholder="Search by Skill, Company, Title">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
	</form>
	<form class = "navbar-form navbar-right" id = "Search_box"  >
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Search by Location">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
      </form>
	
	</div>
</nav>
-->
 <div class="container">
<div class="jumbotron">
<div id = "search_results"> X results found </div>
<div id = "sort_by"> Sort By : Date posted</div>


<form method="post" action="" enctype="multipart/form-data" id = "layout">
	
	
<div >

    <table width="200" class="table table-condensed">
		<tr>
			<td> Logo </td>
			<td> Name + posted a new job </td>
			<td> Click here for informaton </td>
			<td>Time </td>
		</tr>
		<tr>
			<td> Logo </td>
			<td> Name + posted a new job </td>
			<td> Click here for informaton </td>
			<td> Time </td>
		</tr>
	</table>
</div>
</form>
</div>
</div>    
</body>
</html>
