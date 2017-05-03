<html>
	<head>
    <link rel="stylesheet" href="style.css" type="text/css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head>
<body>
<?php require "navigationbar.php"; ?>

<div class="container">
    <div class="jumbotron">

      <h2>Create Opportunity</h2>

      <!--form for adding a Opportunity-->
      <form action="post_opp.php" method="post" enctype="multipart/form-data">

        <!--input for Opportunity name-->
        <div class="form-group">
          <label for="oppName">Opportunity Name: *</label>
          <input type="text" class="form-control" id="oppName"  name="oppName" required>
        </div>

        <div class="form-group">
          <label for="oppType">Opportunity Type: *</label>
          <input type="text" class="form-control" id="oppType"  name="oppType" required>
        </div>


        <!--input for opportunity description-->
        <div class="form-group">
          <label for="description">Description: * </label>
          <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <input type="submit" value="Submit" name="submit">

      </form>
    </div>
  </div>

</body>
</html>
