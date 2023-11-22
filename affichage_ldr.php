<?php
    include("connexiondb.php");
    $con=connectDB();

    //preparation de la requete
    $requete="SELECT * FROM ldr_logging ORDER BY Timestamp ASC";

    //lancer la requete et garder le resultat dans une variable

    if($resultat=mysqli_query($con,$requete)){

        echo nl2br("\nLecture de la table LDR_LOGGING a commencé");
    }
    else{
        echo "Erreur: ".$requete. "<br>" .mysqli_error($con);
    }

    // Ne pas fermer la base de données on a besoin pour afficher les tables HTML

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

    <h2> Affichage de l'acquisition des données LDR dans la plateforme IoT distante</h2>
    <h3> Affichage des données IoT de luminosité du capteur LDR</h3>
    
<table border="1" cellspacing="1" cellpadding="1">
    <tr>
        <td>&nbsp;Timestamp&nbsp;</td>
        <td>&nbsp;LightLevel&nbsp;</td>
    </tr>
    <?php
    if( mysqli_num_rows($resultat)>0 ) 
     {
        while($row = mysqli_fetch_assoc ($resultat)){

        
        printf(" <tr>
        <td>&nbsp;%s</td>
        <td>&nbsp%s&nbsp;</td>
        </tr> ", $row["Timestamp"], $row["lightlevel"]);
    }}
    mysqli_close($con);
    ?>

</table>



</body>


</html>
