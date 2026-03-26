<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Report;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function apiStore(Request $request)
    {

        $request->validate([
            'student_id' => 'required|exists:students,id',
            'formation_id' => 'required|exists:formations,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'total_seances' => 'required|integer|min:1',
            'seances_assistees' => 'required|integer|lte:total_seances',
            'appreciation_generale' => 'required|string',
            'points_forts' => 'required|string',
            'points_a_ameliorer' => 'required|string',
            'recommandations' => 'required|string',
        ]);

        $tauxPresence = ($request->seances_assistees / $request->total_seances) * 100;
        $report = Report::create([
            'student_id' => $request->student_id,
            'formation_id' => $request->formation_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'total_seances' => $request->total_seances,
            'seances_assistees' => $request->seances_assistees,
            'taux_presence' => $tauxPresence,
            'moyenne_exercices' => $request->moyenne_exercices ?? 0,
            'moyenne_examen' => $request->moyenne_examen ?? 0,

            'modules_termines' => $request->modules_termines ?? '',
            'modules_en_cours' => $request->modules_en_cours ?? '',
            'appreciation_generale' => $request->appreciation_generale,
            'points_forts' => $request->points_forts,
            'points_a_ameliorer' => $request->points_a_ameliorer,
            'recommandations' => $request->recommandations,
            'date_generation' => now(),
        ]);

        $report->load(['student', 'formation']);

        $pdf = Pdf::loadView('reports.pdf', [
            'report' => $report,
        ])->setOptions([
            'isRemoteEnabled' => true,
        ]);

    
        
        $studentName = $report->student->first_name . '_' . $report->student->last_name;

        $fileName = $studentName . '_report_' . $report->id . '.pdf';

        $path = 'reports/'.$fileName;

        Storage::disk('local')->put(
            $path,
            $pdf->output()
        );

        $report->update([
            'chemin_pdf' => $path,
        ]);

        return response()->json([

            'message' => 'Rapport créé avec succès',
            'report_id' => $report->id,
            'chemin_pdf' => $report->chemin_pdf,
        ]);
    }

    public function apiDownload(Report $report)
    {
        $path = storage_path('app/private/'.$report->chemin_pdf);

        if (! file_exists($path)) {
            return response()->json([
                'message' => 'Fichier introuvable',
            ], 404);
        }

        return response()->download($path);
    }

    public function apiSendEmail(Report $report)
    {
        $parentEmail = $report->student->parent_email;
        // dd(storage_path('app/'.$report->pdf_path));
        $path = storage_path('app/private/'.$report->chemin_pdf);
        if (! file_exists($path)) {
            return response()->json([
                'message' => 'Fichier PDF introuvable',
            ], 404);
        }
        try {
            Mail::to($parentEmail)->send(new ReportMail($report));

            
            return response()->json([
                'message' => 'Rapport envoyé au parent avec succès',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function apiHistory()
    {
        $reports = Report::with(['student', 'formation'])
            ->latest()
            ->paginate(10);

        

        return response()->json($reports);
    }

    public function apiReportsByFormation($formation_id)
    {
        $reports = Report::with(['student', 'formation'])
            ->where('formation_id', $formation_id)
            ->latest()
            ->get();

        return response()->json($reports);
    }

   
    public function apiReportsByStudent($formation_id, $student_id)
{
    $reports = Report::with(['formation'])
        ->where('student_id', $student_id)
        ->where('formation_id', $formation_id)
        ->latest()
        ->get();

    return response()->json($reports);
}
}
