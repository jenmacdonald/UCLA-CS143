<!DOCTYPE html>
<html>
<head>
	<title>View Movie Information</title>
	<style>
		.back-link {
			margin: 2%;
		}
		.button-container {
			text-align: center;
		}
		.heading {
			margin-bottom: 5%;
			text-align: center;
		}
		.input-form {
			font-size: 20px;
			margin: 2%;
		}
		.label {
			margin-left: 2%;
			margin-top: 2%;
		}
		.page {
			font-family: verdana, sans-serif;
		}
		.results-container {
			text-align: left;
			width: 100%;
		}
		.results-table{
			border-collapse: collapse;
			width: 100%;
		}
		.submit-button {
			display: inline-block;
			font-size: 16px;
		}
		.table-container {
			display: inline-block;
			margin-left: 10%;
			margin-right: 10%;
			width: 80%;
		}
		.text-field {
			width: 100%;
		}
		.view-movie-field {
			font-size: 16px;
			padding: 2% 30% 2% 30%;
			text-align: left;
		}
		.search-results {
			font-size: 20px;
			padding: 10px;
		}
		.search-results-row:nth-child(even) {
			background-color: gainsboro;
		}
		.search-results-row:nth-child(odd) {
			background-color: lightgray;
		}
		.search-term {
			font-style: italic;
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
	<div class="view-movie-field">
		<h1 class="heading">View Movie Information</h1>
		<form action="view-movie-information.php" method="get">
			<div class="label"><b>Search:</b></div>
			<input class="input-form text-field" type="text" name="movie-search" 
			maxlength="100">
			<br><br>
			<div class="button-container">
				<input class="submit-button" type="submit" value="Submit" 
				name="submit-button">
			</div>
		</form>
	</div>
	<div class="results-container">
		<?php
		// establish a connection to the database
		$db = new mysqli('localhost', 'cs143', '', 'CS143');

		// if unable to establish connection, print error message
		if($db->connect_errno > 0){
			ie('Unable to connect to database [' . $db->connect_error . 
			']');
		}
		// check if both submit button is clicked and the search box is not empty
		if(isset($_GET['submit-button']) && !empty($_GET['movie-search']))
		{
			// get searched term
			$searchedTerm = (string)$_GET['movie-search'];

			// check if searched term matches any movies
			$searchedMovieQry = "SELECT id, title, year 
			FROM Movie WHERE UPPER(title) LIKE 
			UPPER('%$searchedTerm%')";
			$searchedMovieRs = $db->query($searchedMovieQry);

			// print out matching movies
			echo "<div class='results-container'><div class='table-container'>";
			echo"<h2>Search Results:</h2>";
			// check if any movies match
			if(mysqli_num_rows($searchedMovieRs) > 0)
			{
				echo "<table class='results-table'>";
				
				while ( $row = $searchedMovieRs->fetch_assoc() ) 
				{
	    			echo "<tr class='search-results-row'><td class='search-results'>";
	    			echo "<a href='show-movie-info.php?id=$row[id]' id='$row[id]'>" 
	    			. $row[title] . " (" . $row[year] . ")</a></td></tr>";
	    		}	
				echo "</table>";
			}
			// print out no matching movies message
			else
			{
				echo '<div><h4>Sorry, no matches were found for "';
				echo "<span class='search-term'>" . $searchedTerm . "</span>";
				echo '".</h4>';
			}	
			echo "</div></div>";
		}
	?>		
	</div>
</body>	
</html>