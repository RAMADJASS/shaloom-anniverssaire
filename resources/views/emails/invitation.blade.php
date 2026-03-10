<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body style="background:#2B1B12;color:#F5E9D3;font-family:Georgia;padding:30px">

    <h2 style="color:#C9A14A">Nouvelle réponse à l’invitation</h2>

    <p><strong>Nom :</strong> {{ $invitation->nom }}</p>
    <p><strong>Prénom :</strong> {{ $invitation->prenom }}</p>

    <hr>

    <p><strong>Participation :</strong> {{ $invitation->participation }}</p>
    <p><strong>Disponible :</strong> {{ $invitation->disponible }}</p>
    <p><strong>Gêle :</strong> {{ $invitation->gele }}</p>
    <p><strong>Respect thème :</strong> {{ $invitation->respect }}</p>
    <p><strong>Boisson :</strong> {{ $invitation->boisson }}</p>
    <p><strong>Accompagnement :</strong> {{ $invitation->accompagnement }}</p>

    <hr>

    <p style="font-size:12px;color:#ccc">
        Invitation Anniversaire Shaloom
    </p>

</body>
</html>