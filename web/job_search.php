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
    require 'nav_bar_update.html';
    require 'functions.php';

    //IF _ AND _ ARE NOT NULL THEN CHECK IF THE FIELD IS NULL
    if(isset($_GET["company"]) && $_GET["company"]!=""){
        global $myPDO;
        $company = $_GET["company"];
        //CHECKS IF THE FIELD IS NULL
        if( isset($_GET["field"])  && $_GET["field"]!=""){
            $field = $_GET["field"];
            //IF THE LOCATION IS NOT NULL
            if(isset($_GET["location"]) && $_GET["location"]!=""){
                //RETURNS JOB OP WHERE COMPANY = ENTERED COMPANY FIELD, LOCATION = ENTERED LOCATION FIELS, OPPORTUNITY TYPE = SEARCHED FIELD
                $loc = $_GET["location"];
                $stmt = $myPDO->query("SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE comp_name LIKE '%$company%' AND loc_name LIKE '%$loc%' AND op_type LIKE '%$field%'");
                echo "ad";
            }else{
                //IF LOCATION IS NULL THEN SEARCH FOR THE OP DETAILS WHERE THE COMPANY NAME IS LIKE USER ENTERED COMPANY AND THE OPPORTUNITY TYPE IS JUST LIKE THE SEARCHED FIELD
                 $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id WHERE comp_name LIKE '%$company%' AND op_type LIKE '%$field%'");
                echo "field + company";
            }
        } //end inner if
        // end middle if
        //IF LOCATION FIELD IS NOT NULL THEN SEARCH FOR OP DETAILS BASED ON COMPANY 
        //USER ENTERED FIELD AND USER ENTERED LOCATION FIELD 
        else if(isset($_GET["location"]) && $_GET["location"]!=""){
             $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE comp_name LIKE '%$company%' AND loc_name LIKE '%$loc%'");
            echo " company + location";
        }
        else {
            //ELSE, SEARCH FOR OP WHERE COMPANY NAME LIKE DATA ENTERED
            $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE comp_name LIKE '%$company%'");
            echo "company";
            }
    }
    //does field mean opportunity type?
    //IF OP TYPE IS NOT NULL
    else if(isset($_GET[""]) && $_GET["field"]!=""){
        //IF LOCATION IS NOT NULL, SEARCH BASED ON OP TYPE
        if(isset($_GET["location"]) && $_GET["location"]!=""){
            $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id WHERE op_type LIKE '%$field%'");
                //why are we outputting location?
            echo "field + location";
        }
        else{
            //ELSE SEARCH BASED ON FIELD
            $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE op_type LIKE '%$field%'");
            echo "field";
        }
        
    }
    //IF LOCATION NOT NULL
    else if(isset($_GET["location"]) && $_GET["location"]!=""){
        //search by location
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id) WHERE loc_name LIKE '%$loc%'");
                echo "ad";
        echo "location";
    }
    else{
        //else do nothing?
        $stmt = $myPDO->query(" SELECT op_title,comp_name,loc_name from opportunity JOIN company ON author_id = comp_id JOIN location using(loc_id)");
                echo "ad";
        echo "none";
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
