<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Administration Page</title>
		
		<!-- The main CSS file -->
		<link href="css/TableStyle.css" rel="stylesheet" />

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>
		<?php
		// Include the connection now
  		include('sconnect.php');
  		// Simple SELECT statement to return all rows, ordered by date in descending order
  		$sql = "SELECT * FROM user_registration ORDER BY date DESC;";
		$res=mysql_query($sql);
		$numRows=mysql_numrows($res);
		mysql_close();
		// Check to see if we have any records returned
		if($numRows > 0)
		{
			// We have at least one record, so we should proceed with styling appropriately
			?>
		<!--Using a separate CSS template for the table to stylize it-->
		<div class="TableStyle">
			<table>
				<tbody>
					<tr>
						<td>UserId</td>
						<td>First Name</td>
						<td>Last Name</td>
						<td>Address 1</td>
						<td>Address 2</td>
						<td>City</td>
						<td>State</td>
						<td>Zip</td>
						<td>Country</td>
						<td>Timestamp</td>
					</tr>
					<?php
					$x=0;
					// Using a while loop, iterate through all of the records in our SELECT statement
					while ($x < $numRows) 
					{
						$fname = mysql_result($res, $x, "fname");
						$lname = mysql_result($res, $x, "lname");
						$address1 = mysql_result($res, $x, "address1");
						$address2 = mysql_result($res, $x, "address2");
						$city = mysql_result($res, $x, "city");
						$state = mysql_result($res, $x, "state");
						$zip = mysql_result($res, $x, "zip");
						$country = mysql_result($res, $x, "country");
						$date = mysql_result($res, $x, "date");
						$id = mysql_result($res, $x, "id");
					?>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $fname; ?></td>
						<td><?php echo $lname; ?></td>
						<td><?php echo $address1; ?></td>
						<td><?php echo $address2; ?></td>
						<td><?php echo $city; ?></td>
						<td><?php echo $state; ?></td>
						<td><?php echo $zip; ?></td>
						<td><?php echo $country; ?></td>
						<td><?php echo $date; ?></td>
					</tr>
					<?php
						// Increment our iterator
						$x++;
					}
					?>
				</tbody>
			</table>
		</div>
		<?php
		}
		else
		{
			// We have no records in the database, so indicate that
			echo "<h2>No rows returned</h2>";
		}
		?>
	</body>
</html>