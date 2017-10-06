<!DOCTYPE html>
<html>
<head>
	<title>Director</title>
	<style>
		.back-link {
			margin: 2%;
		}
		.director-description-container {
			margin-left: 20%;
		}
		.heading {
			text-align: center;
			margin-bottom: 0;
		}
		.job-description {
			
			font-style: italic;
			text-align: center;
			padding: 0;
			margin-top: 1%;
		}
		.movie-table {
			border-collapse: collapse;
			width: 80%;
		}
		.movie-results {
			font-size: 20px;
			padding: 10px;
		}
		.movie-results-heading {
			background-color: silver;
			font-size: 1.3em;
			text-align: left;
			padding: 10px;
		}
		.movie-results-row:nth-child(even) {
			background-color: gainsboro;
		}
		.movie-results-row:nth-child(odd) {
			background-color: lightgray;
		}
		.page {
			font-family: verdana;
		}
		.person-info {
			text-align: left;
			margin-top: 2%;
			margin-bottom: 2%;
		}
		.year-result {
			padding-left: 10px;
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
	<div class="view-director-info-field">
		<?php
			// get director id from the url
			$directorID = $_GET['id'];

			// establish connection to database
			$db = new mysqli('localhost', 'cs143', '', 'CS143');

				// print error message if unable to connect to the database
				if($db->connect_errno > 0){
					ie('Unable to connect to database [' . $db->connect_error . 
					']');
				}

			// query to get information from the director table
			$qryRetrieval = "SELECT * FROM Director WHERE id =$directorID";
			$qryRetrievalRs = $db->query($qryRetrieval);

			$idInfo = array();
			while ( $row = $qryRetrievalRs->fetch_assoc() )
			{
    			foreach($row as $tplval)
	    		{
				    array_push($idInfo, $tplval);
	    		}
    		}
    		// get information for query of director table
    		$retrievedID = $idInfo[0];
    		$retrievedLast = $idInfo[1];
    		$retrievedFirst = $idInfo[2];
    		$retrievedDOB = $idInfo[3];
    		$retrievedDOD = $idInfo[4];
    		if($retrievedDOD == "" || $retrievedDOD == NULL || $retrievedDOD == "0000-00-00")
    		{
    			$retrievedDOD = "Still alive";
    		}				
		?>
		<h1 class="heading">
			<?php
				echo $retrievedFirst . " " . $retrievedLast;
			?>
		</h1>
		<h4 class="job-description">
			<?php
				echo "director";
			?>
		</h4>
		<div class="director-description-container">
			<div class="person-info">
				<div><?php echo "Born: " . "<b>$retrievedDOB</b>";?></div>
				<div><?php echo "Died: " . "<b>$retrievedDOD</b>";?></div>
			</div>
			<div class="director-info">
					<?php
						// establish connection to the database
						$db = new mysqli('localhost', 'cs143', '', 'CS143');

						if($db->connect_errno > 0){
							ie('Unable to connect to database [' . 
							$db->connect_error . ']');
						}

						// query to get mid to retrieve movie information
						$dirMoviesQry = "SELECT mid FROM MovieDirector 
						WHERE did=$directorID";
						$dirMoviesRs = $db->query($dirMoviesQry);

						$dirMoviesArray = array();
						while ( $row = $dirMoviesRs->fetch_assoc() ) 
						{
							array_push($dirMoviesArray, $row[mid]);
						}
						
						// print movie results
						echo "<table class='movie-table'><tr><th class='movie-results-heading'>Movie</th>
							<th class='movie-results-heading'>Year</th></tr>";
						for($i = 0; $i<sizeof($dirMoviesArray); ++$i)
						{
							// get current id for director
							$currentID = $dirMoviesArray[$i];
							// get title of movies directed by the director
							$idMovQry = "SELECT id, title, year FROM 
							Movie WHERE id=$currentID";

							$idMovRs = $db->query($idMovQry);
							
							while ( $row2 = $idMovRs->fetch_assoc() ) 
							{
								// print movie results for the director
								echo "<tr class = 'movie-results-row'><td class='movie-results'><a 
								href='show-movie-info.php?id=$currentID' 
								id='$currentID'>" . $row2[title] . "</a></td>";
								echo "<td class='year-result'>" . $row2[year] . "</td></tr>";
							}
						}
						echo "</table>";		
					?>
			</div>
		</div>
	</div>
</body>	
</html>	