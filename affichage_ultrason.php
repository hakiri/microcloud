<?php

    include("connexiondb.php");
    $con=connectDB();

//preparation de la requete
$requete="SELECT * FROM ultrasonic_logs ORDER BY Timestamp ASC";

//lancer la requete et garder le resultat dans une variable
if($resultat=mysqli_query($con,$requete)){
    echo nl2br("Lecture de la table ultrasonic commence");
}
else {
echo ("Erreur: ".$requete. "<br>". mysqli_error($con));
}


// Ne pas fermer la base de données on a besoin pour afficher les tables HTML




?>

<html>
<header>

</header>

<body>
    <h1> Affichage de l'acquisition des données Ultrason dans la plateforme IoT distante </h1>
    <h2> Affichage des données IoT de la distance du capteur ultrason SR04</h2>

<table border="1" cellspacing="1" cellpadding="1">
    <tr>
        <td>&nbsp;Timestamp&nbsp;</td>
        <td>&nbsp;Distance (cm)&nbsp;</td>
    </tr>

    <?php
    if (mysqli_num_rows($resultat)>0){
    while($row = mysqli_fetch_assoc($resultat)){
        printf("
        <tr>
        <td>&nbsp;%s</td>
        <td>&nbsp;%s&nbsp;</td>
        </tr>
        ",$row["Timestamp"],$row["distance_cm"]);
    }}
    mysqli_close($con);
    ?>

</table>    

</body>

</html>