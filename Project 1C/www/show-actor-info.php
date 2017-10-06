<!DOCTYPE html>
<html>
<head>
	<title>Actor</title>
	<style>
		.actor-description-container {
			font-size: 16px;
			text-align: center;
			margin-left: 20%;
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
		.actor-table {
			border-collapse: collapse;
			width: 80%;
		}
		.back-link {
			margin: 2%;
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
		.page {
			font-family: verdana;
		}
		.person-info {
			text-align: left;
			margin-top: 2%;
			margin-bottom: 2%;
		}
		.role-info {
			text-align: left;
		}
		.role-result {
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
	<div class="view-actor-info-field">
		<?php
			// get search term id from url
			$actorID = $_GET['id'];

			// establish connection with the database
			$db = new mysqli('localhost', 'cs143', '', 'CS143');

				// if can't establish a connection with the database, print
				// error message
				if($db->connect_errno > 0){
					ie('Unable to connect to database [' . $db->connect_error . 
					']');
				}

			// query to get information from the searched term
			$qryRetrieval = "SELECT * FROM Actor WHERE id =$actorID";
			$qryRetrievalRs = $db->query($qryRetrieval);

			$idInfo = array();
			while ( $row = $qryRetrievalRs->fetch_assoc() )
			{
    			foreach($row as $tplval)
	    		{
				    array_push($idInfo, $tplval);
	    		}
    		}
    		
    		// get information of the actor 
    		$retrievedID = $idInfo[0];
    		$retrievedLast = $idInfo[1];
    		$retrievedFirst = $idInfo[2];
    		$retrievedSex = $idInfo[3];
    		$retrievedDOB = $idInfo[4];
    		$retrievedDOD = $idInfo[5];
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
				if($retrievedSex == "Female")
				{
					echo "actress";
				}
				else
				{
					echo "actor";
				}	
			?>
		</h4>
		<div class="actor-description-container">
			<div class="person-info">
				<div><?php echo "Sex: " . "<b>$retrievedSex</b>";?></div>
				<div><?php echo "Born: " . "<b>$retrievedDOB</b>";?></div>
				<div><?php echo "Died: " . "<b>$retrievedDOD</b>";?></div>
			</div>
			<div class="role-info">
					<?php
						// establish a connection to the database
						$db = new mysqli('localhost', 'cs143', '', 'CS143');

						// print message if unable to connect to the database
						if($db->connect_errno > 0){
							ie('Unable to connect to database [' . 
							$db->connect_error . ']');
						}

						// query to get the actor's role from the movieactor 
						// table
						$actorMovRoleQry = "SELECT mid, role FROM MovieActor 
						WHERE aid=$actorID";
						$actorMovRoleRs = $db->query($actorMovRoleQry);

						$actorRoleArray = array();
						while ( $row = $actorMovRoleRs->fetch_assoc() ) 
						{
							array_push($actorRoleArray, $row[mid], $row[role]);
						}
						
						// print returned results
						echo "<table class='actor-table'><tr><th 
						class='actor-results-heading'>Movie</th>
							<th class='actor-results-heading'>Role</th></tr>";
						for($i = 0; $i<sizeof($actorRoleArray); ++$i)
						{
							// get the id for the actor to print movie title info
							$currentID = $actorRoleArray[$i];
							$idMovRoleQry = "SELECT id, title, year FROM 
							Movie WHERE id=$currentID";

							$idMovRoleRS = $db->query($idMovRoleQry);
							
							while ( $row2 = $idMovRoleRS->fetch_assoc() ) 
							{
								// print movie titles the actor has been in
								echo "<tr class='actor-results-row'><td 
								class='actor-results'><a 
								href='show-movie-info.php?id=$currentID' 
								id='$currentID'>" . $row2[title] . "</a></td>";
								echo "<td class='role-result'>" . 
								$actorRoleArray[++$i] . "</td>
								</tr>";
							}	
						}
						echo "</table>";	
					?>
			</div>
		</div>
	</div>
</body>	
</html>	