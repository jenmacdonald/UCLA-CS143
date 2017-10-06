<!DOCTYPE html>
<html>
<head>
	<title>Add Actor to Movie</title>
	<style>
		.add-person-field {
			font-size: 16px;
			padding: 2% 30% 2% 30%;
			text-align: left;
		}
		.back-link {
			font-size: 16px;
			margin: 2%;
		}
		.button-container {
			text-align: center;
		}
		.dropdown {
			font-size: 16px;
			text-align: center;
			margin-left: 2%;
			width: 100%;
		}
		.err-text {
			color: red;
			display: inline-block;
			font-size: 12px;
			margin-left: 30%;
		}			}
		.err-wrapper {
			text-align: left;
		}
		.heading {
			margin-bottom: 5%;
			text-align: center;
		}
		.input-form {
			font-size: 16px;
			margin: 2%;
		}
		.label {
			margin-left: 2%;
			margin-top: 2%;
		}
		.page {
			font-family: verdana;
		}
		.submit-button {
			display: inline-block;
			font-size: 16px;
		}
		.text-field {
			width: 100%;
		}
		.nav-bar {
			background-color: dodgerblue;
			display: table;
			height: 5%;
			width: 100%;
		}
		.dropdown-content {
			display: none;
    		position: absolute;
		    min-width: 160px;
		}
		.search-dropdown {
			position: relative;
			display: inline-block;
		}
		.search-dropdown:hover .dropdown-content {
			display: block;
		}
		.search-heading {
			color: white;
			background-color: dodgerblue;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		}
		.search-link {
			border: 1px solid black;
		}
		.dropdown-content a {
			background-color: white;
		    color: black;
		    border: 1px solid black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}
		.dropdown-content a:hover {
			background-color: lightgray;
		}
		.index-image {
			width:50px;
			height:50px;
			vertical-align:middle;
			padding-left: 50px;
		}
		.nav-options {
			float: right;
			padding-right: 50px;
		}
		.search-option {
			text-decoration: none;
		}
	</style>
