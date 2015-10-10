<?php
// Define the variables collected from the form
$fnameError = $lnameError = $address1Error = $address2Error = $cityError = $stateError = $zipError = $countryError = " ";

// Ensure that we are actually using a POST
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

// Perform the same type of validation as previously in the HTML file
if (empty($_POST["fname"])) 
  {
    $fnameError = "First Name is a required field";
  } 
  else 
  {
    $fname = CleanData($_POST["fname"]);
	if (!preg_match("/^[a-zA-Z ]+$/",$fname))
	{
		$fnameError = "Letters only are allowed in names";
	}
  }
  if (empty($_POST["lname"])) 
  {
    $lnameError = "Last Name is a required field";
  } else 
  {
    $lname = CleanData($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z ]+$/",$lname))
	{
		$lnameError = "Letters only are allowed in names";
	}
  }
 if (empty($_POST["address1"])) 
  {
    $address1Error = "Address 1 is a required field";
  } else 
  {
    $address1 = CleanData($_POST["address1"]);
    if (!preg_match("/^[a-zA-Z0-9 ]+$/",$address1))
    {
    	$address1Error = "Addresses can only contain letters, numbers and whitespace";
    }
  }
  if (! (empty($_POST["address2"]))) 
  {
    $address2 = CleanData($_POST["address2"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$address2))
    {
    	$address2Error = "Addresses can only contain letters, numbers and whitespace";
    }
  }
if (empty($_POST["city"])) 
  {
    $cityError = "City is a required field";
  } else 
  {
    $city = CleanData($_POST["city"]);
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$city))
    {
    	$cityError = "Cities can only contain letters, numbers and whitespace";
    }
  }
if (empty($_POST["state"]))
  {
    $stateError = "State is a required field";
  }
  else
  {
    $state = CleanData($_POST["state"]);
    if (!preg_match("/^[a-zA-Z ]+$/",$lname))
    {
    	$stateError = "States must contain letters only";
    }
    if (strlen($state) != 2)
    {
    	$stateError = "States must only be two characters long";
    }
  }
if (empty($_POST["zip"])) 
  {
    $zipError = "Zip Code is a required field";
  } 
  else 
  {
    $zip = CleanData($_POST["zip"]);
    if (!preg_match("/^[0-9]+$/", $zip))
    {
    	$zipError = "Zip Codes must only contain numbers";
    }
    elseif (strlen($zip) != 5 and strlen($zip) != 9)
    {
    	$zipError = "Zip Codes must only contain numbers and be 5 or 9 digits in length";
    	echo strlen($zip);
    }
  }
  if (empty($_POST["country"]))
  {
    $countyError = "Country is a required field";
  }
  else
  {
    $country = CleanData($_POST["country"]);
    if (!preg_match("/^[a-zA-Z ]+$/",$country))
    {
    	$countryError = "Countries must contain letters only";
    }
  }
  // Now check if there were any errors and if so, display them.  If not, we can proceed with capturing the data
  if ($fnameError != " " or  $lnameError != " " or $address1Error != " " or $address2Error != " " or $cityError != " " or $stateError != " " or $zipError != " " or $countryError != " ")
  {
  	// Detail what each error was (if there are multiple)
  	echo "There was a problem with your submission <br />";
  	if ($fnameError != " ")
  	{
  		echo $fnameError. "<br />";
  	}
  	if ($lnameError != " ")
  	{
  		echo $lnameError . "<br />";
  	}
  	if ($address1Error != " ")
  	{
  		echo $address1Error . "<br />";
  	}
  	if ($address2Error != " ")
  	{
  		echo $address2Error . "<br />";
  	}
  	if ($cityError != " ")
  	{
  		echo $cityError . "<br />";
  	}
  	if ($stateError != " ")
  	{
  		echo $stateError. "<br />";
  	}
  	if ($zipError != " ")
  	{
  		echo $zipError . "<br />";
  	}
  	if ($countryError != " ")
  	{
  		echo $countryError . "<br />";
  	}
  	// Lastly, display a simple link to return
  	echo '<h2><a href="register.php">Return to Registration</a></h2>';
  }
  else
  {
  	// Include the connection now
  	include('sconnect.php');
  	$sql = "INSERT INTO user_registration(fname, lname, address1, address2, city, state, zip, country) VALUES('$fname', '$lname', '$address1', '$address2', '$city', '$state', '$zip', '$country')";
	$res=mysql_query($sql);
	// Ensure that the records were actually inseretd
	if($res)
	{
		// The record was inserted successfully, so we can navigate to the confirmation page
		header('Location: confirmation.php');
	}
	else
	{
		// There was an error with inserting the data so we should report it
		echo "Could not successfully add your record to the database";
	}
  }
}

// Simple function to clean the data to prevent extra characters and potential exploits
function CleanData($preClean) 
  {
    $preClean = trim($preClean);
    $preClean = stripslashes($preClean);
    $preClean= htmlspecialchars($preClean);
    return $preClean;
  }
?>