<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$erreurs    = [];
$reglement  = false;

// ✅ Étape 3.a : détection du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ✅ Récupération des données
    $prenom     = $_POST['prenom'] ?? '';
    $nom        = $_POST['nom'] ?? '';
    $email      = $_POST['email'] ?? '';
    $age        = $_POST['age'] ?? '';
    $filiere    = $_POST['filiere'] ?? '';
    $motivation = $_POST['motivation'] ?? '';
    $reglement  = isset($_POST['reglement']);

    // =========================
    // ✅ ÉTAPE 4 : VALIDATION
    // =========================

    // Prénom
    if (empty($prenom)) {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    // Nom
    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }

    // Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email est invalide.";
    }

    // Âge
    if (empty($age) || !filter_var($age, FILTER_VALIDATE_INT)) {
        $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    } else {
        if ($age < 16 || $age > 30) {
            $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
        }
    }

    // Filière
    if (empty($filiere)) {
        $erreurs[] = "Veuillez choisir une filière.";
    }

    // Motivation
    if (strlen($motivation) < 30) {
        $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }

    // Règlement
    if (!$reglement) {
        $erreurs[] = "Vous devez accepter le règlement.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Candidature</title>

    <style>
        .erreurs {
            color: red;
            background: #ffe5e5;
            padding: 10px;
            border: 1px solid red;
            width: 50%;
        }
    </style>
</head>
<body>

    <h1>Formulaire de candidature</h1>

    <!-- 🔴 ÉTAPE 5.a : AFFICHAGE DES ERREURS -->
    <?php if (!empty($erreurs)): ?>
        <ul class="erreurs">
            <?php foreach ($erreurs as $e): ?>
                <li><?php echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="candidature.php" method="POST">

        <label>Prénom :</label><br>
        <input type="text" name="prenom" value="<?= $prenom ?>"><br><br>

        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= $nom ?>"><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="<?= $email ?>"><br><br>

        <label>Âge :</label><br>
        <input type="number" name="age" value="<?= $age ?>"><br><br>

        <label>Filière :</label><br>
        <select name="filiere">
            <option value="">-- Choisir --</option>
            <option value="Informatique" <?= $filiere == 'Informatique' ? 'selected' : '' ?>>Informatique</option>
            <option value="Électronique" <?= $filiere == 'Électronique' ? 'selected' : '' ?>>Électronique</option>
            <option value="Mécanique" <?= $filiere == 'Mécanique' ? 'selected' : '' ?>>Mécanique</option>
            <option value="Autre" <?= $filiere == 'Autre' ? 'selected' : '' ?>>Autre</option>
        </select><br><br>

        <label>Motivation :</label><br>
        <textarea name="motivation" rows="6"><?= $motivation ?></textarea><br><br>

        <label>
            <input type="checkbox" name="reglement" value="1" <?= $reglement ? 'checked' : '' ?>>
            J'accepte le règlement
        </label><br><br>

        <button type="submit">Envoyer ma candidature</button>

    </form>

</body>
</html>