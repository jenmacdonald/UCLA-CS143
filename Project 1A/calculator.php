<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>	
</head>	
<body>
	<h1>Calculator</h1>
(Ver 1.0 10/09/16 by Jennifer MacDonald)
<br>
Type an expression in the following box (e.g., 10.5+20*3/25).
<p></p>

<form action="calculator.php" method="get">
	<input type="text" name="expr">
<input type="submit" value="Calculate" name="submit">
</form>

<p></p>
<ul>
	<li>Only numbers and +,-,* and / operators are allowed in the expression.</li>
	<li>The evaluation follows the standard operator precedence.</li>
	<li>The calculator does not support parentheses.</li>
	<li>The calculator handles invalid input "gracefully". It does not output PHP error messages.</li>
</ul>
Here are some(but not limit to) reasonable test cases:
<ol>
	<li>A basic arithmetic operation: 3+4*5=23</li>
	<li>An expression with floating point or negative sign: -3.2+2*4-1/3 = 4.46666666667, 3*-2.1*2 = -12.6</li>
	<li>Some typos inside operation (e.g. alphabetic letter): Invalid input expression 2d4+1</li>
</ol>

<?php
	function displayResult() // Displays result from user input
	{
		if(isset($_GET['expr']))
		{
			$inputStr = $_GET['expr'];
		}

		echo "<h2>Result</h2>";
		if(ereg("[a-zA-Z!@#$%^&()_{}|\;:?><]", $inputStr)) // Checks if valid input
		{	
			echo "Invalid Expression!";
		}
		else if(ereg("/0", $inputStr)) // Checks if division by 0
		{
			echo "Division by zero error!";
		}	
		else // Calculates answer from expression
		{
			echo $_GET['expr'];
			echo " = ";
			$finalCalc = eval("return ($inputStr);");
			echo $finalCalc;
		}	
	}
	if(isset($_GET['submit']))
	{
		displayResult();
	}
?>

</body>
</html>