<?php
include('session_chk.php');
include('login_header.php');
include("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Evaluation System</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
</head>
<body>
<div class="col-lg-10">
  <h1>Activity Report </h1>
  <br>
<div class="btn-group btn-group-justified " role="group" aria-label="..." >
   <div class="btn-group" role="group">
	<a role="button" class="btn btn-default" href="teaching.php">Teaching</a>
	</div>
   <div class="btn-group" role="group">
  <a role="button" class="btn btn-default" href="examinations.php">Examinations</a>
  </div>
   <div class="btn-group" role="group">
  <a type="button" class="btn btn-default" href="research.php">Research</a>
    </div>
	 <div class="btn-group" role="group">
	<a type="button" class="btn btn-default" href="publications.php">Publications</a>
</div>
 <div class="btn-group" role="group">
	<a type="button" class="btn btn-default" href="administrative.php">Administrative Duties</a>
	</div>
 <div class="btn-group" role="group">    
	<a type="button" class="btn btn-default" href="committee.php">Committee Work</a>
</div>
<div class="btn-group" role="group">    
	<a type="button" class="btn btn-default" href="training.php">Training</a>
</div>
</div>
<br>
<form class="form-horizontal " method="post" action="publications.php">
<div class="panel panel-default" id="Publications">
<div class="panel-heading container-fluid">
<div class="col-lg-1 pull-right" >
<a class="btn btn-default" href="update.php?form=4" role="button" name="form4">
<span class="glyphicon glyphicon-pencil "  aria-hidden="true"></span>
</a></div>

    <h2 class="panel-title">Publications</h2>	
  </div>
  <?php
include("../includes/config_db.php");
if(isset($_POST['publications'])) 
{
$ptitle=$_POST['ptitle'];
$pjournals=$_POST['pjournals'];
$pdate=$_POST['pdate'];
$pvolume=$_POST['pvolume'];
	mysqli_query($conn,"INSERT INTO publications(ptitle,pjournals,pdate,pvolume)
									
				VALUES('$ptitle','$pjournals','$pdate','$pvolume','".$_SESSION['login_user']."')") or die(mysql_error());
echo "<meta http-equiv=Refresh content=1;url=training.php>";
}
?>
    <?php 
$sql = "SELECT * FROM publications where pers_id ='".$_SESSION['login_user']."'";
$result = mysqli_query($conn,$sql) or die(mysql_error()); 

if ($result->num_rows > 0) { 

echo "<table class='table table-bordered text-center'>

<tr class='active'>
<th class='text-center'>Title</th>
<th class='text-center'>Journals / Conferences</th>
<th class='text-center'>Date</th>
<th class='text-center'>Volume</th>

</tr>";
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result))
  {
  echo "<tr class='active'>";
  echo "<td>".$row['ptitle']."</td>";
  echo "<td>".$row['pjournals']."</td>";
  echo "<td>".$row['pdate']."</td>";
  echo "<td>".$row['pvolume']."</td>";

  echo "</tr>";
  }echo "</table>";
 }
}
?> 
  
  <div class="panel-body"> 

  <div class="form-group">
    <label for="ptitle" class="col-lg-2 control-label">Title</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="ptitle" placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <label for="pconferences" class="col-lg-3 control-label">Journals / Conferences</label>
    <div class="col-lg-9">
      <input type="text" class="form-control" name="pjournals" placeholder="">
    </div>
	</div>
	<div class="form-group">
	<label for="pdate" class="col-lg-2 control-label">Date</label>
    <div class="col-lg-3">
      <input type="text" class="form-control" name="pdate">
    </div>
  
    <label for="pvolume" class="col-lg-3 control-label">Volume</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" name="pvolume" >
    </div>
	</div>
	<input class="btn btn-primary col-lg-2 col-lg-offset-10" type="submit" name="publications" value="Submit">
  </div>
</div>
</form>
 </div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>