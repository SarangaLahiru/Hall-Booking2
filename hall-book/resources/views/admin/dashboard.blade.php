<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-user-shield mr-2"></i>Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <div class="dropdown-header">
                                {{ $adminData->name }}
                            </div>
                            <div class="dropdown-header">
                                {{ $adminData->email }}
                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('admin.password.reset') }}">
                                <i class="fas fa-key mr-2"></i>Reset Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="card-title"><i class="fas fa-clock mr-2"></i>Pending Bookings</h5>
                                <p class="card-text">{{ $pendingCount }}</p>
                            </div>
                            <div class="ml-auto">
                                <i class="fas fa-exclamation-circle fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="card-title"><i class="fas fa-check-circle mr-2"></i>Accepted Bookings</h5>
                                <p class="card-text">{{ $acceptedCount }}</p>
                            </div>
                            <div class="ml-auto">
                                <i class="fas fa-thumbs-up fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="card-title"><i class="fas fa-times-circle mr-2"></i>Rejected Bookings</h5>
                                <p class="card-text">{{ $rejectedCount }}</p>
                            </div>
                            <div class="ml-auto">
                                <i class="fas fa-thumbs-down fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Booking Details</h1>
        <table id="bookingTable" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Creation Date</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings->sortByDesc('created_at') as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->category }}</td>
                        <td class="{{ $booking->status === 'pending' ? 'text-danger' : ($booking->status === 'accepted' ? 'text-success' : '') }}">
                            {{ $booking->status }}
                        </td>
                        <td>
                            <a href="{{ route('admin.booking.show', $booking->id) }}" class="btn btn-primary btn-sm">View More</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            $('#bookingTable').DataTable();
        });
    </script>
</body>
</html>
