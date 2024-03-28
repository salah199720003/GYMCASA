@extends('layout.master')

@section('header')
    @include('layout.navadmin')
@endsection 

@section('main')
<body class="bg-light">
    <header><!-- Your header content here --></header>

    <main class="container mt-4">
        <h1 class="mb-4">Admin Tools</h1>

        <div>
            <table class="table" border="1">
                <tr>
                    <th>Registered Users Count</th>
                    <td>{{ $registeredUsersCount }}</td>
                </tr>
                <tr>
                    <th>Reservations Count</th>
                    <td>{{ $reservationsCount }}</td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">Click below to manage users.</p>
                        <a href="{{ route('admin.manage-users') }}" class="btn btn-primary">Go to Users</a>
                    </div>
                </div>
            </div>
           

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Reservations</h5>
                        <p class="card-text">Click below to view reservations.</p>
                        <a href="{{ route('admin.view-reservations') }}" class="btn btn-primary">View Reservations</a>
                    </div>
                </div>
            </div>

            <!-- New button to view messages -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Messages</h5>
                        <p class="card-text">Click below to view messages.</p>
                        <a href="{{ route('admin.view-messages') }}" class="btn btn-primary">View Messages</a>
                    </div>
                </div>
            </div>

            <!-- Add a new column for Admin Videos with spacing -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Admin Videos</h5>
                        <p class="card-text">Click below to manage videos.</p>
                        <a href="{{ route('adminvideo.index') }}" class="btn btn-primary">Manage Videos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage produits</h5>
                        <p class="card-text">Click below to manage produits.</p>
                        <a href="{{ url('/produits') }}" class="btn btn-primary">Go to produits</a>
                    </div>
                </div>
            </div>
    </main>
@endsection
    <!-- Your footer content here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
