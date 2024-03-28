@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
    <div class="container mt-4">
        <h1 class="mb-4">View Reservations</h1>

        <form method="post" action="{{ route('admin.export-reservations') }}" class="mb-3">
            @csrf
            <button type="submit" class="btn btn-success">Export Reservations</button>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->id_user }}</td>

                        @php
                            $user = \App\Models\User::find($reservation->id_user);
                        @endphp

                        <td>{{ $user->name ?? 'N/A' }}</td>
                        <td>{{ $user->email ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection

