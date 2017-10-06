<!DOCTYPE html>
<html>
<head>
	<title>View Actor Information</title>
	<style>
	.back-link {
		margin: 2%;
	}
	.heading {
		font-size: 1.5em;
	    margin-top: 3%;
	    margin-left: 3%;
	    font-weight: bold;
	}
	.indent {
		margin-left: 3%;
	}
	.page {
		font-family: verdana;
		font-size: 16px;
	}
	.results-container {
		display: table;
		width: 100%;
	}
	.results-box {
		display: table-cell;
		text-align: center;
		width: 33%;
	}
	.results-row {
		display: inline-block;
		text-align: center;
	}
	.results-subheading {
		font-size: 20px;
		margin-top: 2%;
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
	<?php
		// get the searched term from the index page
		$searchedTerm = $_GET[id];

		// split the term into an array separated by spaces
		$qryArray = preg_split('/\s+/', $searchedTerm);

		// establish a connection to the database
		$db = new mysqli('localhost', 'cs143', '', 'CS143');

		// if unable to establish connection, print error message
		if($db->connect_errno > 0){
			ie('Unable to connect to database [' . $db->connect_error . 
			']');
		}

		// print search term
		echo '<div class="heading">Search results for "<i>' . $searchedTerm . 
		'</i>":</div>';
		
		// boolean flags
		$noActorFlag = $noDirectorFlag = $noMovieFlag = false;
		
		// query to check that the first word in the serach term is in the 
		//database
		$firstTerm = $qryArray[0];
		$searchedActorQry = "SELECT id, first, last FROM Actor WHERE 
		(UPPER(first) LIKE UPPER('%$firstTerm%') OR UPPER(last) LIKE 
		UPPER('%$firstTerm%'))";

		// query to check that the rest of the words in the search term is in
		// the database
		for($i=1;$i<count($qryArray);++$i) 
		{
			$nextTerm = $qryArray[$i];
			$searchedActorQry = $searchedActorQry . " AND (UPPER(first) LIKE 
			UPPER('%$nextTerm%') OR UPPER(last) LIKE 
			UPPER('%$nextTerm%'))";
		}

		$searchedActorRs = $db->query($searchedActorQry);

		echo '<div class="results-container">';

		// print out all actor results
		if(mysqli_num_rows($searchedActorRs) > 0)
		{
			echo "<div class='results-box'><div class='results-subheading' 
			id='actor'>Actor</div>";
			echo "<table class='results-row'>";
			while ( $row = $searchedActorRs->fetch_assoc() ) 
			{
    			echo "<tr><td>";
    			echo "<a href='show-actor-info.php?id=$row[id]' id='$row[id]'>" 
    			. $row[first] . ' ' . $row[last] . "</a></td></tr>";
    		}	
			echo "</table></div>"; // End table
		}
		// boolean flag that there are no actor results
		else
		{
			$noActorFlag = true;
		}	
		
		// query to check that the first term in the search terms is in the
		// database
		$searchedDirectorQry = "SELECT id, first, last FROM Director WHERE 
		(UPPER(first) LIKE UPPER('%$firstTerm%') OR UPPER(last) LIKE 
		UPPER('%$firstTerm%'))";

		// query to check that the rest of the words in the search term is in 
		// the database
		for($i=1;$i<count($qryArray);++$i) 
		{
			$nextTerm = $qryArray[$i];
			$searchedDirectorQry = $searchedDirectorQry . " AND (UPPER(first) LIKE 
			UPPER('%$nextTerm%') OR UPPER(last) LIKE 
			UPPER('%$nextTerm%'))";
		}

		$searchedDirectorRs = $db->query($searchedDirectorQry);

		// print out all director results
		if(mysqli_num_rows($searchedDirectorRs) > 0)
		{
			echo"<div class='results-box'><div class='results-subheading' 
			id='director'>Director</div>";
			echo "<table class='results-row'>";
			while ( $row2 = $searchedDirectorRs->fetch_assoc() )
			{
    			echo "<tr><td>";
    			echo "<a href='show-director-info.php?id=$row2[id]' id='$row2[id]'>" 
    			. $row2[first] . ' ' . $row2[last] . "</td></tr>";
    		}	
			echo "</table></div>"; // End table
		}
		// boolean flag that there are no director results
		else
		{
			$noDirectorFlag = true;
		}

		// query to check that the first term in the search terms is in the 
		// database
		$searchedMovieQry = "SELECT id, title, year 
		FROM Movie WHERE UPPER(title) LIKE 
		UPPER('%$firstTerm%')";

		// query to check that the rest of the words in the search term is in
		// the database
		for($i=1;$i<count($qryArray);++$i) 
		{
			$nextTerm = $qryArray[$i];
			$searchedMovieQry = $searchedMovieQry . " AND (UPPER(title) LIKE 
			UPPER('%$nextTerm%'))";
		}

		$searchedMovieRs = $db->query($searchedMovieQry);

		// print out all movie results
		if(mysqli_num_rows($searchedMovieRs) > 0)
		{
			echo"<div class='results-box'><div class='results-subheading' 
			id='movie'>Movie</div>";
			echo "<table class='results-row'>";
			while ( $row3 = $searchedMovieRs->fetch_assoc() ) 
			{
    			echo "<tr><td>";
    			echo "<a href='show-movie-info.php?id=$row3[id]' id='$row3[id]'>" 
    			. $row3[title] . " (" . $row3[year] . ")</a></td></tr>";
    		}	
			echo "</table></div>";
		}
		// boolean flag that there are no movie results
		else
		{
			$noMovieFlag = true;
		}
		// check if there are no search results for any of the categories
		if($noActorFlag == true && $noDirectorFlag == true && $noMovieFlag == true)
		{
			// print out no results message
			echo '<div class="indent"><h4>Sorry, no matches were found for "';
			echo "<span class='search-term'>" . $searchedTerm . "</span>";
			echo '".</h4></div>';
		}	
		echo "</div>";	
	?>	
</body>	
</html>