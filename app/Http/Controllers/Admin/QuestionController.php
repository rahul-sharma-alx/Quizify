<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getQuestions( Request $request)
    {
        $questions = \App\Models\Questions::forAdmin(Auth::id())
        ->when($request->category, function($query) use ($request) {
            return $query->forCategory($request->category);
        })
        ->when($request->difficulty, function($query) use ($request) {
            return $query->forDifficulty($request->difficulty);
        })
        ->latest()
        ->paginate(10); // ← This is what makes pagination work
    
        $categories = Questions::forAdmin(Auth::id())
            ->distinct('category')
            ->pluck('category');

        return view('admin.questions.index', compact('questions', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questions $questions)
    {
        //
    }
}
