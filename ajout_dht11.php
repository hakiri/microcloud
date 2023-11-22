<?php
    include("connexiondb.php");

    $dblink=connectDB();

    $requete = "INSERT INTO dht11_logs (Temperature, Humidity)
                VALUES (
                    ".$_GET["sensor1"]." 
                    ".$_GET["sensor2"]."
                )
                ";

    if( mysqli_query($dblink,$requete) ) {
            echo "Nouveau enregistrement crée dans la table DHT11_LOGS";
    }
    else {
        echo "Erreur : " .$requete. "<br>" . mysqli_error($dblink);
    }

    mysqli_close($dblink);
?>