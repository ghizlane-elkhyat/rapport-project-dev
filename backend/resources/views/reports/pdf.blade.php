<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 13px;
            color: #2c2c2c;
        }

        /* HEADER */
        .header {
            border-bottom: 2px solid #5a54e6;
            margin-bottom: 20px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #4e4ab5;
        }

        /* SECTIONS */

        .section {
            margin-top: 18px;
            page-break-inside: avoid;

        }

        .section-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
            text-transform: capitalize;
        }

        /* TABLE */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th {

            font-weight: bold;
        }

        td {
            background: #fafafa;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 7px;
        }



        /* FOOTER */

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            border-top: 2px solid #27ae60;
            text-align: center;
            font-size: 11px;
            padding-top: 5px;
        }

        p {
            /* word-break: break-all; */
        }
    </style>

</head>

<body>

    <!-- HEADER -->

    <div class="header">

        <table class="header-table">

            <tr>

                <td width="70">
                    @php
                        $path = public_path('images/logo-elite.png');
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    @endphp

                    <img src="{{ $base64 }}" width="70">
                </td>

                <td>
                    <div class="title">
                        Elite Coders Academy<br>
                        Rapport pédagogique
                    </div>
                </td>

            </tr>

        </table>

    </div>

    <!-- INFORMATIONS -->

    <div class="section">

        <div class="section-title">
            Informations générales
        </div>

        <table>

            <tr>
                <td><strong>Étudiant</strong></td>
                <td>{{ $report->student->first_name }} {{ $report->student->last_name }}</td>
            </tr>

            <tr>
                <td><strong>Période</strong></td>
                <td>{{ $report->date_debut }} → {{ $report->date_fin }}</td>
            </tr>

        </table>

    </div>

    <!-- PRESENCE -->

    <div class="section">

        <div class="section-title">
            Présence
        </div>

        <table>

            <tr>
                <th>Total séances</th>
                <th>Séances assistées</th>
                <th>Taux présence</th>
            </tr>

            <tr>
                <td>{{ $report->total_seances }}</td>
                <td>{{ $report->seances_assistees }}</td>
                <td>{{ number_format($report->taux_presence, 2) }} %</td>
            </tr>

        </table>

    </div>
    <!-- PERFORMANCE -->

    <div class="section">

        <div class="section-title">
            Performance Académique
        </div>

        <table>

            <tr>
                <th>Moyenne exercices</th>
                <th>Moyenne examens</th>
            </tr>

            <tr>
                <td>{{ $report->moyenne_exercices }}</td>
                <td>{{ $report->moyenne_examen }}</td>
            </tr>

        </table>

    </div>



    <div class="section">

        <!-- MODULES -->

        <div class="section">

            <div class="section-title">
                Modules de formation
            </div>

            <table>

                <tr>
                    <th width="50%">Modules terminés</th>
                    <th width="50%">Modules en cours</th>
                </tr>

                @php
                    $termines = preg_split('/[\r\n;]+/', $report->modules_termines ?? '');
                    $encours = preg_split('/[\r\n;]+/', $report->modules_en_cours ?? '');
                    $max = max(count($termines), count($encours));
                @endphp

                @for ($i = 0; $i < $max; $i++)
                    <tr>
                        <td>
                            {{ isset($termines[$i]) && trim($termines[$i]) != '' ? trim($termines[$i]) : '' }}
                        </td>
                        <td>
                            {{ isset($encours[$i]) && trim($encours[$i]) != '' ? trim($encours[$i]) : '' }}
                        </td>
                    </tr>
                @endfor

            </table>

        </div>



    </div>

    <!-- COMMENTAIRES -->

    <div class="section">

        <div class="section-title">
            Appréciation générale
        </div>

        <p>{{ $report->appreciation_generale }}</p>


    </div>

    <div class="section">


        <div class="section-title">
            Points forts
        </div>

        <p>{{ $report->points_forts }}</p>

    </div>

    <div class="section">


        <div class="section-title">
            Points à améliorer
        </div>

        <p>{{ $report->points_a_ameliorer }}</p>


    </div>

    <div class="section">

        <div class="section-title">
            Recommandations pédagogiques
        </div>

        <p>{{ $report->recommandations }}</p>


    </div>


    <!-- FOOTER -->
    <div class="footer">
        <strong>Elite Coders Academy</strong>Elite Coders Academy © {{ date('Y') }}
        ||
        <strong>Email</strong> : elitecodersacademy@gmail.com
        ||
        <strong>Tél</strong> : 0708359267 / 0535966329
    </div>

</body>

</html>
