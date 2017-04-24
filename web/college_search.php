<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="	"></script>		
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css" type="text/css">
	</head>
<body>
<?php
    require 'nav_bar_update.html';
?>
<nav class="navbar navbar-default" id="college_search_bar" >
  <div class="container-fluid" >
      <form class="navbar-form navbar-right">
          <input type="text" class="form-control " placeholder="Search by Course">
          <input type="text" class="form-control" placeholder="Search by Location">
          <input type="text" class="form-control" placeholder="Search by College">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
 </form>
	<!--
	 <form class="navbar-form navbar-left" >
	 
        <div class="form-group" id = "Search_box">
		
          <input type="text" class="form-control " placeholder="Search by Course">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
	</form>
	<form class = "navbar-form navbar-right" id = "Search_box"  >
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Search by Location">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
      </form>
	  <form class = "navbar-form navbar-right" id = "Search_box"  >
		<div class="form-group">
          <input type="text" class="form-control" placeholder="Search by College Name">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span> Search</button>
      </form>
	-->
	</div>
</nav>

 <div class="container">
<div class="jumbotron">
<div id = "search_results"> X results found </div>
<div id = "sort_by"> Sort By : Date posted</div>


<form method="post" action="" enctype="multipart/form-data" id = "layout">
	
	
<div >

    <table width="200" class="table table-condensed">
		<tr>
			<td> Logo </td>
			<td> Name of college + course </td>
			<td> Click here for informaton </td>
			<td>Time </td>
		</tr>
		<tr>
			<td> Logo </td>
			<td> Name of college + course  </td>
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
