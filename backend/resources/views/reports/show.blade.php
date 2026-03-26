{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Rapport généré</h2>

<p>
Étudiant :
{{ $report->student->first_name }}
{{ $report->student->last_name }}
</p>

<a href="{{ route('reports.download',$report->id) }}">
<button>Télécharger PDF</button>
</a>

<form method="POST" action="{{ route('reports.sendEmail',$report->id) }}">

@csrf

<button type="submit">

Envoyer aux parents

</button>

</form>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="card shadow p-4">

            <h3 class="text-success">

                Rapport créé et PDF généré avec succès

            </h3>

            <p class="mt-3">

                Voulez-vous télécharger le rapport ou l'envoyer aux parents ?

            </p>


            <div class="mt-4">

                <a href="{{ route('reports.download', $report->id) }}" class="btn btn-primary">

                    Télécharger le PDF

                </a>


                <form method="POST" action="{{ route('reports.sendEmail', $report->id) }}" class="d-inline">

                    @csrf

                    <button class="btn btn-success">

                        Envoyer aux parents

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
