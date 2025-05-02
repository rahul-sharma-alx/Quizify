@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Edit Quiz Question</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.quizzes.update', $question->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
    
        <div>
            <label for="question_text" class="block text-sm font-medium text-gray-700">Question</label>
            <input type="text" id="question_text" name="question_text" value="{{ old('question_text', $question->question_text) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="option_a" class="block text-sm font-medium text-gray-700">Option A</label>
            <input type="text" id="option_a" name="option_a" value="{{ old('option_a', $question->option_a) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="option_b" class="block text-sm font-medium text-gray-700">Option B</label>
            <input type="text" id="option_b" name="option_b" value="{{ old('option_b', $question->option_b) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="option_c" class="block text-sm font-medium text-gray-700">Option C</label>
            <input type="text" id="option_c" name="option_c" value="{{ old('option_c', $question->option_c) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="option_d" class="block text-sm font-medium text-gray-700">Option D</label>
            <input type="text" id="option_d" name="option_d" value="{{ old('option_d', $question->option_d) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="correct_answer" class="block text-sm font-medium text-gray-700">Correct Answer (a/b/c/d)</label>
            <input type="text" id="correct_answer" name="correct_answer" value="{{ old('correct_answer', $question->correct_answer) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <label for="difficulty_level" class="block text-sm font-medium text-gray-700">Difficulty Level</label>
            <select id="difficulty_level" name="difficulty_level" class="w-full border border-gray-300 p-2 rounded" required>
                <option value="">Select Difficulty</option>
                <option value="easy" {{ old('difficulty_level', $question->difficulty_level) == 'easy' ? 'selected' : '' }}>Easy</option>
                <option value="medium" {{ old('difficulty_level', $question->difficulty_level) == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="hard" {{ old('difficulty_level', $question->difficulty_level) == 'hard' ? 'selected' : '' }}>Hard</option>
            </select>
        </div>
    
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $question->category) }}"
                class="w-full border border-gray-300 p-2 rounded" required>
        </div>
    
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Question
            </button>
        </div>
    </form>
    
</div>
@endsection
