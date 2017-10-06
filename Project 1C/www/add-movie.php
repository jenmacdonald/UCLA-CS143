<!DOCTYPE html>
<html>
<head>
	<title>Add Movie</title>
	<style>
		.add-movie-field {
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
		.genre-button {
			white-space: nowrap;
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
	<div class="add-movie-field">
		<h1 class="heading">Add Movie</h1>
		<form action="add-movie.php" method="get">
			<div class="label"><b>Title</b></div>
			<input class="input-form text-field" type="text" name="title">
			<br><br>
			<div class="label"><b>Year</b></div>
			<select class="dropdown" name="year">
	  			<option disabled selected value> ---- </option>
	    		<?php
	    			// create dropdown menu for movie year from 1900 to present
	    			for ($i=1900; $i<=2016; $i++)
	    			{
	        			?>
	            		<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        			<?php
	    			}
				?>
	  		</select>
			<br><br>
			<div class="label"><b>Rating</b></div>
			<input class=" input-form" type="radio" name="rating" value="G">G
			<input class=" input-form" type="radio" name="rating" value="PG">PG
			<input class=" input-form" type="radio" name="rating" 
			value="PG-13">PG-13
			<input class=" input-form" type="radio" name="rating" value="R">R
			<input class=" input-form" type="radio" name="rating" 
			value="NC-17">NC-17
			<br><br>
			<div class="label"><b>Company</b></div>
			<input class="input-form text-field" type="text" name="company">
			<br><br>
			<div class="label"><b>Genre</b></div>
			<div class="genre-container">
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Action">Action</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Adult">Adult</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Adventure">Adventure</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Animation">Animation</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Comedy">Comedy</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Crime">Crime</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Documentary">Documentary</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Drama">Drama</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Family">Family</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Fantasy">Fantasy</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Horror">Horror</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Musical">Musical</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Mystery">Mystery</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Romance">Romance</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Sci-Fi">Sci-Fi</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Short">Short</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Thriller">Thriller</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="War">War</label>
				<label class="genre-button"><input class=" input-form genre-checkbox" type="checkbox" 
				name="genre[]" value="Western">Western</label>
			</div>
			<br><br>
			<div class="button-container">
				<input class="submit-button" type="submit" value="Submit" 
				name="submit-button">
			</div>
		</form>
	</div>
	<?php
		// check if submit button is selected
		if(isset($_GET['submit-button']))
		{
			// check if all input is valid
			if(checkForm() == true)
			{
				// add information to as tuple to movie
				addMovieTuple();
			}	
		}
		
		// function that checks all inputs are valid
		function checkForm()
		{
			// boolean flags
			$checkTitle = $checkYear = $checkRating = $checkCompany = 
			$checkGenre = false;

			// check if a movie title has been entered
			if(!empty($_GET['title']))
			{
				$checkTitle = true;
			}
			// check if year has been entered
			if(isset($_GET['year']))
			{
				$checkYear = true;
			}	
			// check if rating has been entered
			if(isset($_GET['rating']))
			{
				$checkRating = true;
			}
			// check if a company name has been entered
			if(!empty($_GET['company']))
			{
				$checkCompany = true;
			}
			// check if a genre has been entered
			if((isset($_GET['genre']))) 	
			{
				$checkGenre=true;
			}
			
			// check if all boolean flags are set to true
			if($checkTitle == true && $checkYear == true && $checkRating == true 
				&& $checkCompany == true && $checkGenre == true)
			{
				return true;
			}
			
			// create error message
			$errMessage = "ERROR! Please fix the issues listed:<br><br>";
			if($checkTitle == false)
			{
				$errMessage = $errMessage . "Please input a movie title.<br>";
			}
			if($checkYear == false)
			{
				$errMessage = $errMessage . "Please select the year the movie 
				was made.<br>";
			}
			if($checkRating == false)
			{
				$errMessage = $errMessage . "Please select the MPAA rating for 
				the movie.<br>";
			}
			if($checkCompany == false)
			{
				$errMessage = $errMessage . "Please input the studio that made 
				the movie.<br>";
			}
			if($checkGenre == false)
			{
				$errMessage = $errMessage . "Please select at least one genre 
				that the movie falls under.<br>";
			}
			// display error message of invalid input
			displayErrorMessage($errMessage);
			return false;	
		}		
		// function to display error message
		function displayErrorMessage($msg)
		{
			echo "<div class='err-wrapper'><div class='err-text'>";
			echo $msg;
			echo "</div></div>";
		}
		
		// function that adds a movie to the database
		function addMovieTuple()
		{
			// establish a connection to the database
			$db = new mysqli('localhost', 'cs143', '', 'CS143');

			// if a connection can't be established, print error message
			if($db->connect_errno > 0)
			{
				ie('Unable to connect to database [' . $db->connect_error . 
				']');
			}

			// query to obtain the max movie id
			$maxIDQry = "SELECT id FROM MaxMovieID";
			$maxIDRs = $db->query($maxIDQry);
			
			while ( $row = $maxIDRs->fetch_assoc() )
			{
				foreach($row as $tplval)
				{
					$maxMovieIDRs = $tplval;
				}
			}
			
			// create next max movie id
			$newMaxMovieID = $maxMovieIDRs + 1;

			// get information for movie to submit tuple
			$movieTitle = $_GET['title'];
			$movieYear = $_GET['year'];
			$movieRating = $_GET['rating'];
			$movieCompany = $_GET['company'];
			$movieGenre = array();

			foreach($_GET['genre'] as $selected)
			{
				array_push($movieGenre, $selected);
			}

			// query to submit information into the movie table
			$addMovieQry = "INSERT INTO Movie(id, title, year, rating, company) 
			VALUES('$maxMovieIDRs', '$movieTitle', '$movieYear', '$movieRating', '$movieCompany')";
			
			// boolean flags
			$addMovieFlag = $addGenreFlag = $updateIDFlag = false;

			// if movie is added to the database successfully, set boolean flag
			if($db->query($addMovieQry) === true)	
			{
				$addMovieFlag = true;
			}

			// get all the genres selected for the movie
			for($i=0;$i<count($movieGenre);++$i)
			{
				// get movie genre results
				$movGenre = $movieGenre[$i];
				
				// query to add movie genres to the moviegenre table
				$addMovieGenreQry = "INSERT INTO MovieGenre VALUES('$maxMovieIDRs', 
				'$movGenre')";

				// if genre is added to the database successfully, set boolean flag
				if($db->query($addMovieGenreQry) === true)
				{
					$addGenreFlag = true;
				}
			}

			// query to update the max movie id
			$updateMaxMovieIDQry = "UPDATE MaxMovieID SET id=$newMaxMovieID WHERE id=$maxMovieIDRs";

			// check if query to update max movie id is submitted succesfully
			if($db->query($updateMaxMovieIDQry) === true)	
			{
				$updateIDFlag = true;
			}
			// check if all boolean flags are set to true
			if($addMovieFlag == true && $addGenreFlag == true && $updateIDFlag == true)
			{
				// success alert
				echo '<script type="text/javascript">
				window.alert("Success! '. $movieTitle .' has been added to the database.");</script>';
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