@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mb-4">Manage Users</h1>
            <div>
                <a href="{{ route('admin.add-user') }}" class="btn btn-success">Add User</a>
            </div>
        </div>

        <!-- Add the search form -->
        <form action="{{ route('admin.search-users') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Email">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date D'inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form method="post" action="{{ route('admin.delete-user', ['id' => $user->id]) }}">
                                <a href="{{ route('admin.edit-user', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div> {{ $users->links() }}
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  @endsection
