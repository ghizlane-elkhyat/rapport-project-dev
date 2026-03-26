<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Historique des rapports</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2 class="mb-4">Historique des rapports</h2>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>Étudiant</th>
                    <th>Période</th>
                    <th>Date génération</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($reports as $report)
                    <tr>

                        <td>
                            {{ $report->student->first_name }}
                            {{ $report->student->last_name }}
                        </td>

                        <td>
                            {{ $report->period_start }} → {{ $report->period_end }}
                        </td>

                        <td>
                            {{ $report->generated_at }}
                        </td>

                        <td>

                            <a href="{{ route('reports.download', $report->id) }}" class="btn btn-primary btn-sm">

                                Télécharger

                            </a>

                            <form method="POST" action="{{ route('reports.sendEmail', $report->id) }}"
                                style="display:inline">

                                @csrf

                                <button class="btn btn-success btn-sm">

                                    Envoyer email

                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

</body>

</html>
