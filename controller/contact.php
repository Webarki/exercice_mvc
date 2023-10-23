<?php
if (isset($_POST["btnData"])) {

    if (isset($_POST['email']) && isset($_POST["message"])) {
        // tableau d'erreur
        if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['email'])) {
            $to = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = 'Merci de renseigner un mail valide.';
        }
        if (!empty($_POST['subject']) && isset($_POST['subject'])) {
            $subject = htmlspecialchars($_POST['subject']);
        } else {
            $formError['subject'] = 'Merci de renseigner un nom.';
        }
        if (!empty($_POST['message']) && isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']);
        } else {
            $formError['message'] = 'Veuiller écrire un message.';
        }

        if (empty($formError)) {
            $headers = "MIME-Version: 1.0\r\n";
            //header mail avec ces paramêtres
            $headers = "From: $to" . PHP_EOL;
            $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
            mail("mailutils02k@gmail.com", $subject, $message, $headers);
            $formSuccess['success'] = 'Félicitation votre mail a été  envoyé avec succès !';
            echo '<script>window.location.href="index.php?homepage";</script>';
        } else {
            $formError['error'] = "Désolé une erreur est survenue lors de l'envoi du mail 🙁.";
        }
    }
}
