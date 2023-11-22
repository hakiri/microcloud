<?php

    include("connexiondb.php");
    $dblink=connectDB();

    $requete="SELECT * FROM solar_logs ORDER BY Timestamp ASC";

    //lancer la requete et attendre le resultat

    if($resultat=mysqli_query($dblink,$requete)){
        echo "Lecture de la table a commencé";
    }
    else {
        echo "Erreur:" .$requete. "<br>". mysqli_error($dblink);
    }

    //Ne pas fermer la connexion à la base de données
    // elle sera utilisée dans en bas pour afficher les differents champs 



?>

<html>
<header>
    
</header>
<head>
<meta http-equiv="refresh" content="30">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<title>DHT11 data</title>

	<!-- columns -->
	<style>
		* {
			box-sizing: border-box;
		}

		/* Create two equal columns that floats next to each other */
		.column {
			float: left;
			width: 50%;
			padding: 10px;

		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
	</style>

	<style type="text/css">
		body {
			font-family: Arial;
			margin: 80px 100px 10px 100px;
			padding: 0;
			color: white;
			text-align: center;
			background: #555652;
		}

		.container {
			color: #E8E9EB;
			background: #222;
			border: #555652 1px solid;
			padding: 10px;
		}
	</style>

</head>

<body>
    <h1> Affichage de l'acquisition des données solair dans la plateforme</h1>
    <h3> Lecture des données ultraviolet du capteur solair</h3>

<table border="1" cellspacing="1" cellpadding="1">
    <tr>
        <td>&nbsp;Timestamp&nbsp;</td>
        <td>&nbsp;Voltage&nbsp;</td>
        <td>&nbsp;Ultraviolet&nbsp;</td>
    </tr>

    <?php
    if(mysqli_num_rows($resultat)>0){
        while($row = mysqli_fetch_assoc($resultat))
        {
        printf("<tr>
        <td> &nbsp;%s </td>
        <td> &nbsp;%s&nbsp; </td>
        <td> &nbsp;%s&nbsp; </td>
        </tr>", $row["Timestamp"], $row["voltage"], $row["ultraviolet"]);
        }
    }
    mysqli_close($dblink);
    ?>


</table>

</body>



</html>