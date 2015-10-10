<!DOCTYPE html>
<html>
	<!--This is the main registration page done in HTML, JavaScript and CSS-->
	<!--The purpose of this page is to collect data and validate it using-->
	<!--client-side script prior to passing it on to the PHP page for processing.-->
	<head>
		<meta charset="utf-8"/>
		<title>HelloWorld Software Engineering Assignment - Tareq Falah</title>
		<!--Using a Google Web Font to display the text-->
		<link href='https://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet' type='text/css'>

		<!-- The main CSS file -->
		<link href="css/style.css" rel="stylesheet" />

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--Including client side validations-->
		<script type="text/javascript">
      		function validate()
      		{
      			// A few different types of validation occurring here.  We are first looking to see if
      			// the required fields (everything but Address2) has actual data in it.  If it does, then
      			// we also want to validate the type of data in that field.  We can use regular expressions
      			// to help check. If there is an error, then we capture it in a separate object so that it 
      			// is visible to the user and stop processing.
      			
      			// There are three types of expressions used here:
      			// This will accept Alpha and whitespace only
      			var regexAlpha = /^[a-zA-Z ]+$/;
      			// This will accept Numeric only
      			var regexNum = /^[0-9]+$/;
      			// This will accept Alpha, Numeric and whitespace
      			var regexAlphaNumWhite = /^[a-zA-Z0-9 ]*$/;
      			
      			// Begin Validation
         		if( document.regblock.fname.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*Please include your First name";
            			return false;
         		}
         		if(!regexAlpha.test(document.regblock.fname.value))
         		{
         			document.getElementById('errors').innerHTML = "*Names must only contain letters";
         			return false;
         		}
         		if( document.regblock.lname.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*Please include your Last Name";
            			return false;
         		}
         		if(!regexAlpha.test(document.regblock.lname.value))
         		{
         			document.getElementById('errors').innerHTML = "*Names must only contain letters";
         			return false;
         		}
         		if( document.regblock.address1.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*You must include the first Address field";
            			return false;
         		}
         		if(!(regexAlphaNumWhite.test(document.regblock.address1.value)))
         		{
         			document.getElementById('errors').innerHTML = "*Addresses should only contain letters, numbers and spaces";
         			return false;
         		}
         		if(!regexAlphaNumWhite.test(document.regblock.address2.value))
         		{
         			document.getElementById('errors').innerHTML = "*Addresses should only contain letters, numbers and spaces";
         			return false;
         		}
         		if( document.regblock.city.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*Please include your City";
            			return false;
         		}
         		if(!regexAlphaNumWhite.test(document.regblock.city.value))
         		{
         			document.getElementById('errors').innerHTML = "*Cities should only contain letters, numbers and spaces";
         			return false;
         		}
         		if( document.regblock.zip.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*Please include your Zip Code (5 or 9 digits, no spaces or extra characters)";
            			return false;
         		}
         		if(!regexNum.test(document.regblock.zip.value))
         		{
         			document.getElementById('errors').innerHTML = "*Zip Codes should only contain numbers";
         			return false;
         		}
         		if ( ( isNaN(document.regblock.zip.value) ) || ((document.regblock.zip.value.length != 5) && (document.regblock.zip.value.length != 9)) )
         		{
         			document.getElementById('errors').innerHTML = "*Zip Code must be numeric only (5 or 9 digits, no spaces or extra characters)";
         			return false;
         		}
         		if ( document.regblock.country.value == "" )
         		{
            			document.getElementById('errors').innerHTML = "*Please enter your Country";
            			return false;
         		}
         		if(!regexAlpha.test(document.regblock.country.value))
         		{
         			document.getElementById('errors').innerHTML = "*Countries should only contain letters and spaces";
         			return false;
         		}
         		// If the data is valid, we can continue
         		return true;
      		}
		</script>
	</head>

	<body>
		<!--Our HTML form regblock uses a POST and sends the data to the run PHP script.  Prior to that, it will use the-->
		<!--JavaScript validate function defined previously to ensure the data is clean to proceed-->
		<form name="regblock" id="regblock" method="post" action="run.php" onsubmit="return validate();">
			<h1>Registration Form</h1>
			<h2>Please complete all required fields in order to register your account in our system.</h2>
			<label for="fname" >*First Name: </label>
			<input type="text" name="fname" id="fname" maxlength="50" />
			<label for="lname" >*Last Name:</label>
			<input type="text" name="lname" id="lname" maxlength="50" />
			<label for="address1" >*Address 1:</label>
			<input type="text" name="address1" id="address1" maxlength="50" />
			<label for="address2" >Address 2:</label>
			<input type="address2" name="address2" id="address2" maxlength="50" />
			<label for="city">*City:</label>
			<input type="text" name="city" id="city" maxlength="50" />
			<label for="state">*State:</label>
			<select name="state" id="state">
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
			<br />
			<label for="zip">*Zip Code:</label>
			<input type="text" name="zip" id="zip" maxlength="9" />
			<label for="country">*Country (currently limited to USA only):</label>
			<input type="text" name="country" id="country" maxlength="50" value="USA" readonly />
			<!--If there are any errors, the innerHTML attribute of this div will get set-->
			<div id="errors">
			</div>		
			<!--Submit button allows the data to get validated and if successful, posted to the run script.-->
			<button type="submit">Submit</button>
		</form> 
	</body>
</html>