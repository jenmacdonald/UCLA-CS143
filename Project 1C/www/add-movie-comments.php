<!DOCTYPE html>
<html>
<head>
	<title>Add Movie Comments</title>
	<style>
		.add-comment-field {
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
	<div class="add-comment-field">
		<h1 class="heading">Add Movie Comments</h1>
		<form action="add-movie-comments.php" method="get">
			<div class="label"><b>Reviewer name</b></div>
			<input class="input-form text-field" type="text" name="name" 
			maxlength="20">
			<br><br>
			<div class="label"><b>Movie title</b></div>
			<?php
				// establish connection to the database
				$db = new mysqli('localhost', 'cs143', '', 'CS143');

				// print error message if unable to connect
				if($db->connect_errno > 0){
					ie('Unable to connect to database [' . $db->connect_error . 
					']');
				}

				// query to get all movies from the database
				$movQry = "SELECT id, title, year FROM Movie";
				$movRs = $db->query($movQry);
				
				// display all movies in a dropdown menu
				echo '<select class="dropdown text-field" name="movie-list">
					<option disabled selected value></option>';	
				
				while ( $row = $movRs->fetch_assoc() )
				{
					echo '<option value="' . $row[id] . '">' . $row[title] . ' 
					(' . $row[year] . ')</option>';
				}
				echo '</select>';

				$movRs 
			?>
			<br><br>
			<div class="label"><b>Reviewer rating</b></div>
			<select class="dropdown" name="rating">
	  			<option disabled selected value> ---- </option>
	    		<?php
	    			// show rating options in a dropdown menu
	    			for ($i=1; $i<=5; $i++)
	    			{
	        			?>
	            		<option value="<?php echo $i;?>"><?php echo $i;?>
	            		</option>
	        			<?php
	    			}
				?>
	  		</select>
			<br><br>
			<div class="label"><b>Reviewer comment</b></div>
			<textarea class="input-form text-field" type="text" name="comment" 
			cols='60' rows='8' maxlength="500"></textarea>
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
			// check if all inputs are valid
			if(checkForm() == true)
			{
				// add a review of a movie to the database
				addMovComTuple($db);
			}	
		}
		// function to check if all inputs are valid
		function checkForm()
		{
			// boolean flags
			$checkName = $checkTitle = $checkRating = $checkComment = false;

			// check if review name is entered
			if(!empty($_GET['name']))
			{
				$checkName = true;
			}
			// check if movie is selected
			if(isset($_GET['movie-list']))
			{
				$checkTitle = true;
			}
			// check if rating is selected
			if(isset($_GET['rating']))
			{
				$checkRating = true;
			}
			// check if comment is written
			if(!empty($_GET['comment']))
			{
				$checkComment = true;
			}

			// check if all boolean flags are true
			if($checkName == true && $checkTitle == true && $checkRating == true
				&& $checkComment == true)
			{
				return true;
			}

			// create error message of invalid input
			$errMessage = "ERROR! Please fix the issues listed:<br><br>";
			if($checkName == false)
			{
				$errMessage = $errMessage . "Please input your reviewer 
				name.<br>";
			}
			if($checkTitle == false)
			{
				$errMessage = $errMessage . "Please select a movie from the list
				 in the dropdown bar that you would like to review.<br>";
			}
			if($checkRating == false)
			{
				$errMessage = $errMessage . "Please select your rating of the 
				movie.<br>";
			}
			if($checkComment == false)
			{
				$errMessage = $errMessage . "Please leave your comments about 
				the movie.";
			}		
			displayErrorMessage($errMessage);
			return false;
		}
		// function that displays error message
		function displayErrorMessage($msg)
		{
			echo "<div class='err-wrapper'><div class='err-text'>";
			echo $msg;
			echo "</div></div>";
		}
		// function that adds review to the review table
		function addMovComTuple($dbMovCom)
		{
			// get relevant inputs to use in query
			$reviewName = $_GET['name'];
			$timestamp = date('Y-m-d G:i:s');
			$movieID = $_GET['movie-list'];
			$reviewRating = $_GET['rating'];
			$reviewComment = $_GET['comment'];

			// query to add review to review table
			$addMovComQry = "INSERT INTO Review(name, time, mid, rating, comment) 
			VALUES('$reviewName', '$timestamp', $movieID, $reviewRating, '$reviewComment')";

			$getMovieTitleQry = "SELECT title FROM Movie WHERE id=$movieID";

			$getMovTitleRs = $dbMovCom->query($getMovieTitleQry);
				
			while ( $row = $getMovTitleRs->fetch_assoc() )
			{
				foreach($row as $tplval)
				{
					$movieTitle = $tplval;
				}
			}
			
			// if query is submitted, print
			if($dbMovCom->query($addMovComQry) === true)	
			{
				// success alert
				echo '<script type="text/javascript">';
				echo 'window.alert("Success! ' . $reviewName . ' has added a ';
				echo 'review to the movie ' . $movieTitle . '.");</script>';
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