<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Economica|Rubik&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../CSS/desktop.css">
<link rel="stylesheet" href="../CSS/style.css">
<title>Simply Cycling | Environment</title>
<link rel="shortcut icon" href="../Images/Simply_Cycling_Logo.png">
</head>

<body>
  <header>
		<span><a href="../simplyCycling.html"><img src="../Images/Simply_Cycling_Logo.png" alt="Logo"></a></span>
		<span id="Name_of_Webpage" class="heading"><a href="../simplyCycling.html">Simply Cycling</a></span>
		<a href="Environment.php"><span class ="oval nav_link regular_words">Environment</span></a>
		<a href="Convenience.html"><span class ="oval nav_link regular_words">Convenience</span></a>
		<a href="Health.html"><span class ="oval nav_link regular_words">Health</span></a>
		<a href="Money.html"><span class ="oval nav_link regular_words">Money</span></a>
	</header>

	<div id="main_heading">
	  <img id="main_image" src="../Images/environment_button.jpg" alt="picture of trees">
	  <h1 class ="heading">Environment</h1>
	  <a href="#top"><img id="arrow" src="../Images/orange_arrow.png" alt="scroll down"></a>
	</div> <!--Main Heading-->
	
	<div id="top" class="regular_words text"> 
		<h1>How much air pollution is prevented</h1>
		
		<?php
		//this checks that there is something entered in every box
			if (!$_POST['distance'] && !$_POST['trips']){
				echo 'Please go back and enter a distance and amount of trips';
				exit;
			}else if (!$_POST['trips']){
				echo 'Please go back and enter an amount of trips';
				exit;
			}else if (!$_POST['distance']){
				echo 'Please go back and enter a distance';
				exit;
			}
			// now we have that we make a variable of the POST return
			else {
				$vehicle = $_POST['vehicle'];
				$fuel = $_POST['fuel'];
				$distance = $_POST['distance'];
				$trips = $_POST['trips'];
				$time_period = $_POST['time_period'];
			}
			// Next up is connecting to the server and the database on it. Note the log in details are in the code here and so exposed at the moment.

			$dbconn = @mysqli_connect('localhost', 'root', '', 'db_yr12dgm2');
			
			//now check that we have a connection. !dbconn means if there ISNT a dbconn variable defined, as above...ie: connection failed
			if(!$dbconn){
				echo 'PHP could not connect to the database server';
				exit();
			}
			//define a query and we use mysql syntax in this variable to pass to the server			
			$sql = "UPDATE vehicles SET fuel_type = '$fuel' WHERE vehicle = '$vehicle';";
			$dbconn->query($sql);

			$sql2 = "SELECT fuel.co2 FROM fuel WHERE fuel_type = '$fuel';";
			$result_co2 = mysqli_query($dbconn, $sql2);
			$row2 = mysqli_fetch_assoc($result_co2);

			//echo $fuel." ".$vehicle." ".$row2;
				
			$query = "SELECT * FROM vehicles WHERE vehicle = '$vehicle'; ";		
			// we define a result variable which is what the $query passed through dbconn is using the  in built function mysqli_query()
			$result = mysqli_query($dbconn, $query);

			//next up is we count the number of rows we get back from the query using the in built function mysqli_num_rows() so we know if we have something to display or not
			$num_rows = mysqli_num_rows($result);

			//if the number of rows is 0 then there were no records found so we tell them so and exit so they can go on or try again
			if($num_rows == 0){
				echo 'No results were found';
				exit;
			}
			?>
			<!--regular table to display the results with a column for each entry we want the query ot show. " rows, one fo the titles and one which we can expand for the actual results
			Note that we are in HTML territory at the moment-->
	
		
		<!--	<table width="800" border="1" cellpadding="10">
  
    	<tr>
    	  <td align = center>Vehicle</td>
    	  <td align = center>Efficiency (L per 100km)</td>
    	  <td align = center>Fuel Type</td>
		  <td align = center>CO2 emissions</td>
   	 	</tr>  -->
		<?php 
		  // we want the row that displays the results to expand if 	necessary so we define row as the result return in a while loop
		while ($row = mysqli_fetch_assoc($result))
		{?>
		<!--meanwhile back in HTML land we need snippets of php in the table cells below to show the results. While the is a result to show, put it in a cell is what the function just said so $row gets echo'd below-->
<!--    <tr>
      <td align = center><?php echo $row['vehicle'];?></td>
      <td align = center><?php echo $row['efficiency'];?></td>
      <td align = center><?php echo $row['fuel_type'];?></td>
	  <td align = center><?php echo $row2['co2'];?></td>
    </tr>--><?php } ?>
     
<!--  </table> -->
			<?php 
			$sql3 = "SELECT efficiency FROM vehicles WHERE vehicle = '$vehicle'; ";		

			// we define a result variable which is what the $query passed through dbconn is using the  in built function mysqli_query()
			$result_efficiency = mysqli_query($dbconn, $sql3);
$row3 = mysqli_fetch_assoc($result_efficiency);
				
			//finds efficiency and co2 values	
			$efficiency = $row3['efficiency'];
			$co2 = $row2['co2'];
            
            //finds number of weeks for time period
			if ($time_period==="week"){
				$weeks = 1;}
			else if ($time_period==="month"){
				$weeks = 4.35;
			}else if ($time_period==="year"){
				$weeks = 52;}

			//calculates values	
			$distance_driven = $distance*$trips*$weeks;
			$fuel_used = $distance_driven*$efficiency;
			$co2_produced = $fuel_used*$co2; 
			?>
		<div id="php">
			<p>
			<span><?php echo "In a ".$time_period. " you will drive " ?></span> <span class="bold">
			<?php echo number_format($distance_driven). "km " ?></span>
				<br />
			<span>You will use </span> <span class="bold">
			<?php echo number_format($fuel_used). "L ";?></span> <span>of fuel</span>
				<br />
			<span>And you will emit </span> <span class="bold">
			<?php echo number_format($co2_produced). "kg " ?></span> <span>of carbon dioxide</span>
			</p>
			
		</div> <!--id="php"-->

		<p>	If you started cycling instead of driving you could prevent all that carbon dioxide and fuel. Even just cutting down and cycling one a day a week could have a big impact. <a href="Environment.php#air_pollution" id="in_text_link">Go back</a> and see how much less carbon dioxide you would emmit if you took a couple less car trips every week.</p>
			
	</div> <!--id="top" class="regular_words text"-->
	
	<footer>
		<div id="words_in_footer">
			<span class="heading"><h2>Simply Cycling</h2></span>
			<span id="about_contact_copyright" class="heading"><a href="	About.html">About</a> | <a href="Contact_Us.html">Contact Us</a> | <a href="Copyright.html">Copyright</a></span>
		</div>
	</footer> 
 	<!--last up, we need to free up the server and close the connection with the 2 functions that are built into php for the purpose as shown here below-->
	<?php 
	 
	mysqli_free_result($result);
	mysqli_close($dbconn);
	?>

</body>
</html>