<?php

namespace App\Http\Controllers;

use App\Models\Formation;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();

        return view('formations.index', compact('formations'));
    }

    // methode Api :
    public function apiIndex()
    {
        return response()->json(Formation::all());
    }

    public function students($id)
    {
        $formation = Formation::with('students')->findOrFail($id);

        return view('formations.students', compact('formation'));
    }

    // api methode
    public function apiStudents($id)
    {
        $formation = Formation::with('students')->findOrFail($id);

        return response()->json([
            'formation' => $formation,
            'students' => $formation->students,
        ]);
    }
}
