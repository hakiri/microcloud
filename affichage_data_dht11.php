<?php
    // inclure la fonction de connection à la base de données
    include("connexiondb.php");

    //Connection à la base de données
    $con=connectDB();

    //Preparation de la requete pour l'affichage de données
    //Selectionner les colonnes temps, tempurature, humidité de la table dht11_logs
    $requete="SELECT * FROM dht11_logs ORDER BY Timestamp ASC";

    //lancer la requete pour extraire les informations
    // mettre le resultat et le tester (vrai == connexion et requete réussie ou faux sinon)
    if( $resultat=mysqli_query($con, $requete) ){
        echo "Table connectée et Lecture à partir de la table a commencé";
    }
    else {
        echo "Erreur: " .$requete. "<br>" . mysqli_error($con);
    }

?>

<html>

<header>
<meta http-equiv="refresh" content="30" > 
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



    <h1> Acquisition de données sur une carte IoT Arduino connectée</h1>
    <h3> Lecture de données de Temperature et de l'humidité de capteurs distants</h3>
    <table border="1" cellspacing="1" cellpadding="1">
        <tr>
            <td>&nbsp; Timestamp &nbsp;</td>
            <td>&nbsp; Temperature &nbsp;</td>
            <td>&nbsp; Humidité &nbsp;</td>

        </tr>
       <?php
       if(mysqli_num_rows($resultat) > 0){
            while($row = mysqli_fetch_assoc($resultat))
            {
                printf("
                <tr>
                <td> &nbsp;%s </td>
                <td> &nbsp;%s&nbsp; </td>
                <td> &nbsp;%s&nbsp; </td>
                </tr>", $row["Timestamp"], $row["temperature"], $row["humidity"]);
            }
       }

       mysqli_close($con);
       ?>
    </table>

  

</body>

</html>