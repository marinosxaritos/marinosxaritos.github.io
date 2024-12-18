<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page
    header("Location: index.html");
    exit();
}

// If user is logged in, continue displaying the page
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title> Lifeguard </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
	


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
			padding-top: 10px;
			white-space: nowrap; 
			text-align: center; 
		}

		.header ul {
			font-weight: 700;
			display: outline-block; 
			margin: 10px 100px; 
		}

		.header ul a {
			color: #eee; 
			text-decoration: none; 
		}


		.header ul a:hover {
    		text-decoration: underline; 
		}

		.logout a {
			float: right;
			background: #555;
			color: #fff;
			padding: 10px;
			border-radius: 10px;
			margin-right: 10px;
			border: none;
			text-decoration: none;
		}

		.logout a:hover {
			opacity: 0.7;
		}

		

		@media (max-width: 767px) {
			
		
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
				padding-left:10rem;
				padding-right:10rem;
				padding-left: 1rem; /* Adjust padding-left */
        		padding-right: 1rem; /* Adjust padding-right */
				text-align: center;
			}

			td:not(:last-child) {
        		text-align: center; /* Align text to the center */
    		}

			td::before {
				content: attr(data-cell) ": ";
				font-weight: 700;
			}
			td[data-cell]::before {
        		color: #EEE; 
    		}

			.header {
				padding-top: 10px;
			}

			.header ul {
				text-align: left;
				margin-left: auto;
				margin-top: 12px;
				
			}

			
		}
		
		
		

	</style>


	<main>
		<div class="logout">
			<a href="logout.php">Logout</a>
		</div>

		<div class="header">
			<ul> <a href="#incident.in"> Περιστατικά Εντός Νερού </a> </ul>
			<ul> <a href="#incident.out"> Περιστατικά Εκτός Νερού </a> </ul>
			<ul> <a href="#work.days"> Ημέρες Εργασίας </a> </ul>
			<ul> <a href="#equipment"> Εξοπλησμός </a> </ul>
		</div>
		

		<div class="wrapper">
		
			<table id="myTable" class="table table-striped">
				<caption id="incident.in"> Περιστατικά Εντός Νερού </caption>
				<thead>
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
					</tr>
				</thead>
				<tbody>

					
					
					
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
						inside_water_insident.time, 
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

				</tbody>
			</table>
	
		</div>

		<div class="wrapper">
			<table id="myTable1" class="table table-striped">
				<caption id="incident.out"> Περιστατικά Εκτός Νερού  </caption>
				<thead>
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
				</thead>
				<tbody>
					
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
						outside_water_insident.time, 
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
				</tbody>
			</table>
		</div>


		<div class="wrapper">
			<table id="myTable2" class="table table-striped">
				<caption id="work.days"> Ημέρες Εργασίας </caption>
				<thead>
				<tr>
					<th>Αριθμός Άδειας</th>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Μήνας</th>
					<th>Ημέρες Εργασίας του Μήνα</th>
					<th>Σύνολο αποδοχών Μήνα</th>
				</thead>
				<tbody>
					
					
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
				</tbody>
			</table>
		</div>

		<div class="wrapper">
			<table id="myTable3" class="table table-striped">
				<caption id="equipment"> Εξοπλησμός </caption>
				<thead>
				<tr>
					<th>Όνομα</th>
					<th>Επίθετο</th>
					<th>Ημερομηνία</th>
					<th>Ωρα</th>
					<th>Τοποθεσία</th>
					<th>Πύργος</th>
					<th>Ελείψεις Εξοπλησμού</th>
				</thead>
				<tbody>
					
					
					
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
								<td><?php echo $row['time']?></td>
								<td><?php echo $row['address']?></td>
								<td><?php echo $row['tower']?></td>
								<td><?php echo $row['equipment']?></td>
							</tr>
						<?php
					}
					
					?>

				</tr>
				</tbody>
			</table>
		</div>
	</main>
	

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
	<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

	
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

	

	<script>
		$(document).ready(function(){
			$('#myTable').DataTable();

			applyGeneralStyle();
			applyMediaStyles();
		});

		$(document).ready(function(){
			$('#myTable1').DataTable();

			applyMediaStyles();
		});

		$(document).ready(function(){
			$('#myTable2').DataTable();

			applyMediaStyles();
		});

		$(document).ready(function(){
			$('#myTable3').DataTable();

			applyMediaStyles();
		});



		function applyGeneralStyle() {
    // Your CSS styles here
    $('.wrapper').css({
        'width': 'min(1200px, 100% - 3rem)',
        'margin-top': '100px',
        'margin-inline': 'auto',
        'overflow-x': 'auto',
        'text-align': 'left'
    });

    $('table').css({
        'width': '100%',
        'border-collapse': 'collapse',
        'background': '#323232'
    });

    $('th, td, caption').css({
        'padding': '1.8rem',
		
		'text-align': 'center'
		
    });

    $('caption').css({
        'text-align': 'left',
        'background': 'hsl(0 0% 0% / 0.5)',
        'font-size': '1.5rem',
        'font-weight': '700',
        'text-transform': 'uppercase'
    });

    $('th').css({
		'margin-inline': 'auto',
        'overflow-x': 'auto',
		'text-align': 'left',
        'background': 'hsl(0 0% 0% / 0.5)'
    });

	$('td').css({
		'margin-inline': 'auto',
        'overflow-x': 'auto',
		'text-align': 'left',
        
    });

    
}



		

		function applyMediaStyles() {
            if (window.matchMedia('(max-width: 767px)').matches) {
				$('table').css({
					'width': '100%',
					'border-collapse': 'collapse',
					'background': '#323232'
				});
                // Apply your @media styles here
                $('th').css('display', 'none');
                $('td').css({
                    'display': 'grid',
                    'grid-template-columns': '15ch auto',
					'grid-template-rows': 'auto auto',
                    'padding': '0.5rem 1rem'
                });
                $('td:first-child').css('padding-top', '2rem');
                $('td:last-child').css({
                    'padding-bottom': '2rem',
					'padding-left': '1rem',
        			'padding-right': '1rem',
                    'text-align': 'center'
                });
				$('td:not(:last-child)').css('text-align', 'center');
                $('td::before').css({
                    'content': 'attr(data-cell) ": "',
                    'font-weight': '700'
                });
                $('td[data-cell]::before').css('color', '#EEE');
                $('.header').css('padding-top', '10px');
                $('.header ul').css({
                    'text-align': 'left',
                    'margin-left': 'auto',
                    'margin-top': '12px'
                });
            }
        }

	</script>


	


</body>
</html>



