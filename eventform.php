<?php
	session_start();
	include("connection.php");
	// if(!isset($_SESSION[username]))
	// {
	// 	header('Location:login.php');
	// }

	if($_POST)
	{
		
		$q = "INSERT INTO events VALUES (NULL,'$_POST[wingid]','$_POST[description]','$_POST[datetime]')";
		$r = mysqli_query($dbc, $q);
		if($r)
		{?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Success!</strong><?php echo "<p> Successfully created your Event.<p>" ?>
			</div>
		<?php }
		else
		{?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Warning!</strong><?php echo"<p> Could not create your event</p>".mysqli_error($dbc);?>
			</div>
		<?php }
	}
?>
<!doctype html>
<html>
<head>
<title>Add Events | GeekHaven</title>
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
			<h1 class="heading">GeekHaven Events </h1>
		</div>
	</div>
	
	<div class="container">
		<div class="rows">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default form-overlay">
	  <!-- Default panel contents -->
				  <div class="panel-heading panel-head">Event Form</div>
					  <div class="panel-body">
					    <form action="eventform.php" method="post">
						  <div class="form-group">
						    <label for="wingid">Wing Conducting Event:</label>
						   <select name="wingid" class="form-control" id="winginfo">
							  <option value="1">Web Development Wing</option>
							  <option value="2">Competitive Coding Wing</option>
							  <option value="3">App Development Wing</option>
							  <option value="4">FOSS Wing</option>
							  <option value="5">NetWorking Wing</option>
							  <option value="6">Graphics Wing</option>
							  <option value="7">Tesla Wing</option>
							  <option value="8">Cyber Security Wing</option>
							</select>
						  </div>
						  <div class="form-group">
						  	<label for="date">Date-Time:</label>
			                <div class='input-group date' id='datetimepicker1'>
			                    <input  name="datetime" data-format="yyyy/MM/dd hh:mm:ss" type="text" class="form-control" />
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
						    <textarea type="text" name="description" class="form-control" id="event" placeholder="Description">Details of the event</textarea>
						  </div>
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