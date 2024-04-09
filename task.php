<?php
        // Connexion à la base de données
        $serveur = "localhost";
        $utilisateur = "root"; 
        $mot_de_passe = ""; 
        $base_de_donnees = "ousmane";
        $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

        // Vérification de la connexion
        if (!$connexion) {
            die("Échec de la connexion : " . mysqli_connect_error()); 
        } else {
            echo "Connexion réussie à la base de données.";
        }

        

        // Fermeture de la connexion
        // mysqli_close($connexion);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes taches</title>
    </head>
    <body>
    <h1>TO-DO-LIST</h1>
    <h2>La liste de mes taches</h2>
    <form action="tache.php" method="POST">
            <div>
                <input type="checkbox" id="preference1" name="preference1">
                <label for="preference1"> Mettre à jour mon CV</label>
            </div>
            <?php
            // Requête pour sélectionner toutes les taches
            $sql = "SELECT * FROM task";
            $resultat = mysqli_query($connexion, $sql);

            // Vérification du résultat de la requête
            if ($resultat) { 
                foreach ($resultat as $task) {
                    print_r($task);
                }
            } else {
                echo "Erreur : " . mysqli_error($connexion); 
            }
            ?>
            <br>
            <div>
                <input type="submit" value="Enregistrer la liste">
            </div>
        </form>
        <br>
        <form action="" method="POST">
            <label for="element">Ajouter une nouvelle tache:</label>
            <input type="text" id="element" name="element" required>
            <br><br>
            <input type="submit" value="Ajouter">
        </form>
</body>
</html>