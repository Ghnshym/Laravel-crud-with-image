<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('layout.app');
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h2 class="text-center">User Details</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                </table>
                <div class="text-center">
                    <strong>Photo:</strong><br>
                    <img src="{{ asset('images/' . $user->photo) }}" alt="User Photo" class="img-fluid" style="max-height: 300px;">
                </div>
                <div class="text-center mt-4">
                    <!-- Update Button -->
                    <a href="{{ route('showEdit.user', ['id' => $user->id]) }}" class="btn btn-primary">Update</a>
                    <!-- Delete Button -->
                    <a href="{{ route('destroy.user', ['id' => $user->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
