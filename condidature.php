<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$erreurs    = [];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Candidature</title>
</head>
<body>

    <h1>Formulaire de candidature</h1>

    <form action="candidature.php" method="POST">

        <!-- Prénom -->
        <label>Prénom :</label><br>
        <input type="text" name="prenom"><br><br>

        <!-- Nom -->
        <label>Nom :</label><br>
        <input type="text" name="nom"><br><br>

        <!-- Email -->
        <label>Adresse email :</label><br>
        <input type="email" name="email"><br><br>

        <!-- Âge -->
        <label>Âge :</label><br>
        <input type="number" name="age"><br><br>

        <!-- Filière -->
        <label>Filière souhaitée :</label><br>
        <select name="filiere">
            <option value="">-- Choisir --</option>
            <option value="Informatique">Informatique</option>
            <option value="Électronique">Électronique</option>
            <option value="Mécanique">Mécanique</option>
            <option value="Autre">Autre</option>
        </select><br><br>

        <!-- Motivation -->
        <label>Lettre de motivation :</label><br>
        <textarea name="motivation" rows="6"></textarea><br><br>

        <!-- Règlement -->
        <label>
            <input type="checkbox" name="reglement" value="1">
            J'ai lu et j'accepte le règlement du club.
        </label><br><br>

        <!-- Bouton -->
        <button type="submit">Envoyer ma candidature</button>

    </form>

</body>
</html>