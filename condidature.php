<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$erreurs    = [];

// ✅ Étape 3.a : détection du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ Récupération des données (liaison avec le formulaire étape 2)
    $prenom     = $_POST['prenom'] ?? '';
    $nom        = $_POST['nom'] ?? '';
    $email      = $_POST['email'] ?? '';
    $age        = $_POST['age'] ?? '';
    $filiere    = $_POST['filiere'] ?? '';
    $motivation = $_POST['motivation'] ?? '';

    // (plus tard ici : validation + erreurs)
}
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
        <input type="text" name="prenom" value="<?= $prenom ?>"><br><br>

        <!-- Nom -->
        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= $nom ?>"><br><br>

        <!-- Email -->
        <label>Adresse email :</label><br>
        <input type="email" name="email" value="<?= $email ?>"><br><br>

        <!-- Âge -->
        <label>Âge :</label><br>
        <input type="number" name="age" value="<?= $age ?>"><br><br>

        <!-- Filière -->
        <label>Filière souhaitée :</label><br>
        <select name="filiere">
            <option value="">-- Choisir --</option>
            <option value="Informatique" <?= $filiere == 'Informatique' ? 'selected' : '' ?>>Informatique</option>
            <option value="Électronique" <?= $filiere == 'Électronique' ? 'selected' : '' ?>>Électronique</option>
            <option value="Mécanique" <?= $filiere == 'Mécanique' ? 'selected' : '' ?>>Mécanique</option>
            <option value="Autre" <?= $filiere == 'Autre' ? 'selected' : '' ?>>Autre</option>
        </select><br><br>

        <!-- Motivation -->
        <label>Lettre de motivation :</label><br>
        <textarea name="motivation" rows="6"><?= $motivation ?></textarea><br><br>

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