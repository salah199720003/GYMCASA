@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
    <main class="container mt-4">
        <h1 class="mb-4">View Messages</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Content</th>
                        <th>Email</th>
                        <th>Titre</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->user_id }}</td>
                            <td>{{ $message->content }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->titre }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Your footer content here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection