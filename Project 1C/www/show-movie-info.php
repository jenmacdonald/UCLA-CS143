<!DOCTYPE html>
<html>
<head>
	<title>Movie</title>
	<style>
		.actor-description-container {
			font-size: 16px;
			text-align: center;
		}
		.actor-info {
			display: inline-block;
			width: 80%;
		}
		.actor-results {
			font-size: 20px;
			padding: 10px;
		}
		.actor-results-heading {
			background-color: silver;
			font-size: 1.3em;
			text-align: left;
			padding: 10px;
		}
		.actor-results-row:nth-child(even) {
			background-color: gainsboro;
		}
		.actor-results-row:nth-child(odd) {
			background-color: lightgray;
		}
		.actor-table{
			border-collapse: collapse;
			width: 100%;
		}
		.back-link {
			margin: 2%;
		}
		.comment-button {
			appearance: button;
		    -moz-appearance: button;
		    -webkit-appearance: button;
		    text-decoration: none; 
		    font: menu; 
		    color: ButtonText;
		    display: inline-block; 
		    padding: 5px 15px;
		    vertical-align: bottom;
		    float: right;
		}
		.comment-button-container {
			/*text-align: right;*/
		}
		.heading {
			margin-bottom: 0;
			text-align: center;
		}
		.movie-description-container {
			display: table;
			margin-left: 20%;
			width: 80%;
		}
		.movie-description-comments {
			width: 80%;
		}
		.movie-info {
			display: inline-block;
			margin-top: 2%;
			margin-bottom: 2%;
		}
		.movie-year {
			font-style: italic;
			margin-top: 1%;
			text-align: center;
		}
		.page {
			font-family: verdana;
		}
		
		.role-info {
			display: inline-block;
		}
		.role-result {
			padding-left: 10px;
		}
		.subheading {
			font-size: 1.3em;
			margin-top: 2%;
			margin-bottom: 2%;
			text-align: left;
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
	<div class="view-movie-info-field">
		<?php
			// get searched movie id from the url
			$movieID = $_GET['id'];

			// establish a connecton to the database
			$db = new mysqli('localhost', 'cs143', '', 'CS143');

				// print error message if can't connect to the database
				if($db->connect_errno > 0){
					ie('Unable to connect to database [' . $db->connect_error . 
					']');
				}

			// query the selected movie information 
			$qryRetrieval = "SELECT * FROM Movie WHERE id =$movieID";
			$qryRetrievalRs = $db->query($qryRetrieval);

			$idInfo = array();
			while ( $row = $qryRetrievalRs->fetch_assoc() )
			{
    			foreach($row as $tplval)
	    		{
				    array_push($idInfo, $tplval);
	    		}
    		}
    		// get the relevant movie information
    		$retrievedID = $idInfo[0];
    		$retrievedTitle = $idInfo[1];
    		$retrievedYear = $idInfo[2];
    		$retrievedRating = $idInfo[3];
    		$retrievedCompany = $idInfo[4];
    					
		?>
		<h1 class="heading">
			<?php
				echo $retrievedTitle;
			?>
		</h1>
		<h2 class="movie-year">
			<?php
				echo "(" . $retrievedYear . ")";
			?>
		</h2>
		<div class="movie-description-container">
			<div class="movie-description-comments">
				<div class="movie-info">
				<div><?php echo "MPAA Rating: " . "<b>$retrievedRating</b>";?>
				</div>
				<div><?php echo "Production Company: " . 
				"<b>$retrievedCompany</b>";?></div>
				<?php
					// establish a connection to the database
					$db = new mysqli('localhost', 'cs143', '', 'CS143');

					// print error message
					if($db->connect_errno > 0){
						ie('Unable to connect to database [' . 
						$db->connect_error . ']');
					}

					echo "Director(s): ";
					// query director id to get director of movie
					$directorMovQry = "SELECT did FROM MovieDirector 
					WHERE mid=$movieID";
					$directorMovRs = $db->query($directorMovQry);

					$directorArray = array();
					while ( $dRow = $directorMovRs->fetch_assoc() ) 
					{
						array_push($directorArray, $dRow[did]);
					}

					if (empty($directorArray))
					{
						echo "<b>N/A</b>";
					}
					else
					{
						// get and print all relevant directors
						for($i = 0; $i<sizeof($directorArray); ++$i)
						{
							$currentDID = $directorArray[$i];
							$idDirQry = "SELECT id, first, last FROM 
							Director WHERE id=$currentDID";

							$idDirRS = $db->query($idDirQry);

							while ( $dRow2 = $idDirRS->fetch_assoc() ) 
							{
								echo 
								"<a href='show-director-info.php?id=$currentDID' 
								id='$currentDID'><b>". $dRow2[first] . " " . 
								$dRow2[last] . "</b></a>";

								if($i<sizeof($directorArray)-1)
								{
									echo ", ";
								}	
							}	
						}
					}
					echo "<br>Genre(s): ";
					// query to get genre of movie
					$genreMovQry = "SELECT genre FROM MovieGenre 
					WHERE mid=$movieID";
					$genreMovRs = $db->query($genreMovQry);

					$genreArray = array();

					while ( $gRow = $genreMovRs->fetch_assoc() ) 
					{
						array_push($genreArray, $gRow[genre]);
					}

					// get and print all relevant genres of movie
					for($i = 0; $i<sizeof($genreArray); ++$i)
					{
						echo "<b>" . $genreArray[$i] . "</b>";
						if($i<sizeof($genreArray)-1)
						{
							echo ", ";
						}		
					}
					
					// query the average rating of the movie
					echo "<br>Average Rating: ";
					$movRatingQry = "SELECT AVG(rating) FROM Review 
					WHERE mid=$movieID";

					$movRatingRs = $db->query($movRatingQry);

					while ( $rRow = $movRatingRs->fetch_assoc() ) 
					{
						foreach($rRow as $tplval)
						{
							$avgRating = sprintf('%0.2f', $tplval);
						}
					}
					if($avgRating != NULL && $avgRating >= 1)
					{
						echo "<b>" . $avgRating . "/5</b>";
					}
					else
					{
						echo "<b>No Ratings</b>";
					}	
						

				?>	
			</div>
				<a class="comment-button" href="add-movie-comments.php">Add Comment</a>	
			</div>	
			<div class="actor-info">
				<?php	
					// query all the actors and their roles in that movie
					$actorMovRoleQry = "SELECT aid, role FROM MovieActor 
					WHERE mid=$movieID";
					$actorMovRoleRs = $db->query($actorMovRoleQry);

					$actorRoleArray = array();
					while ( $aRow = $actorMovRoleRs->fetch_assoc() ) 
					{
						array_push($actorRoleArray, $aRow[aid], $aRow[role]);
					}
					
					// print all the actors and their roles in a table
					echo "<table class='actor-table'><tr><th 
					class='actor-results-heading'>Actor</th>
						<th class='actor-results-heading'>Role</th></tr>";
					for($i = 0; $i<sizeof($actorRoleArray); ++$i)
					{
						$currentAID = $actorRoleArray[$i];
						$idActRoleQry = "SELECT id, first, last FROM 
						Actor WHERE id=$currentAID";

						$idActRoleRS = $db->query($idActRoleQry);
						
						while ( $aRow2 = $idActRoleRS->fetch_assoc() ) 
						{
							echo "<tr class='actor-results-row'><td 
							class='actor-results'><a 
							href='show-actor-info.php?id=$currentAID' 
							id='$currentAID'>". $aRow2[first] . " " . 
							$aRow2[last] . "</a></td>";
							echo "<td class='role-result'>" . 
							$actorRoleArray[++$i] . "</td></tr>";
						}	
					}
					echo "</table>";	
				?>
			</div>
			<div class="subheading">Reviews:</div>
			<?php
				// query to get reviews of movie
				$commentsQry = "SELECT name, time, rating, comment FROM Review 
				WHERE mid=$movieID";

				$commentsRs = $db->query($commentsQry);
				$commentsArray = array();
				
				while ( $cRow = $commentsRs->fetch_assoc() ) 
				{
						array_push($commentsArray, $cRow[time], $cRow[name],  
						$cRow[comment], $cRow[rating]);
				}

				if(empty($commentsArray))
				{
					echo "No reviews yet";
				}
				else
				{
					// print all movie reviews
					for($i = 0; $i<(sizeof($commentsArray)); ++$i)
					{
						echo "<div>On " . $commentsArray[$i] . ", <b>" . $commentsArray[++$i] .
						"</b> wrote:<br>" . $commentsArray[++$i] . "<br>-<b>" . 
						$commentsArray[++$i] . "</b> star(s)</div><br>";

					}
				}	
			?>
		</div>
	</div>
</body>	
</html>	