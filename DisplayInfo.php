<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Lifeguard </title>
</head>

<body>
	
	
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

		html { color-scheme: dark }

		body {
			color: #EEE;
			font-size: 1.125rem;
			font-family: 'system-ui','Roboto', sans-serif;
		}

		.wrapper {
			width: min(1200px, 100% - 3rem);
			margin-top: 100px;
			margin-inline: auto;
			overflow-x: auto;
			text-align: center;
		}


		table {
			width: 100%;
			border-collapse: collapse;
			background: #323232;
		}		

		th, td, caption {
			padding: 1rem;
		}

		caption {
			text-align: left;
			background: hsl(0 0% 0% / 0.5);
			font-size: 1.5rem;
			font-weight: 700;
			text-transform: uppercase;
		}

		th {
			background: hsl(0 0% 0% / 0.5);
		}

		tr:nth-of-type(2n) {
			background: hsl(0 0% 0% / 0.1);
		}

		.header {
			white-space: nowrap; /* Prevent line breaks */
			text-align: center; /* Center align contents */
		}

		.header ul {
			font-weight: 700;
			display: outline-block; /* Display list items vertical */
			margin: 10px 10px; /* Add some spacing between list items */
		}

		.header ul a {
			color: #eee; /* Adjust link color */
			text-decoration: none; /* Remove underline from links */
		}


		.header ul a:hover {
    		text-decoration: underline; /* Add underline on hover */
		}

		@media (max-width: 650px) {
			th {
				display: none;
			}

			td {
				display: grid;
				
				grid-template-columns: 15ch auto;
				padding: 0.5rem 1rem;
			}

			td:first-child {
				padding-top: 2rem;
			}

			td:last-child {
				padding-bottom: 2rem;
			}

			td::before {
				content: attr(data-cell) ": ";
				font-weight: 700;
			}
			td[data-cell]::before {
        		color: #EEE; 
    		}
		}
		
		
		

	</style>


	<main>
		<div class="header">
			<ul> <a href="#incident.in"> Περιστατικά Εντός Νερού </a> </ul>
			<ul> <a href="#incident.out"> Περιστατικά Εκτός Νερού </a> </ul>
			<ul> <a href="#work.days"> Ημέρες Εργασίας </a> </ul>
			<ul> <a href="#equipment"> Εξοπλησμός </a> </ul>
		</div>
		

		<div class="wrapper">
			<table>
				<caption id="incident.in"> Περιστατικά Εντός Νερού </caption>
				<tr>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Ημερομηνία</th>
					<th>Ώρα</th>
					<th>Τοποθεσία</th>
					<th>Αριθμός Άδειας</th>
					<th>Χρώμα Σημαίας</th>
					<th>Απόσταση απο τον Πύργο</th>
					<th>Εντός/Εκτός απο τις Σημαδούρες</th>
					<th>Μέσο Διάσωσης</th>
					<th>Αριθμός Ατόμων που διασώθηκαν</th>
					<th>Με αναπνοή/Χωρίς αναπνοή</th>
					<th>Πλάγια Θέση(αναπνοή)/ΚΑΡΠΑ(χωρίς αναπνοή)</th>
					<th>Μεταφορά στον Νοσοκομείο(αναπνοή)/Απινιδωτής(χωρίς αναπνοή)</th>
					<th>Επανήλθε πριν την Μεταφορά(αναπνοή/χωρίς αναπνοή)</th>
					
					
					
					<?php
					$user_name = "marinos";
					$password = "password";
					$server = "localhost";
					$db_name = "contactsdb";
					
					$con = mysqli_connect($server, $user_name, $password, $db_name) or die("Connection Failed");
					
					$query = "SELECT 
						contacts.name, 
						contacts.last_name, 
						contacts.date, 
						contacts.time, 
						contacts.address, 
						contacts.license, 
						inside_water_insident.flag, 
						inside_water_insident.distance, 
						inside_water_insident.buoys, 
						inside_water_insident.rescue, 
						inside_water_insident.rescued, 
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN 'Breath Incident'
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN 'No Breath Incident'
							ELSE NULL 
						END AS incident_type,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.recovery_position 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.cardiopulmonary 
							ELSE NULL 
						END AS condition_specific_column,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.transported 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.aed 
							ELSE NULL 
						END AS another_condition_specific_column,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.sensations 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.recovery 
							ELSE NULL 
						END AS yet_another_condition_specific_column
						FROM 
							contacts 
						INNER JOIN 
							inside_water_insident ON contacts.id = inside_water_insident.contacts_id 
						LEFT JOIN 
							breath_insident ON contacts.id = breath_insident.contacts_id 
						LEFT JOIN 
							no_breath_insident ON contacts.id = no_breath_insident.contacts_id 
						ORDER BY 
							contacts.id";
							
					$result = mysqli_query($con, $query);
					while($row=mysqli_fetch_assoc($result))
					{
						?>
							<tr>
								<td data-cell="Όνομα"><?php echo $row['name']?></td>
								<td data-cell="Επίθετο"><?php echo $row['last_name']?></td>
								<td data-cell="Ημερομηνία"><?php echo $row['date']?></td>
								<td data-cell="Ώρα"><?php echo $row['time']?></td>
								<td data-cell="Τοποθεσία"><?php echo $row['address']?></td>
								<td data-cell="Αριθμός Άδειας"><?php echo $row['license']?></td>
								<td data-cell="Χρώμα Σημαίας"><?php echo $row['flag']?></td>
								<td data-cell="Απόσταση απο τον Πύργο"><?php echo $row['distance']?></td>
								<td data-cell="Εντός/Εκτός απο τις Σημαδούρες"><?php echo $row['buoys']?></td>
								<td data-cell="Μέσο Διάσωσης"><?php echo $row['rescue']?></td>
								<td data-cell="Αριθμός Ατόμων που διασώθηκαν"><?php echo $row['rescued']?></td>
								<td data-cell="Με αναπνοή/Χωρίς αναπνοή"><?php echo $row['incident_type']?></td>
								<td data-cell="Πλάγια Θέση(αναπνοή)/ΚΑΡΠΑ(χωρίς αναπνοή)"><?php echo $row['condition_specific_column']?></td>
								<td data-cell="Μεταφορά στον Νοσοκομείο(αναπνοή)/Απινιδωτής(χωρίς αναπνοή)"><?php echo $row['another_condition_specific_column']?></td>
								<td data-cell="Επανήλθε πριν την Μεταφορά(αναπνοή/χωρίς αναπνοή)"><?php echo $row['yet_another_condition_specific_column']?></td>
							</tr>
						<?php
					}
					
					?>

				</tr>
			</table>

		</div>

		<div class="wrapper">
			<table>
				<caption id="incident.out"> Περιστατικά Εκτός Νερού  </caption>
				<tr>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Ημερομηνία</th>
					<th>Ώρα</th>
					<th>Τοποθεσία</th>
					<th>Αριθμός Άδειας</th>
					<th>Χρώμα Σημαίας</th>
					<th>Αιτία Περιστατικού</th>
					<th>Απόσταση απο τον Πύργο</th>
					<th>Αριθμός Ατόμων που διασώθηκαν</th>
					<th>Με αναπνοή/Χωρίς αναπνοή</th>
					<th>Πλάγια Θέση(αναπνοή)/ΚΑΡΠΑ(χωρίς αναπνοή)</th>
					<th>Μεταφορά στον Νοσοκομείο(αναπνοή)/Απινιδωτής(χωρίς αναπνοή)</th>
					<th>Επανήλθε πριν την Μεταφορά(αναπνοή/χωρίς αναπνοή)</th>
					
					
					<?php
					$user_name = "marinos";
					$password = "password";
					$server = "localhost";
					$db_name = "contactsdb";
					
					$con = mysqli_connect($server, $user_name, $password, $db_name) or die("Connection Failed");
					
					$query = "SELECT 
						contacts.name, 
						contacts.last_name, 
						contacts.date, 
						contacts.time, 
						contacts.address, 
						contacts.license, 
						outside_water_insident.flag, 
						outside_water_insident.cause,  
						outside_water_insident.distance, 
						outside_water_insident.rescued, 
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN 'Breath Incident'
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN 'No Breath Incident'
							ELSE NULL 
						END AS incident_type,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.recovery_position 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.cardiopulmonary 
							ELSE NULL 
						END AS condition_specific_column,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.transported 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.aed 
							ELSE NULL 
						END AS another_condition_specific_column,
						CASE 
							WHEN breath_insident.contacts_id IS NOT NULL THEN breath_insident.sensations 
							WHEN no_breath_insident.contacts_id IS NOT NULL THEN no_breath_insident.recovery 
							ELSE NULL 
						END AS yet_another_condition_specific_column
						FROM 
							contacts 
						INNER JOIN 
						outside_water_insident ON contacts.id = outside_water_insident.contacts_id 
						LEFT JOIN 
							breath_insident ON contacts.id = breath_insident.contacts_id 
						LEFT JOIN 
							no_breath_insident ON contacts.id = no_breath_insident.contacts_id 
						ORDER BY 
							contacts.id";
							
					$result = mysqli_query($con, $query);
					while($row=mysqli_fetch_assoc($result))
					{
						?>
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['last_name']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['time']?></td>
								<td><?php echo $row['address']?></td>
								<td><?php echo $row['license']?></td>
								<td><?php echo $row['flag']?></td>
								<td><?php echo $row['cause']?></td>
								<td><?php echo $row['distance']?></td>
								<td><?php echo $row['rescued']?></td>
								<td><?php echo $row['incident_type']?></td>
								<td><?php echo $row['condition_specific_column']?></td>
								<td><?php echo $row['another_condition_specific_column']?></td>
								<td><?php echo $row['yet_another_condition_specific_column']?></td>
							</tr>
						<?php
					}
					
					?>

				</tr>
			</table>
		</div>


		<div class="wrapper">
			<table>
				<caption id="work.days"> Ημέρες Εργασίας </caption>
				<tr>
					<th>Αριθμός Άδειας</th>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Μήνας</th>
					<th>Ημέρες Εργασίας του Μήνα</th>
					<th>Σύνολο αποδοχών Μήνα</th>
					
					
					<?php
					$user_name = "marinos";
					$password = "password";
					$server = "localhost";
					$db_name = "contactsdb";
					
					$con = mysqli_connect($server, $user_name, $password, $db_name) or die("Connection Failed");
					
					$query = "SELECT 
					contacts.license,
					contacts.name,
					contacts.last_name,
					MONTHNAME(contacts.date) AS month_name,
					COUNT(contacts.license) AS occurrences,
					CASE 
						WHEN COUNT(contacts.license) IN (30, 31) THEN 1700 
						ELSE COUNT(contacts.license) * 55.74 
					END AS sum
				FROM 
					contacts
				GROUP BY 
					contacts.license, MONTHNAME(contacts.date)
				ORDER BY 
					MONTH(contacts.date), contacts.license";

							
					$result = mysqli_query($con, $query);
					while($row=mysqli_fetch_assoc($result))
					{
						?>
							<tr>
								<td><?php echo $row['license']?></td>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['last_name']?></td>
								<td><?php echo $row['month_name']?></td>
								<td><?php echo $row['occurrences']?></td>
								<td><?php echo $row['sum']?></td>
							</tr>
						<?php
					}
					
					?>

				</tr>
			</table>
		</div>

		<div class="wrapper">
			<table>
				<caption id="equipment"> Εξοπλησμός </caption>
				<tr>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Ημερομηνία</th>
					<th>Τοποθεσία</th>
					<th>Πύργος</th>
					<th>Ελείψεις Εξοπλησμού</th>
					
					
					
					<?php
					$user_name = "marinos";
					$password = "password";
					$server = "localhost";
					$db_name = "contactsdb";
					
					$con = mysqli_connect($server, $user_name, $password, $db_name) or die("Connection Failed");
					
					$query = "SELECT
					contacts.name,
					contacts.last_name,
					contacts.date,
					contacts.address,
					equipment.equipment,
					equipment.tower
					FROM 
						contacts
					INNER JOIN
						equipment ON contacts.id = equipment.contacts_id
					ORDER BY 
						contacts.date";
							
					$result = mysqli_query($con, $query);
					while($row=mysqli_fetch_assoc($result))
					{
						?>
							<tr>
								<td><?php echo $row['name']?></td>
								<td><?php echo $row['last_name']?></td>
								<td><?php echo $row['date']?></td>
								<td><?php echo $row['address']?></td>
								<td><?php echo $row['tower']?></td>
								<td><?php echo $row['equipment']?></td>
							</tr>
						<?php
					}
					
					?>

				</tr>
			</table>
		</div>

	</main>
	<script>
		function AddTableARIA() {
  try {
    var allTables = document.querySelectorAll('table');
    for (var i = 0; i < allTables.length; i++) {
      allTables[i].setAttribute('role','table');
    }
    var allCaptions = document.querySelectorAll('caption');
    for (var i = 0; i < allCaptions.length; i++) {
      allCaptions[i].setAttribute('role','caption');
    }
    var allRowGroups = document.querySelectorAll('thead, tbody, tfoot');
    for (var i = 0; i < allRowGroups.length; i++) {
      allRowGroups[i].setAttribute('role','rowgroup');
    }
    var allRows = document.querySelectorAll('tr');
    for (var i = 0; i < allRows.length; i++) {
      allRows[i].setAttribute('role','row');
    }
    var allCells = document.querySelectorAll('td');
    for (var i = 0; i < allCells.length; i++) {
      allCells[i].setAttribute('role','cell');
    }
    var allHeaders = document.querySelectorAll('th');
    for (var i = 0; i < allHeaders.length; i++) {
      allHeaders[i].setAttribute('role','columnheader');
    }
    // this accounts for scoped row headers
    var allRowHeaders = document.querySelectorAll('th[scope=row]');
    for (var i = 0; i < allRowHeaders.length; i++) {
      allRowHeaders[i].setAttribute('role','rowheader');
    }
  } catch (e) {
    console.log("AddTableARIA(): " + e);
  }
}

AddTableARIA();
	</script>
</body>
</html>

