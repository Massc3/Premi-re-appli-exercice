<?php
 session_start();
 if(isset($_POST["submit"])){

    //FILTER_SANITIZE_STRING ce filtre supprime une chaîne de caractères de toute présence de caractères spéciaux
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    //FILTER_VALIDATE_FLOAT validera le prix que s'il est un nombre à virgule (pas de texte ou autre…)
    //FILTER_FLAG_ALLOW_FRACTION ajouté pour permettre l'utilisation du caractère "," ou "." pour la décimale
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    //FILTER_VALIDATE_INT (champ "qtt") ne validera la quantité que si celle-ci est un nombre entier, au moins égal à 1.
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    if($name && $price && $qtt){
        $product = [
            'name' => $name,
            'price' => $price,
            'qtt' => $qtt,
            'total' => $price*$qtt 
        ];
        $_SESSION["products"][] = $product;
    }

    // déterminez s'il y a une erreur ou un succès
    // Supposons que $success soit un booléen qui indique si le traitement a réussi ou non
    $success = true; // Mettez ici votre propre logique de traitement et déterminez si c'est un succès ou une erreur

    if ($success) {
        $_SESSION['message'] = "Traitement réussi !"; // Message de succès
    } else {
        $_SESSION['message'] = "Erreur lors du traitement."; // Message d'erreur
    }

    // Redirigez l'utilisateur vers index.php
    header("Location: index.php");
    exit();
 }

 header("location:index.php");

 ?>