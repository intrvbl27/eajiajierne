<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $pack = htmlspecialchars($_POST['pack']);
    $message = htmlspecialchars($_POST['message']);

    $to = "omarhed.pro@gmail.com"; // 🔧 Mets ton e-mail ici
    $subject = "Nouvelle demande de contact – $pack";
    $body = "Nom : $nom\nEmail : $email\nPack choisi : $pack\n\nMessage :\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "<h2>Merci $nom, votre message a été envoyé avec succès !</h2>";
    } else {
        echo "<h2>Une erreur est survenue. Veuillez réessayer plus tard.</h2>";
    }
}
?>