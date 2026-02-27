<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invitation à rejoindre la colocation</title>
</head>
<body>
    <p>Vous avez été invité(e) à rejoindre une colocation !</p>

    <p>Cliquez sur le lien pour accepter :</p>
    <a href="{{ url('/invitation/accept/' . $token) }}">
        Rejoindre la colocation
    </a>

    <p>Si vous ne voulez pas rejoindre, ignorez ce mail.</p>
</body>
</html>