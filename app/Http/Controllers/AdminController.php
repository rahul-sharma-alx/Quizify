<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    
    public function quizzes() {
        $questions = Questions::all();
        return view('admin.quizzes', compact('questions'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'question_text' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_answer' => 'required|string|in:A,B,C,D',
            // 'difficulty_level' => 'required|string|in:easy,medium,hard',
            // 'category' => 'required|string|max:255',
            
        ]);

        $validatedData['created_by'] = Auth::id();
        $validatedData['updated_by'] = Auth::id();

        Questions::create($validatedData);

        return redirect()->route('admin.quizzes')->with('success', 'Question added successfully!');
    }
    public function edit($id) {
        $question = Questions::findOrFail($id);
        return view('admin.edit_quiz', compact('question'));
    }
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'question_text' => 'required|string|max:255',
            'option_a' => 'required|string|max:255',
            'option_b' => 'required|string|max:255',
            'option_c' => 'required|string|max:255',
            'option_d' => 'required|string|max:255',
            'correct_answer' => 'required|string|in:A,B,C,D',
        ]);

        $question = Questions::findOrFail($id);
        $question->update($validatedData);

        return redirect()->route('admin.quizzes')->with('success', 'Question updated successfully!');
    }
    public function destroy($id) {
        $question = Questions::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.quizzes')->with('success', 'Question deleted successfully!');
    }

    public function getUsers() {
        $users = User::paginate(10);
        return view('admin.users.users', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
}
