<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="	"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="style.css" type="text/css">
        <script src="jquery-3.1.1.min.js"></script>
        <script src="jquery.js"></script>
	</head>
<body>
<?php

     require 'functions.php';
    //if college has been set in the search bar
    if(isset($_GET["college"]) && $_GET["college"]!=""){
        global $myPDO;
        $college = $_GET["college"];
        //if course has been set too
        if( isset($_GET["course"])  && $_GET["course"]!=""){
            $course = $_GET["course"];
            //if location has been set
            if(isset($_GET["location"]) && $_GET["location"]!=""){
                $loc = $_GET["location"];
               $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id) WHERE inst_name ILIKE '%$collge%' AND loc_name ILIKE '%$loc%' AND op_type ILIKE '%$course%'");
                }
            else{ //if location has not been set
                 $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id WHERE inst_name ILIKE '%$collge%' AND op_type ILIKE '%$course%'");
                }
        }
        //if college has not been set
        //if location has been set
        else if(isset($_GET["location"]) && $_GET["location"]!=""){
             $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id) WHERE inst_name ILIKE '%$collge%' AND loc_name ILIKE '%$loc%'");
            }
        //if only college has been set
        else {
            $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id) WHERE inst_name ILIKE '%$collge%'");
            
             }
    }
    //if course has been set
    else if(isset($_GET["course"]) && $_GET["course"]!=""){
        //if location has been set
        if(isset($_GET["location"]) && $_GET["location"]!=""){
            $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id WHERE op_type ILIKE '%$course%'");
            }
        else{
            //if location has not been set
            $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id) WHERE op_type ILIKE '%$course%'");
            }

    }
    //if only location has been set
    else if(isset($_GET["location"]) && $_GET["location"]!=""){
        $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id) WHERE loc_name ILIKE '%$loc%'");
            }
    else{
        //if nothing has been set
        $stmt = $myPDO->query(" SELECT op_title,inst_name,loc_name from opportunity JOIN institution ON author_id = inst_id JOIN location using(loc_id)");
        }



    require 'navigationbar.php';
    echo '
<nav class="navbar navbar-default" id="college_search_bar" >
  <div class="container-fluid" >
      <form class="navbar-form navbar-right" id="c_search" method="get">
          <input type="text" class="form-control " placeholder="Search by Course" name="course">
          <input type="text" class="form-control" placeholder="Search by Location" name="location">
          <input type="text" class="form-control" placeholder="Search by College" name="college">
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
		';

     while ($row = $stmt->fetch() ){
        $title = $row[0];
        $inst = $row[1];
        $location = $row[2];

         echo "
         <tr>
            <td>$title</td>
			<td> $inst , $location </td>
			<td> Click here for informaton </td>
			<td>Time </td>
		</tr>
        ";
     }
    echo '
	</table>
</div>
</form>
</div>
    </div>

';

    ?>

</body>
</html>
