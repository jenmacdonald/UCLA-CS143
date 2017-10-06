<!DOCTYPE html>
<html>
<head>
	<title>View Actor Information</title>
	<style>
		.person-results-heading {
			background-color: silver;
			font-size: 1.3em;
			text-align: left;
			padding: 10px;
		}
		.actor-results-container {
			width: 30%;
			display: inline-block;
			margin-left: 15%;
		}
		.back-link {
			margin: 2%;
		}
		.button-container {
			text-align: center;
		}
		.director-results-container {
			float: right;
			margin-right: 15%;
			width: 30%;
			display: inline-block;
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
			font-family: verdana;
		}
		.results-container {
			text-align: left;
			width: 100%;
		}
		.results-table {
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
		}
		.text-field {
			width: 100%;
		}
		.view-person-field {
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
		.page-margin {
			margin-left: 15%;
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
	<div class="view-person-field">
		<h1 class="heading">View Actor or Director Information</h1>
		<form action="view-actor-or-director-information.php" method="get">
			<div class="label"><b>Search:</b></div>
			<input class="input-form text-field" type="text" 
			name="person-search" maxlength="100">
			<br><br>
			<div class="button-container">
				<input class="submit-button" type="submit" value="Submit" 
				name="submit-button">
			</div>
		</form>
	</div>
	<?php
		// establish connection to the database
		$db = new mysqli('localhost', 'cs143', '', 'CS143');

		// print error message if can't establish connection
		if($db->connect_errno > 0){
			ie('Unable to connect to database [' . $db->connect_error . 
			']');
		}
		// check if submit button is clicked and the search box isn't empty
		if(isset($_GET['submit-button']) && !empty($_GET['person-search'])) // Check if query is in text area
		{
			// get the searched term
			$searchedTerm = (string)$_GET['person-search'];
			// boolean flag
			$noActorFlag = $noDirectorFlag = false;
			
			// query to search the actors matching that search term
			$searchedActorQry = "SELECT id, CONCAT(first, ' ', last) AS name 
			FROM Actor WHERE UPPER(CONCAT(first, ' ', last)) LIKE 
			UPPER('%$searchedTerm%')";
			$searchedActorRs = $db->query($searchedActorQry);

			echo "<div class='results-container'><h2 class='page-margin'>Search Results:</h2>";

			if(mysqli_num_rows($searchedActorRs) > 0)
			{
				echo"<div class='actor-results-container'>";
				echo "<table class='results-table actor-table'>";
				echo"<th class='person-results-heading'>Actor</th>";
				while ( $row = $searchedActorRs->fetch_assoc() ) 
				{
	    			echo "<tr class='search-results-row'><td class='search-results'>";
	    			echo "<a href='show-actor-info.php?id=$row[id]' id='$row[id]'>" 
	    			. $row[name] . "</a></td></tr>";
	    		}	
				echo "</table></div>"; // End table
			}
			else
			{
				$noActorFlag = true;
			}	
			
			// query to search the directors matching that search term
			$searchedDirectorQry = "SELECT id, CONCAT(first, ' ', last) AS name 
			FROM Director WHERE UPPER(CONCAT(first, ' ', last)) LIKE 
			UPPER('%$searchedTerm%')";
			$searchedDirectorRs = $db->query($searchedDirectorQry);

			if(mysqli_num_rows($searchedDirectorRs) > 0)
			{
				echo "<div class='director-results-container'>";
				echo "<table class='results-table'>";
				echo"<th class='person-results-heading'>Director</th>";
				while ( $row2 = $searchedDirectorRs->fetch_assoc() )
				{
	    			echo "<tr class='search-results-row'><td class='search-results'>";
	    			echo "<a href='show-director-info.php?id=$row2[id]' id='$row2[id]'>" 
	    			. $row2[name] . "</td></tr>";
	    		}	
				echo "</table></div></div>"; // End table
			}
			else
			{
				$noDirectorFlag = true;
			}

			// check if neither actor nor director matches the search term
			if($noActorFlag == true && $noDirectorFlag == true)
			{
				// print no results found message
				echo "<div class='page-margin'>";
				echo '<h4>Sorry, no matches were found for "';
				echo "<span class='search-term'>" . $searchedTerm . "</span>";
				echo '".</h4></div>';
			}	
		}
	?>	
</body>	
</html>