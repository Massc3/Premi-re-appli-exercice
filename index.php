<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Ajout produit</title>
</head>
<body class="index">

    <div id="menu">
        <ul>
            <li><a href="index.php">L'index</a></li>
            <li><a href="recap.php">Le récapitulatif</a></li>
        </ul>
    </div>

    <!-- Le contenu de la page index.php -->
    
    <h1>Ajouter un produit</h1>

    <form action="traitement.php" method="post" class= "traitement">
        <!--action:qui indique la cible du formulaire,le fichier à atteindre lorsque l'utilisateur
        method:qui précise par quelle méthode HTTP les données du formulaire seront transmises au serveur
        soumettra le formulaire -->
        <p>
            <label class="nomP">
                Nom du produit : 
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label class="prixP">
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label class="quantiteP">
                Quantité désirée :
                <input type="number" name="qtt" calue="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit">
        </p>
    </form>
<?php
    // Vérifiez si un message est présent dans la session
 if (isset($_SESSION['message'])) {
        // Affichez le message
        echo '<p>' . $_SESSION['message'] . '</p>';

        // Supprimez le message de la session pour éviter qu'il ne s'affiche à nouveau
        unset($_SESSION['message']);
    }
?>

</body>
</html>