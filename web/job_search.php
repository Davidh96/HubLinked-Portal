<!--
THIS PAGE DEALS WITH DISPLAYING SEARCH RESULTS
-->
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src=" "></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="style.css">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="jquery.js"></script>
    </head>
<body>
<?php
    require 'navigationbar.php';
    require 'functions.php';

    /*
    Search is formatted like this as each search field is individual when "submit" is clicked
    */
    global $myPDO;
    $company = $_GET["company"];
    $loc = $_GET["location"];
    $industry = $_GET["field"];

    if(isset($_GET["company"]) && $_GET["company"]!="") {
        //search by company
        echo 'searching by company';
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE comp_name LIKE '%$company%'");
    }
    if(isset($_GET["field"])  && $_GET["field"]!="") {
        //search by opportunity field
        echo 'searching by field of industry';
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id WHERE op_type LIKE '%$industry%'");
    }
    if(isset($_GET["location"]) && $_GET["location"]!="") {
        echo 'searching by job location';
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE loc_name LIKE '%$loc%'");
    }
    else{
        //else output all
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id)");
    }

//OUTPUTS SEARCH RESULTS
echo '
<div class="search_bar">
<nav class="navbar navbar-default" id="job_search_bar" >
  <div class="container-fluid" >
      <form class="navbar-form navbar-right" id="job_search">
          <input type="text" class="form-control " placeholder="Search by Field" name="field" id="job_field">
          <input type="text" class="form-control" placeholder="Search by Location" name="location" id="job_location">
          <input type="text" class="form-control" placeholder="Search by Company" name="company" id="job_company">
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
            <td> company</td>
            <td>title</td>
            <td>location</td>
            <td> Click here for informaton </td>
        </tr>';
        while ($row = $stmt->fetch()){
        echo "<tr>
            <td> $row[1]</td>
            <td>$row[0]</td>
            <td>$row[2]</td>
            <td> Click here for informaton </td>
        </tr>";
            }
echo '
    </table>
</div>
</form>
</div>
</div>

';?>
</body>
</html>
