<?php 

function connectDB(){
    $serveur="localhost";
    $username="myuser";
    $password="mypassword";
    $dbname="arduino";

    //Creation de la connexion à la base de données
    $dblink = mysqli_connect($serveur,$username,$password,$dbname);


    /* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

    // Verifier si la connexion s'établie, sinon générer une exception
    if(!$dblink){
        die("Connexion échouée: " .mysqli_error($dblink));
    }
    echo nl2br("Function connectDB: Connexion établie avec success \n");
    
    return $dblink;
}

?>

