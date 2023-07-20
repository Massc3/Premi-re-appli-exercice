<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Recapitulatif des produits</title>
</head>
<body class="recap">

    <div id="menu">
        <ul>
            <li><a href="index.php">L'index</a></li>
            <li><a href="recap.php">Le récapitulatif</a></li>
        </ul>
    </div>
    <?php 
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Auncun produit en session...</p>";
    }
    else{
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;        
        foreach($_SESSION["products"] as $index => $product){
           echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product["name"]."</td>",
                    //number_format : modifier l'affichage d'une valeur numérique en précisant plusieurs paramètres :
                    "<td>".number_format($product["price"],2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product["qtt"]."</td>",
                    "<td>".number_format($product["total"],2, ",", "&nbsp;")."&nbsp;€ </td>",
                "</tr>";
            $totalGeneral+= $product["total"];    
        }
        echo "<tr>",
                "<td colspan=4>Total général :</td>",
                "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
            "</tr>",
        "</tbody>",
        "</table>";
    }
    ?>
    <?php
    // Code pour ajouter le produit à la session
    $_SESSION['products'][] = 'nouveau_products';
    
    // Mise à jour du nombre de produits en session
    $_SESSION['nombre_products'] = count($_SESSION['products']);
    ?>
    <?php 
     // Sur toutes les pages afficher le nombre de produits en session (session_start();)

    // Vérifiez si la variable de session existe avant de l'afficher
    if (isset($_SESSION['nombre_products'])) {
        echo "Nombre de produits en session : " . $_SESSION['nombre_products'];
    } else {
        echo "Aucun produit en session.";
    }
    ?>
    
</body>
</html>