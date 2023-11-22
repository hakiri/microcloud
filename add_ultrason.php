<?php

    // inclure la fonction de connexion à la base de données
    include("connexiondb.php");
    //appel de la fonction de connexion à la base de données
    $dblink=connectDB();

    // preparer la requete pour inserer de nouveau enregistrements 
    // dans la table ultrasonix_logs

    $requete= "INSERT INTO ultrasonic_logs (distance_cm)
                VALUES('
                ".$_GET["sensor1"]."
                ')
                ";

    if ( mysqli_query($dblink, $requete)){
        echo "Nouveau enregistrement crée dans la table Ultrasonic_logs";
    }
    else {
        //Erreur 
        echo "Erreur: " .$requete. "<br>" .mysqli_error($dblink);
    }

    mysqli_close($dblink);

?>