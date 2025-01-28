<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Test Mail</title>
</head>
<body>
    <h2>Vous avez reçu un email :</h2>

<div class="mail-content">
    <p> <strong>Nom :</strong> {{ $name }}</p>
    <p><strong>Email :</strong> {{ $email }}</p>
    <p><strong>Message :</strong> {{ $messageContent }}</p>
</div>
</body>
</html>
