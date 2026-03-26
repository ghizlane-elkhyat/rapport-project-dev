<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">Liste des Formations</h2>

        <div class="row">

            @foreach ($formations as $formation)
                <div class="col-md-4 mb-4">

                    <a href="{{ route('formations.students', $formation->id) }}">

                        <div class="card formation-card shadow-soft p-4">

                            <h5>{{ $formation->title }}</h5>

                            <p class="text-muted">

                                Cliquez pour voir les étudiants

                            </p>

                        </div>

                    </a>

                </div>
            @endforeach

        </div>

    </div>

</body>

</html>
