<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layout.app');
    <div class="container">
        <h1 class="my-4">All Users</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/' . $user->photo) }}" class="card-img-top" alt="User Photo" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $user->email }}<br>
                                <strong>Phone:</strong> {{ $user->phone }}<br>
                            </p>
                            <a href="{{ route('showDetailes.user', ['id' => $user->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
