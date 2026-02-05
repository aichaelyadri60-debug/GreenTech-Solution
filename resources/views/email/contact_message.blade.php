<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif;">

    <h2>📩 Nouveau message de contact</h2>

    <p><strong>Email de l’utilisateur :</strong> {{ $email }}</p>

    <p><strong>Message :</strong></p>

    <p style="background:#f4f4f4;padding:12px;border-radius:6px;">
        {{ $content }}
    </p>

</body>
</html>
