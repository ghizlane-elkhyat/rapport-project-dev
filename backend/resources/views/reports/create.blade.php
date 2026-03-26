<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Créer Rapport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6fb;
        }

        .card {
            border-radius: 12px;
        }

        .section-title {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        textarea {
            resize: none;
        }
    </style>

</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="card shadow-lg">

            <div class="card-header bg-primary text-white">

                <h4>
                    Rapport pédagogique — {{ $student->first_name }} {{ $student->last_name }}
                </h4>

            </div>

            <div class="card-body">

                {{-- message succès --}}
                {{-- @if (session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif --}}


                {{-- erreurs globales --}}
                @if ($errors->any())

                    <div class="alert alert-danger">

                        <strong>Veuillez corriger les erreurs suivantes :</strong>

                        <ul class="mb-0 mt-2">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                <form method="POST" action="{{ route('reports.store') }}">

                    @csrf

                    <input type="hidden" name="student_id" value="{{ $student->id }}">


                    <h5 class="section-title">Informations générales</h5>

                    <div class="row mb-4">


                        <div class="col-md-6">

                            <label class="form-label">Nom du formateur</label>

                            <input type="text" name="user_name" value="{{ old('user_name') }}"
                                class="form-control @error('user_name') is-invalid @enderror" required>

                            @error('user_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">Date début</label>

                            <input type="date" name="period_start" value="{{ old('period_start') }}"
                                class="form-control @error('period_start') is-invalid @enderror" required>

                            @error('period_start')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">Date fin</label>

                            <input type="date" name="period_end" value="{{ old('period_end') }}"
                                class="form-control @error('period_end') is-invalid @enderror" required>

                            @error('period_end')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>



                    <h5 class="section-title">Statistiques pédagogiques</h5>

                    <div class="row mb-4">

                        <div class="col-md-3">

                            <label class="form-label">Total séances</label>

                            <input type="number" name="total_sessions" value="{{ old('total_sessions') }}"
                                class="form-control @error('total_sessions') is-invalid @enderror" min="1"
                                required>

                            @error('total_sessions')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">Présences</label>

                            <input type="number" name="attended_sessions" value="{{ old('attended_sessions') }}"
                                class="form-control @error('attended_sessions') is-invalid @enderror" min="0"
                                required>

                            @error('attended_sessions')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">Score exercices (%)</label>

                            <input type="number" name="avg_exercises_score" value="{{ old('avg_exercises_score') }}"
                                class="form-control @error('avg_exercises_score') is-invalid @enderror" min="0"
                                max="100">

                            @error('avg_exercises_score')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-3">

                            <label class="form-label">Score examens (%)</label>

                            <input type="number" name="avg_exam_score" value="{{ old('avg_exam_score') }}"
                                class="form-control @error('avg_exam_score') is-invalid @enderror" min="0"
                                max="100">

                            @error('avg_exam_score')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>



                    <div class="row mb-4">

                        <div class="col-md-6">

                            <label class="form-label">Modules complétés</label>

                            <input type="number" name="completed_modules" value="{{ old('completed_modules') }}"
                                class="form-control @error('completed_modules') is-invalid @enderror" min="0">

                            @error('completed_modules')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="col-md-6">

                            <label class="form-label">Modules en cours</label>

                            <input type="number" name="ongoing_modules" value="{{ old('ongoing_modules') }}"
                                class="form-control @error('ongoing_modules') is-invalid @enderror" min="0">

                            @error('ongoing_modules')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>



                    <h5 class="section-title">Commentaires pédagogiques</h5>

                    <div class="mb-3">

                        <label class="form-label">Appréciation générale</label>

                        <textarea name="appreciation" rows="3" class="form-control @error('appreciation') is-invalid @enderror" required>{{ old('appreciation') }}</textarea>

                        @error('appreciation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">Points forts</label>

                        <textarea name="strengths" rows="3" class="form-control @error('strengths') is-invalid @enderror" required>{{ old('strengths') }}</textarea>

                        @error('strengths')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">Points à améliorer</label>

                        <textarea name="improvements" rows="3" class="form-control @error('improvements') is-invalid @enderror"
                            required>{{ old('improvements') }}</textarea>

                        @error('improvements')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="mb-4">

                        <label class="form-label">Recommandations</label>

                        <textarea name="recommendations" rows="3" class="form-control @error('recommendations') is-invalid @enderror"
                            required>{{ old('recommendations') }}</textarea>

                        @error('recommendations')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="text-end">

                        <button type="submit" class="btn btn-success btn-lg">

                            Générer le rapport

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
