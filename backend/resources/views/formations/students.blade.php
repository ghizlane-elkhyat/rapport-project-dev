<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Étudiants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

    <div class="container mt-5">

        <h2 class="mb-4">

            Formation : {{ $formation->title }}

        </h2>

        <div class="row">

            @forelse($formation->students as $student)
                <div class="col-md-4 mb-3">

                    <a href="{{ route('reports.create', $student->id) }}">

                        <div class="student-card shadow-soft">

                            <h5>

                                {{ $student->first_name }} {{ $student->last_name }}

                            </h5>

                            <p class="text-muted">

                                Créer rapport

                            </p>

                        </div>

                    </a>

                </div>

            @empty

                <p>Aucun étudiant dans cette formation</p>
            @endforelse

        </div>

    </div>

</body>

</html>
