@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Questions</h1>
        <a href="{{ route('admin.questions.create') }}" class="btn btn-primary">Add New Question</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Type</th>
                        <th>Points</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ Str::limit($question->question_text, 50) }}</td>
                            <td>{{ Str::title(str_replace('_', ' ', $question->question_type)) }}</td>
                            <td>{{ $question->points }}</td>
                            <td>
                                <a href="{{ route('admin.questions.edit', $question) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.questions.destroy', $question) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No questions found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            {{ $questions->links() }}
        </div>
    </div>
</div>
@endsection