</head>
<body class="page">
	<div class="nav-bar">
		<a href="index.php">
			<img class="index-image" src="movieicon.png" alt="Index Image">
		</a>
		<div class="nav-options">
			<div class="search-dropdown">
			<a href="index.php" class="search-heading search-option">Search</a>
			</div>	
			<div class="search-dropdown">
				<button class="search-heading">Add new content</button>
				<div class="dropdown-content">
					<a href="add-actor-or-director.php">Add Actor or Director</a>
					<a href="add-movie.php">Add Movie</a>
					<a href="add-movie-comments.php">Add Movie Comments</a>
					<a href="add-actor-to-movie.php">Add Actor to Movie</a>
					<a href="add-director-to-movie.php">Add Director to Movie</a>
				</div>
			</div>	
			<div class="search-dropdown">
				<button class="search-heading">View content</button>
				<div class="dropdown-content">
					<a href="view-actor-or-director-information.php">View Actor or Director Information</a>
					<a href="view-movie-information.php">View Movie Information</a>
				</div>
			</div>
		</div>
	</div>
	<div class="add-person-field">
		<h1 class="heading">Add Actor to Movie</h1>
		<form action="add-actor-to-movie.php" method="get">
			<div class="label"><b>Movie Title</b></div>
			<?php
				// establish a connection to the database
				$db = new mysqli('localhost', 'cs143', '', 'CS143');

				// display error message if connection fails
				if($db->connect_errno > 0){
					ie('Unable to connect to database [' . $db->connect_error . 
					']');
				}

				// query for all movies in database
				$movQry = "SELECT id, title, year FROM Movie";
				$movRs = $db->query($movQry);
				
				// display results in a dropdown menu
				echo '<select class="dropdown" name="movie-list">
					<option disabled selected value></option>';	
				
				while ( $row = $movRs->fetch_assoc() )
				{
					echo '<option value="' . $row[id] . '">' . $row[title] . ' 
					(' . $row[year] . ')</option>';
				}
				echo '</select>';
			?>
			<br><br>
			<div class="label"><b>Actor Name</b></div>
			<?php
				// query for all actors in database
				$actQry = "SELECT id, first, last FROM Actor";
				$actRs = $db->query($actQry);

				// display results in a dropdown menu
				echo '<select class="dropdown" name="actor-list"> 
					<option disabled selected value></option>';	
				
				while ( $row = $actRs->fetch_assoc() )
				{
					echo '<option value="' . $row[id] . '">' . $row[first] . ' '
					 . $row[last] . '</option>';
				}
				echo '</select>';
			?>
			<br><br>
			<div class="label"><b>Actor Role</b></div>
			<input class=" input-form text-field" type="text" name="role" 
			maxlength="50">
			<br><br>
			<div class="button-container">
				<input class="submit-button" type="submit" value="Submit" 
				name="submit-button">
			</div>
		</form>
	</div>
	<?php
		// check if submit button is clicked
		if(isset($_GET['submit-button']))
		{
			// check if information is valid
			if(checkForm() == true)
			{
				// add actor to movie in the database
				addActToMovTuple($db);
			}	

		}
		// check that all input is valid
		function checkForm()
		{
			// boolean flags
			$checkTitle = $checkName = $checkRole = false;

			// check if a movie is selected
			if(isset($_GET['movie-list']))
			{
				$checkTitle = true;
			}
			// check if an actor is selected
			if(isset($_GET['actor-list']))
			{
				$checkName = true;
			}
			// check if a role is entered
			if(!empty($_GET['role']))
			{
				$checkRole = true;
			}
			// check if all boolean flags are true
			if($checkTitle == true && $checkName == true && $checkRole == true)
			{
				return true;
			}
			
			// create error message
			$errMessage = "ERROR! Please fix the issues listed:<br><br>";
			if($checkTitle == false)
			{
				$errMessage = $errMessage . "Please input a valid movie title 
				from the dropdown list.<br>";
			}
			if($checkName == false)
			{
				$errMessage = $errMessage . "Please input a valid actor name 
				from the dropdown list.<br>";
			}
			if($checkRole == false)
			{
				$errMessage = $errMessage . "Please input the actor's role in 
				the movie.<br>";
			}
			// print error message
			displayErrorMessage($errMessage);
			return false;
		}
		// function that prints error message
		function displayErrorMessage($msg)
		{
			echo "<div class='err-wrapper'><div class='err-text'>";
			echo $msg;
			echo "</div></div>";
		}
		// function that adds actor to movie in the database
		function addActToMovTuple($dbMovAct)
		{
			// get relevant information for tuple
			$movieID = $_GET['movie-list'];
			$actorID = $_GET['actor-list'];
			$actorRole = $_GET['role'];

			// query to add info to movieactor and movie tables
			$addMovActQry = "INSERT INTO MovieActor VALUES($movieID, $actorID, 
			'$actorRole')";
			
			$getMovieTitleQry = "SELECT title FROM Movie WHERE id=$movieID";
			$getActorNameQry = "SELECT CONCAT(first, ' ', last) FROM Actor 
			WHERE id=$actorID";

			$getMovTitleRs = $dbMovAct->query($getMovieTitleQry);
				
			while ( $row = $getMovTitleRs->fetch_assoc() )
			{
				foreach($row as $tplval)
				{
					$movieTitle = $tplval;
				}
			}

			$getActorNameRS = $dbMovAct->query($getActorNameQry);
				
			while ( $row2 = $getActorNameRS->fetch_assoc() )
			{
				foreach($row2 as $tplval)
				{
					$actorName = $tplval;
				}
			}

			// if query is submitted, print message
			if($dbMovAct->query($addMovActQry) === true)
			{
				// success alert
				echo '<script type="text/javascript">
				window.alert("Success! '. $actorName .' has been added to the movie '; 
				echo $movieTitle . ' as ' . $actorRole .'.");</script>';
			}
			else
			{
				// failure alert
				echo '<script type="text/javascript"> alert("Unable to connect 
				to database [' . $db->connect_error . ']");</script>';
			}	
		}
	?>	
</body>	
</html>	