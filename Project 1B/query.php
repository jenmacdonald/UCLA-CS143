<!DOCTYPE html>
<html>
<head>
	<title>CS143 Project 1B</title>
</head>
<body>
	<p>
		Type an SQL query in the following box: 
	</p>
	<p>
		Example:
		<tt>SELECT * FROM Actor WHERE id=10;</tt>
		<br>
	</p>
	<form action="query.php" method="get">
		<textarea type="text" name="query" cols='60' rows='8'></textarea>
		<br>
		<input type="submit" value="Submit" name="submit">
	</form>
	<p>
		<small>Note: tables and fields are case sensitive. All tables in Project 1B are available.</small>
	</p>	
<?php
	function displayResult() // Displays table of results generated from query
	{
		if(isset($_GET['query'])) 
		{
			echo "<h3>Results from MySQL</h3>";
			$db = new mysqli('localhost', 'cs143', '', 'CS143'); // Instantiate new instance of mysqli

			if($db->connect_errno > 0){ // Error check
				die('Unable to connect to database [' . $db->connect_error . ']');
			}

			$qry = (string)$_GET['query']; // Takes in input from text area
			$rs = $db->query($qry); // Saves results of query into rs

			$fieldinfo=mysqli_fetch_fields($rs); // Returns attribute names

			echo "<table border='1' cellspacing='1' cellpadding='2'>"; // Creates html table
			echo "<tr>";
			foreach ($fieldinfo as $attrval) // Loops through and prints out all attribute names
    		{
			    echo "<th align='center'>";
			    echo $attrval->name;
			    echo "</th>";
    		}
    		echo "</tr>";
    		
			while ( $row = $rs->fetch_assoc() ) // Loops while result row can be returned
			{
    			echo "<tr>";
    			foreach($row as $tplval) // Loops through and prints each attribute value
	    		{
				    echo "<td align='center'>";
				    if (is_null($tplval))
				    	echo "N/A";
				    else
				    	echo $tplval;
				    echo "</td>";
	    		}
	    		echo "</tr>";
    		}	
			echo "</table>"; // End table
   			$rs->free(); // Free result
		}
	}
	if(isset($_GET['submit'])) // Check if query is in text area
	{
		displayResult();
	}
?>	
</body>	
</html>