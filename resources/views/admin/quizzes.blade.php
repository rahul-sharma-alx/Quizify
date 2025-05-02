<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Manage Quiz Questions</h1>
        @if (session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 3000)" 
                x-show="show" 
                class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg transition ease-in-out duration-300"
            >
                {{ session('success') }}
            </div>
        @endif
        <!-- Add Question Form -->
        <div class="bg-white p-6 rounded shadow mb-8">
            <h2 class="text-xl font-semibold mb-4">Add New Question</h2>
            <form action="{{ route('admin.quizzes.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="question_text" placeholder="Enter your question" class="w-full border border-gray-300 p-2 rounded" required>
                <input type="text" name="option_a" placeholder="Option A" class="w-full border border-gray-300 p-2 rounded" required>
                <input type="text" name="option_b" placeholder="Option B" class="w-full border border-gray-300 p-2 rounded" required>
                <input type="text" name="option_c" placeholder="Option C" class="w-full border border-gray-300 p-2 rounded" required>
                <input type="text" name="option_d" placeholder="Option D" class="w-full border border-gray-300 p-2 rounded" required>
                <input type="text" name="correct_answer" placeholder="Correct Answer (A/B/C/D)" class="w-full border border-gray-300 p-2 rounded" required>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Question</button>
            </form>
        </div>

        <!-- Questions List -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">All Questions</h2>
            <div class="space-y-4">
                @isset($questions)
                    @if ($questions->isEmpty())
                        <p class="text-gray-500">No questions available.</p>
                    @else
                        @foreach ($questions as $question)
                            <div class="p-4 border border-gray-200 rounded bg-gray-50">
                                <h3 class="font-bold">{{ $question->question_text }}</h3>
                                <ul class="list-disc list-inside">
                                    <li>A. {{ $question->option_a }}</li>
                                    <li>B. {{ $question->option_b }}</li>
                                    <li>C. {{ $question->option_c }}</li>
                                    <li>D. {{ $question->option_d }}</li>
                                </ul>
                                <p class="text-green-600">Correct Answer: {{ $question->correct_answer }}</p>
                                <div class="mt-2 space-x-2">
                                    <a href="{{ route('admin.quizzes.edit', $question->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('admin.quizzes.destroy', $question->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endisset
            </div>
        </div>
    </div>
</body>
</html>
