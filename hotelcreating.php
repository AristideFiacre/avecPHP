
<div style="margin-left:300px; height:200px;">
	<h1 style="margin-left:300px;">Ajouter un hôtel</h1>

	<form id="ajouter_hotel" method="POST">
		<table style="margin-left:300px; height:200px;">
			<tr>
				<td>
					<label for="name_hotel">Nom de l'hôtel :</label>
				</td>
				<td>
					<input type="text" name="name_hotel" id="name_hotel" required size="30" style="width: 100%;"><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="adress_hotel">Adresse de l'hôtel:</label>
				</td>
				<td>
					<input type="text" name="adress_hotel" id="adress_hotel" required size="30" style="width: 100%;"><br>
				</td>
			</tr>
			<tr>
				<td>
					<label for="telephone_hotel">Téléphone de l'hôtel:</label>
				</td>	
				<td>	
					<input type="text" name="telephone_hotel" id="telephone_hotel" required size="30" style="width: 100%;"><br>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Ajouter l'hôtel">
				</td>
			</tr>
		</table>
	</form>
    </div>
	<script type="text/javascript" src="hotel.js">
		
	</script>


<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get data from the form and sanitize it
$name_hotel= mysqli_real_escape_string($conn, $_POST['name_hotel']);
$adress_hotel= mysqli_real_escape_string($conn, $_POST['adress_hotel']);
$telephone_hotel = mysqli_real_escape_string($conn, $_POST['telephone_hotel']);

// Insert data into the 'hotel' table
$sql = "INSERT INTO hotel (name_hotel,adress_hotel,telephone_hotel)
VALUES ('$name_hotel', '$adress_hotel', '$telephone_hotel')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li class="active">Liste des Hôtels </li>
        </ol>
    </div><!--/.row-->

   

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
					/*
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Shift Change !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Shift Successfully Changed!
                            </div>";
                    }*/
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom Hôtel</th>
                            <th>Adresse Hôtel</th>
                            <th>Telephone Hôtel</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $staff_query = "SELECT * FROM hotel";
                        $staff_result = mysqli_query($connection, $staff_query);

                        if (mysqli_num_rows($staff_result) > 0) {
                            while ($staff = mysqli_fetch_assoc($staff_result)) { ?>
                                <tr>

                                    <td><?php echo $staff['id_hotel']; ?></td>
                                    <td><?php echo $staff['name_hotel']; ?></td>
                                    <td><?php echo $staff['adress_hotel']; ?></td>
                                    <td><?php echo $staff['telephone_hotel']; ?></td>
                                </tr>


                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developed By Web Team</p>
        </div>
    </div>

</div>    <!--/.main-->