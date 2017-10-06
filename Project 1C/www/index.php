<!DOCTYPE html>
<html>
<head>
	<title>CS143 Project 1C</title>
	<style>
		input {
			font-size: 16px;
		}
		.add-content-container {
			border: solid;
			display: table;
			float: left;
			height: 100%;
			margin-left: 20%;
			width: 25%;
		}
		.browse-content-container {
			border: solid;
			display: table;
			float: right;
			height: 100%;
			margin-right: 20%;
			width: 25%;
		}
		.center {
			display: table-cell;
			vertical-align: middle;
		}
		.find-content-container {
			height: 150px;
			margin-left: 10%;
			margin-right: 10%;
			text-align: center;
		}
		.search-container {
			margin-bottom: 5%;
			margin-top: 15%;
		}
		.search-form {
			margin: 0 auto;
			width: 50%;	
		}
		.search-page {
			text-align: center;
			font-family: verdana;
		}
		.submit-button {
			margin-top: 2%;
		}
		.text-field {
			width: 100%;
		}
	</style>
</head>
<body class="search-page">
	<div class="search-container">
		<h1>Movie Database</h1>
		<p>Search for an actor, director, or movie:</p>
		<div class="search-form">
			<form action="index.php" method="get">
				<input class="text-field" type="text" name="search-field">
				<input class="submit-button" type="submit" value="Search" 
				name="search-button">
			</form>
		</div>	
	</div>
	<div class="find-content-container">
		<p>You can also add or view information about a particular 
			actor/actress, director, or movie:</p> 
		<div class="add-content-container">
			<div class="center">
				<div>Add new content:</div>
				<br>
				<a href="add-actor-or-director.php">Add Actor or Director</a>
				<br>
				<a href="add-movie.php">Add Movie</a>
				<br>
				<a href="add-movie-comments.php">Add Movie Comments</a>
				<br>
				<a href="add-actor-to-movie.php">Add Actor to Movie</a>
				<br>
				<a href="add-director-to-movie.php">Add Director to Movie</a>
			</div>	
		</div>
		<div class="browse-content-container">
			<div class="center">
				<div>View content:</div>
				<br>
				<a href="view-actor-or-director-information.php">View Actor or 
					Director Information</a>
				<br>
				<a href="view-movie-information.php">View Movie Information</a>
			</div>
		</div>		
	</div>
	<?php
		// check if the search button is clicked and that the search field isn't empty
		if(isset($_GET['search-button']) && !empty($_GET['search-field']))
		{
			// get the input from the seach field
			$qry = $_GET['search-field'];
			// go to the search page
			header("Location:search.php?id=" . $qry);
		}
	?>	
</body>	
</html>