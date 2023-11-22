<?php
    include ("connexiondb");
    $dblink=connectDB();

    $requete="INSERT INTO solar_logs (voltage, ultraviolet)
                VALUES ('
                ".$_GET["sensor1"].",
                ".$_GET["sensor2"]."
                ')
    ";

    if ( mysqli_query($dblink,$requete)){
        echo "Enregistrement Ajouté avec success à la table SOLAR_LOGS";
    }
    else {
        // Generer une exception
        echo "Erreur" .$requete. "<br>". mysqli_error($dblink);

    }

    mysqli_close($dblink);
?>