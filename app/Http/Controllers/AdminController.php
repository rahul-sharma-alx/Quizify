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
        $roles = Role::all();
        $users = User::paginate(10);
        foreach ($users as $user) {
            // Remove spaces and convert to lowercase
            $formattedName = strtolower(str_replace(' ', '', $user->name));
            
            // Append length of original name
            $formattedName = $formattedName . strlen($formattedName);
    
            // Generate username (you can modify this logic if needed)
            $user->username = $formattedName; // Adding random number for uniqueness
        }
        return view('admin.users.users', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $user->roles()->attach($validatedData['role_id']);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function updateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }
        $user->update($validatedData);
        $user->roles()->sync([$validatedData['role_id']]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
