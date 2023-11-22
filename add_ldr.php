<?php

// Inclure le fichier de connexion à la base de données
include("connexiondb");
//connexion à la base de données
$dblink = connectDB();

//Requete pour ajouter les enregistrement dans la table LDR_LOGS

$requete= "INSERT INTO ldr_logs (lightlevel)
            VALUES ('
            ".$_GET["sensor1"]."
            ')
            ";

//Verifier si l'enregistrement et l'ajout sont fait correctement
if( mysqli_query($dblink,$requete)){
    echo "Nouveau enregistrement à la table LDR_LOGS ajouté avec success ";
}
else {
    //generer une exception
    echo "Erreur: ".$requete. "<br>". mysqli_error($dblink);
}

mysqli_close();


?>