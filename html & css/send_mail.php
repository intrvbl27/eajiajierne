<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sécurisation des champs reçus
    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $pack = htmlspecialchars(trim($_POST['pack'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Vérification de base
    if (empty($nom) || empty($email) || empty($message)) {
        echo "<h2 style='color:red;'>Veuillez remplir tous les champs obligatoires.</h2>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h2 style='color:red;'>Adresse e-mail invalide.</h2>";
        exit;
    }

    // Configuration de l’e-mail
    $to = "omarhed.pro@gmail.com"; // <-- ton adresse de réception
    $subject = "Nouvelle demande de contact – $pack";
    $body = "Nom : $nom\nEmail : $email\nPack choisi : $pack\n\nMessage :\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\nX-Mailer: PHP/" . phpversion();

    // Envoi du mail
    if (mail($to, $subject, $body, $headers)) {
        echo "<h2 style='color:green;'>Merci $nom, votre message a été envoyé avec succès !</h2>";
    } else {
        echo "<h2 style='color:red;'>Une erreur est survenue. Veuillez réessayer plus tard.</h2>";
    }
} else {
    // Si on accède directement au fichier sans POST
    echo "<h2 style='color:red;'>Accès non autorisé.</h2>";
}
?>
