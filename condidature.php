<?php
$prenom     = '';
$nom        = '';
$email      = '';
$age        = '';
$filiere    = '';
$motivation = '';
$erreurs    = [];
$reglement  = false;

// ✅ Étape 3.a
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $prenom     = $_POST['prenom'] ?? '';
    $nom        = $_POST['nom'] ?? '';
    $email      = $_POST['email'] ?? '';
    $age        = $_POST['age'] ?? '';
    $filiere    = $_POST['filiere'] ?? '';
    $motivation = $_POST['motivation'] ?? '';
    $reglement  = isset($_POST['reglement']);

    // =========================
    // ÉTAPE 4 : VALIDATION
    // =========================

    if (empty($prenom)) {
        $erreurs[] = "Le prénom est obligatoire.";
    }

    if (empty($nom)) {
        $erreurs[] = "Le nom est obligatoire.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs[] = "L'adresse email est invalide.";
    }

    if (empty($age) || !filter_var($age, FILTER_VALIDATE_INT)) {
        $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
    } else {
        if ($age < 16 || $age > 30) {
            $erreurs[] = "L'âge doit être un nombre entre 16 et 30.";
        }
    }

    if (empty($filiere)) {
        $erreurs[] = "Veuillez choisir une filière.";
    }

    if (strlen($motivation) < 30) {
        $erreurs[] = "La motivation doit contenir au moins 30 caractères.";
    }

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

        .confirmation {
            color: green;
            background: #e5ffe5;
            padding: 15px;
            border: 1px solid green;
            width: 60%;
        }
    </style>
</head>
<body>

<h1>Formulaire de candidature</h1>

<!-- ========================= -->
<!-- 🔥 ÉTAPE 7.a STRUCTURE IF -->
<!-- ========================= -->

<?php if (empty($erreurs) && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <!-- ========================= -->
    <!-- 🔥 ÉTAPE 7.b CONFIRMATION -->
    <!-- ========================= -->

    <div class="confirmation">
        <h2>Candidature reçue !</h2>

        <p><strong>Prénom :</strong> <?php echo $prenom; ?></p>
        <p><strong>Nom :</strong> <?php echo $nom; ?></p>
        <p><strong>Email :</strong> <?php echo $email; ?></p>
        <p><strong>Âge :</strong> <?php echo $age; ?></p>
        <p><strong>Filière :</strong> <?php echo $filiere; ?></p>

        <p><strong>Motivation :</strong></p>
        <p><?php echo nl2br($motivation); ?></p>

        <p>Votre candidature a bien été enregistrée. Nous vous contacterons à l'adresse indiquée.</p>

        <a href="candidature.php">Soumettre une nouvelle candidature</a>
    </div>

<?php else: ?>

    <!-- ========================= -->
    <!-- 🔴 ÉTAPE 5 : ERREURS -->
    <!-- ========================= -->
    <?php if (!empty($erreurs)): ?>
        <ul class="erreurs">
            <?php foreach ($erreurs as $e): ?>
                <li><?php echo $e; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- ========================= -->
    <!-- 🟢 FORMULAIRE -->
    <!-- ========================= -->

    <form action="candidature.php" method="POST">

        <label>Prénom :</label><br>
        <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br><br>

        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?php echo $nom; ?>"><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label>Âge :</label><br>
        <input type="number" name="age" value="<?php echo $age; ?>"><br><br>

        <label>Filière :</label><br>
        <select name="filiere">
            <option value="">-- Choisir --</option>

            <option value="Informatique" <?php echo ($filiere === 'Informatique') ? 'selected' : ''; ?>>
                Informatique
            </option>

            <option value="Électronique" <?php echo ($filiere === 'Électronique') ? 'selected' : ''; ?>>
                Électronique
            </option>

            <option value="Mécanique" <?php echo ($filiere === 'Mécanique') ? 'selected' : ''; ?>>
                Mécanique
            </option>

            <option value="Autre" <?php echo ($filiere === 'Autre') ? 'selected' : ''; ?>>
                Autre
            </option>
        </select><br><br>

        <label>Motivation :</label><br>
        <textarea name="motivation" rows="6"><?php echo $motivation; ?></textarea><br><br>

        <label>
            <input type="checkbox" name="reglement" value="1" <?php echo $reglement ? 'checked' : ''; ?>>
            J'accepte le règlement
        </label><br><br>

        <button type="submit">Envoyer ma candidature</button>

    </form>

<?php endif; ?>

</body>
</html>