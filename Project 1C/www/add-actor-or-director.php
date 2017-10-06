<!DOCTYPE html>
<html>
<head>
	<title>Add Actor or Director</title>
	<style>
		.add-person-field {
			color: black;
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
		}
		.err-text {
			color: red;
			display: inline-block;
			font-size: 12px;
		}
		.err-wrapper {
			margin-left: 30%;
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
	<div class="add-person-field" id="add-person-page">
		<h1 class="heading">Add Actor or Director</h1>
		<form action="add-actor-or-director.php" method="get" id="submit-form">
			<input class="input-form" type="radio" name="person" value="Actor"
			id="actor" onclick="disableSex()">Actor
			<input class="input-form" type="radio" name="person"
			value="Director" id="director" onclick="disableSex()">Director
			<br><br>
			<div class="label"><b>First name</b></div>
			<input class="input-form text-field" type="text" name="first" 
			maxlength="20">
			<br>
			<div class="label"><b>Last name</b></div>
			<input class=" input-form text-field" type="text" name="last" 
			maxlength="20">
			<br><br>
			<div class="label"><b>Sex</b></div>
			<input class="input-form" type="radio" name="sex" value="Male"
			id="male">Male
			<input class="input-form" type="radio" name="sex" value="Female" 
			id="female">Female
			<input class="input-form" type="radio" name="sex" value="Other"
			id="other">Other
			<br><br>
			<div class="label"><b>Date of Birth</b></div>
			<div class="input-form">
				<select class="dropdown" name="dob-month">
	    			<option disabled selected value>Month</option>
	    			<option value="01">01</option>
	    			<option value="02">02</option>
	    			<option value="03">03</option>
	    			<option value="04">04</option>
	    			<option value="05">05</option>
	    			<option value="06">06</option>
	    			<option value="07">07</option>
	    			<option value="08">08</option>
	    			<option value="09">09</option>
	    			<?php
	    				// print out double digit birth months
	    				for ($i=10; $i<=12; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
  				</select>
	  			<select class="dropdown" name="dob-day">
	  				<option disabled selected value>Day</option>
	  				<option value="01">01</option>
	    			<option value="02">02</option>
	    			<option value="03">03</option>
	    			<option value="04">04</option>
	    			<option value="05">05</option>
	    			<option value="06">06</option>
	    			<option value="07">07</option>
	    			<option value="08">08</option>
	    			<option value="09">09</option>
	    			<?php
	    				// print out double digit birth days
	    				for ($i=10; $i<=31; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
	  			</select>
	  			<select class="dropdown" name="dob-year">
	    			<option disabled selected value>Year</option>
	    			<?php
	    				// print out birth years from 1900 to present
	    				for ($i=1900; $i<=2016; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
	  			</select>
			</div>
			<div class="label"><b>Date of Death</b></div>
			<div class="input-form">
				<select class="dropdown" name="dod-month" id="dod-month">
	    			<option disabled selected value>Month</option>
	    			<option value="01">01</option>
	    			<option value="02">02</option>
	    			<option value="03">03</option>
	    			<option value="04">04</option>
	    			<option value="05">05</option>
	    			<option value="06">06</option>
	    			<option value="07">07</option>
	    			<option value="08">08</option>
	    			<option value="09">09</option>
	    			<?php
	    				// print out double digit death months
	    				for ($i=10; $i<=12; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
  				</select>
	  			<select class="dropdown" name="dod-day" id="dod-day">
	  				<option disabled selected value>Day</option>
	  				<option value="01">01</option>
	    			<option value="02">02</option>
	    			<option value="03">03</option>
	    			<option value="04">04</option>
	    			<option value="05">05</option>
	    			<option value="06">06</option>
	    			<option value="07">07</option>
	    			<option value="08">08</option>
	    			<option value="09">09</option>
	    			<?php
	    				// print out double digit death days
	    				for ($i=10; $i<=31; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
	  			</select>
	  			<select class="dropdown" name="dod-year" id="dod-year">
	  				<option disabled selected value>Year</option>
	    			<?php
	    				// print out death years from 1900 to present
	    				for ($i=1900; $i<=2016; $i++)
	    				{
	        		?>
	            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
	        		<?php
	    				}
					?>
	  			</select>
			</div>
			<input class=" input-form" type="checkbox" name="isAlive" 
			value="isAlive" onclick="disableDOD()">Check instead if alive
			<br><br>
			<div class="button-container">
				<input class="submit-button" type="submit" value="Submit" 
				name="submit-button">
			</div>
		</form>
	</div>	
	<script>
		// function to disable date of death when "check if alive" checkbox is
		// checked
		function disableDOD()
		{
			// disable death month
			document.getElementById('dod-month').disabled = 
			!document.getElementById('dod-month').disabled;
			// disable death day
			document.getElementById('dod-day').disabled = 
			!document.getElementById('dod-day').disabled;
			// disable death year
			document.getElementById('dod-year').disabled = 
			!document.getElementById('dod-year').disabled;
		}
		// disable sex when the director radio button is selected
		function disableSex()
		{
			// check if director radio button selected
			if((document.getElementById('director')).checked && 
				(!document.getElementById('male').disabled))
			{
				
				// disable male radio button option
				document.getElementById('male').disabled = 
				!document.getElementById('male').disabled;
				// disable female radio button option
				document.getElementById('female').disabled = 
				!document.getElementById('female').disabled;
				// disable other radio button option
				document.getElementById('other').disabled = 
				!document.getElementById('other').disabled;	
			}
			// check if  actor is checked but sex radio buttons are disabled
			if((document.getElementById('actor')).checked && 
				(document.getElementById('male').disabled))
			{
				
				// disable male radio button
				document.getElementById('male').disabled = 
				!document.getElementById('male').disabled;
				// disable female radio button
				document.getElementById('female').disabled = 
				!document.getElementById('female').disabled;
				// disable other radio button
				document.getElementById('other').disabled = 
				!document.getElementById('other').disabled;	
			}
		}
	</script>
	<?php
		// check if submit button is clicked
		if(isset($_GET['submit-button'])) 
		{
			// check if all inputs are valid
			if(checkForm() == true)
			{
				// add actor or director to the database
				addPersonTuple();
			}	
		}
		// check if inputs are valid
		function checkForm()
		{
			// boolean flags
			$checkPerson = $checkFirstNotEmpty = $checkFirstValid = 
			$checkLastNotEmpty = $checkLastValid = $checkSex = $checkDOB = 
			$checkDOD = $checkDODAfter = $checkIfAlive = false;

			// check if job is selected
			if(isset($_GET['person']))
			{
				$checkPerson=true;
			}
			// check if job is empty and valid
			if(!empty($_GET['first']))
			{
				$checkFirstNotEmpty=true;
				if(preg_match('/^[a-z\s\'-]+$/i', $_GET['first']) &&
				   	ctype_upper($_GET['first'][0]))
				{
					$checkFirstValid=true;
				}	
			}
			else
			{
				$checkFirstValid=true;
			}	
			
			// check if job is empty and valid
			if(!empty($_GET['last']))
			{
				$checkLastNotEmpty=true;
				if(preg_match('/^[a-z\s\'-]+$/i', $_GET['last']) &&
				   	ctype_upper($_GET['last'][0]))
				{
					$checkLastValid=true;
				}	
			}
			else
			{
				$checkLastValid=true;
			}
			
			// check if sex is selected
			if(isset($_GET['sex']))
			{
				$checkSex=true;
			}
			
			// check if birth date is valid
			if(checkdate($_GET['dob-month'],$_GET['dob-day'],$_GET['dob-year']))
			{
				$checkDOB=true;
			}
			// check if death date is valid
			if(checkdate($_GET['dod-month'],$_GET['dod-day'],$_GET['dod-year']))
			{
				$checkDOD=true;
			}
			// check if "check if alive checkbox is checked"
			if(isset($_GET['isAlive']))
			{
				$checkIfAlive=true;
			}
			// check that combination birth/death is valid (i.e. either death or still 
			// alive selected, but not both)
			if((($_GET['dod-year']>$_GET['dob-year']) || $checkIfAlive == true) 
				&& $checkDOD == true)
			{
				$checkDODAfter=true;
			}
			elseif(($_GET['dod-year']==$_GET['dob-year']) && $checkDOD == true)
			{
				if(($_GET['dod-month']>$_GET['dob-month']) && $checkDOD == true)
				{
					$checkDODAfter=true;
				}
				elseif(($_GET['dod-month']==$_GET['dob-month']) && $checkDOD == 
					true)
				{
					if(($_GET['dod-day']>=$_GET['dod-day']) && $checkDOD == 
						true)
					{
						$checkDODAfter=true;
					}	
				}	
			}

			// check that all valid combinations of boolean flags are true
			if($checkPerson == true && $checkFirstNotEmpty == true && 
				$checkFirstValid == true && $checkLastNotEmpty == true &&
				$checkLastValid == true && $checkDOB == true)
			{
				if(($_GET['person']=='Actor' && $checkSex == true) || 
				   ($_GET['person']=='Director' && $checkSex == false))
				{
					if($checkDOD == true || $checkIfAlive == true)
					{
						return true;
					}	
				}
			}	
			
			// print out error messages for invalid input
			$errMessage = "ERROR! Please fix the issues listed:<br><br>";
			if($checkPerson == false)
			{
				$errMessage = $errMessage . "Please indicate whether you 
				want to add an actor or a director.<br>";
			}
			if($checkFirstNotEmpty == false)
			{
				$errMessage = $errMessage . "Please enter a first name.<br>";
			}
			else if($checkFirstValid == false && $checkFirstNotEmpty == true)
			{
				$errMessage = $errMessage . "The first name you have entered
				is not valid. Please enter a capitalized name with only 
				letters, dashes, spaces, and apostrophes.<br>";
			}
			if($checkLastNotEmpty == false)
			{
				$errMessage = $errMessage . "Please enter a last name.<br>";
			}
			else if($checkLastValid == false && $checkLastNotEmpty == true)
			{
				$errMessage = $errMessage . "The last name you have entered
				is not valid. Please enter a capitalized name with only 
				letters, dashes, spaces, and apostrophes.<br>";
			}
			if(($_GET['person']== "actor" && $checkSex == false) || 
				($checkPerson == false && $checkSex == false))
			{
				$errMessage = $errMessage . "Please indicate what sex the 
				person is.<br>";
			}	
			if($checkDOB == false)
			{
				$errMessage = $errMessage . "Please enter a valid date of 
				birth.<br>";
			}
			if($checkDOD == false && $checkIfAlive == false)
			{
				$errMessage = $errMessage . "Please either enter a valid 
				date of death or indicate that the person is still 
				alive.<br>";
			}
			if($checkDOD == true && $checkDODAfter == false)
			{
				$errMessage = $errMessage . "Please enter a valid date of death 
				after the indicated date of birth..<br>";
			}	
			
			// print out error message
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
		
		// function that adds actor or director tuple to the database
		function addPersonTuple()
		{
			
			// establish connection to the database
			$db = new mysqli('localhost', 'cs143', '', 'CS143');

			// error message
			if($db->connect_errno > 0){
				ie('Unable to connect to database [' . $db->connect_error . 
				']');
			}
			
			// query and save results of max person id
			$maxIDQry = "SELECT id FROM MaxPersonID";
			$maxIDRs = $db->query($maxIDQry);
			while ( $row = $maxIDRs->fetch_assoc() )
			{
				foreach($row as $tplval)
				{
					$maxPersonIDRes = $tplval;
				}
			}
			// set next max person id
			$newMaxPersonID = intval($maxPersonIDRes) + 1;

			// get values for tuple insertion
			$personJob = $_GET['person'];
			$firstName = $_GET['first'];
			$lastName = $_GET['last'];
			$personSex = $_GET['sex'];
			$personDOB = $_GET['dob-year'] . "-" . $_GET['dob-month'] . "-" . 
			$_GET['dob-day'];

			if(isset($_GET['dod-year']) && isset($_GET['dod-month']) && 
				isset($_GET['dod-day']))
			{
				$personDOD = $_GET['dod-year'] . "-" . $_GET['dod-month'] . "-" 
				. $_GET['dod-day'];
			}	
			else
			{
				$personDOD = NULL;
			}
			
			// create query for either actor or director
			if($personJob == 'Actor')
			{
				$addPersonQry = "INSERT INTO Actor(id, last, first, sex, dob, 
				dod) VALUES('$newMaxPersonID', '$lastName', '$firstName', 
				'$personSex', '$personDOB', '$personDOD')";
				$personJob = "an Actor";
			}
			else
			{
				$addPersonQry = "INSERT INTO Director(id, last, first, dob, dod)
				VALUES('$newMaxPersonID', '$lastName', '$firstName', 
				'$personDOB', '$personDOD')";
				$personJob = "a Director";
			}
			
			// create query to update max person id
			$updateMaxIDQry = "UPDATE MaxPersonID SET id=$newMaxPersonID WHERE 
			id=$maxPersonIDRes";

			$name = $firstName . " " . $lastName;

			// check if both queries are valid
			if(($db->query($addPersonQry) === true) && 
				($db->query($updateMaxIDQry) === true))
			{
				// success alert
				echo '<script type="text/javascript">
				window.alert("Success! '. $name .' has been added as ' . $personJob . 
					' to the database.");</script>';
			}
			else
			{
				// failure alert
				echo '<script type="text/javascript"> window.alert("Unable to connect 
				to database [' . $db->connect_error . ']");</script>';
			}	
		}
	?>
</body>	
</html>	