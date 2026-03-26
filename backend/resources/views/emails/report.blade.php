<!DOCTYPE html>
<html>

<body>

    <h2>Rapport pédagogique</h2>

    <p>

        Bonjour,

    </p>

    <p>

        Veuillez trouver ci-joint le rapport pédagogique de votre enfant

        <strong>
            {{ $report->student->first_name }}
            {{ $report->student->last_name }}
        </strong>

        pour la période :

        {{ $report->date_debut }} → {{ $report->date_fin }}

    </p>

    <p>

        Cordialement
        Elite Coders Academy

    </p>

</body>

</html>
