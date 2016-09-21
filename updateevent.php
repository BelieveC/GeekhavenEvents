<?php
	// session_start();
	// if(!isset($_SESSION[name]))
	// {
	// 	header('Location:login.php');
	// }
	include("connection.php");
	if($_GET[id]){
		$q = "SELECT * FROM events WHERE id=$_GET[id]";
		$r = mysqli_query($dbc, $q);
		$openevent = mysqli_fetch_assoc($r);
	}
	if($_POST)
	{
		$q = "UPDATE events SET wingid=$_POST[wingid], description=$_POST[description], datetime=$_POST[datetime] WHERE id=$_POST[id]";
		$r = mysqli_query($dbc, $q);
		if($r)
		{?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong><?php echo "<p> Successfully updated your Event.<p>" ?>
			</div>
		<?php }
		else
		{?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong><?php echo"<p> Could not update your event</p>".mysqli_error($dbc);?>
			</div>
		<?php }
	}
	if(!$_GET and !$_POST){
		header('Location:login.php');
	}
?>
<!doctype html>
<html>
<head>
<title>Update Events | GeekHaven</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>
<!-- /font files -->
<!-- css files -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' media="all" />
<link href="css/event.css" rel='stylesheet' type='text/css' media="all" />
<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="icon" 
      type="image/png" 
      href="images/geekhaven.png">
<!-- /css files -->


<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>


</head>
<body>
<div class="container">
	<p class="backbutton"><a href="index.php"><span class="glyphicon glyphicon-chevron-left"></span></a></p>
	<div class="rows">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="heading">GeekHaven Events</h1>
		</div>
	</div>
	
	<div class="container">
		<div class="rows">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default form-overlay">
	  <!-- Default panel contents -->
				  <div class="panel-heading panel-head">Update Event Form</div>
					  <div class="panel-body">
					    <form action="updateevent.php" method="post">
						  <div class="form-group">
						    <label for="wingid">Wing Conducting Event:</label>
						   <select name="wingid" class="form-control" id="winginfo">
							  <option value="1">Web Development</option>
							  <option value="2">Competitive Coding</option>
							  <option value="3">App Development</option>
							  <option value="4">FOSS</option>
							  <option value="5">NetWorking</option>
							  <option value="6">Graphics</option>
							</select>
						  </div>
						  <div class="form-group">
						  	<label for="date">Date-Time:</label>
			                <div class='input-group date' id='datetimepicker1'>
			                    <input  name="datetime" data-format="dd/MM/yyyy hh:mm:ss" type="text" class="form-control" placeholder= <?php echo $openevent['datetime'];?> />
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar"></span>
			                    </span>
			                </div>
			               </div>
			               <script type="text/javascript">
					            $(function () {
					                $('#datetimepicker1').datetimepicker();
					            });
					        </script>
						  <div class="form-group">
						    <label for="event">Event Description:</label>
						    <textarea type="text" name="description" class="form-control" id="event" placeholder=<?php echo $openevent['description']; ?>></textarea>
						  </div>
						   <input  name="id" type="hidden" value= <?php echo $_GET['id'];?> />
						  <button type="submit" class="btn btn-success">Submit</button>
						</form>
					  </div>
				</div>
			</div>	
		</div>
	</div>
	<div class="container">
		<p class="copyright">© 2016 WebD | <a href="http://geekhaven.iiita.ac.in" target="_blank">GeekHaven</a></p>
	</div>
</div>
</body>
</html>