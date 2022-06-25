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
	</div>
	
	<div id="top" class="regular_words text"> 
	  <h1>Cycling uses no fuel</h1>
	  <p>Cycling uses no fuel or electricity to use. This means no greenhouse emmisions that are contributing to climate change.</p>
		<img src="../Images/environment_fuel.jpg" alt="picture of bicycle in a forest">
	  <h1>Less energy and resources to make a bicycle</h1>
	  <p>Bicycles are smaller and have no large engines like cars do. This means aswell as not using up any feul it also used up a lot less energy and resources to create then a car would have. </p>
		<img src="../Images/" alt="">
		<h1>Doesn't require toxic batteries or motor oil </h1>
		<p>Cars use lots of toxic products to run and to maintain. These extras materials required use resources and enery to create, which cycling doesn't require. And this materials are very toxic and when not disposed of propberly can end up in our waterways.</p>
		<img src="../Images/" alt="">
		<h1 id="air_pollution">How much air pollution is prevented</h1>
		<p>Different vehicles have different efficiency (kilometres per litre of petrol), require different amounts of petrol, and put different amounts of CO2 into the air. So depending on what type of car is being switched out for a bicycle the amount of pollution prevented differs.</p>
		<div id="php">
			
			<form action="Environment_results.php" method="post" id="fmSearch">
			<!--<P>Query: <input type="text" size="12" name="search"/></p>-->
			<P>Vehicle:<br /><select class='button form' name = "vehicle">
			<option value="microcar">microcar</option>
			<option value="supermini">supermini</option>
			<option value="small family car">small family car</option>
			<option value="large family car">large family car</option>
			<option value="full-size car">full-size car</option>
			<option value="SUV">SUV</option>
			</select>
				
			<P>Fuel:<br /><select class="form" name = "fuel">
			<option value="petrol">petrol</option>
			<option value="diesel">diesel</option>
			<option value="LPG">LPG</option>
			</select>
				
			<P>Distance per trip (Km):<br /><input class="form" type="number" step="any" name="distance" required/></p>
				
			<P>Trips per week:<br /><input class="form" type="number" name="trips" required/></p>
				
			<P>Time Period:<br /><select class="form" name = "time_period">
			<option value="week">week</option>
			<option value="month">month</option>
			<option value="year">year</option>
			</select>
				
			<P> <input type="submit" value="Submit" name="submit"/></p>
														   
			</form>
		
		</div>
		<img src="../Images/environment_air.jpg" alt="picture of clean air">
		<p>And those are just the pollutants from fuel use. From the foam and plastic in its seats to the petroleum in its tires, each car is a small pollution factory. Several tons of waste and 1.2 billion cubic yards of polluted air are generated in its manufacture alone! In 2008 the US produced 1.6 million billion metric tons of waste mining ore for automotive production. In the US each year, painting and coating cars produces 40 million pounds of air releases and 24 million pounds of hazardous wastes.</p>
		<p>During its lifetime, on the road, each car produces another 1.3 billion cubic yards of polluted air and scatters an additional 40 pounds of worn tire particles, brake debris and worn road surface into the atmosphere.</p>
		<p>Bicycling significantly reduces transportation emissions while also reducing traffic congestion and the need for petroleum. The total number of pounds of pollutants, (comprised of hydrocarbons, carbon monoxide, nitrogen oxides and carbon dioxide), emitted per year is 12,140.30 lbs/year (or 0.97 lbs/mile) for passenger cars and 17,025.80 lbs/year (or 1.21 lbs/mile) for light trucks.</p>
		
		
		
	</div>
	
	<footer>
	<div id="words_in_footer">
		<span class="heading"><h2>Simply Cycling</h2></span>
		<span id="about_contact_copyright" class="heading"><a href="About.html">About</a> | <a href="Contact_Us.html">Contact Us</a> | <a href="Copyright.html">Copyright</a></span>
	</div>
	</footer>

</body>
</html>