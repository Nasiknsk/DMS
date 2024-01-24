<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Your Dashboard</title>
    <style>
        body, html {
            height: 100%;
        }

        .container-fluid {
            height: 100%;
        }

        .row {
            height: 100%;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->

        <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
            <div class="sidebar-sticky" style="height: 100%;">
                <ul class="nav flex-column">
                    <h1 style="color:azure;">DMS-USER</h1>
                    <div class="mt-auto">
                        @if(isset($userName))
                            <p class="text-white mt-3"> {{ $userName }} : {{$id}}</p>
                        @endif

                    </div>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-bar"></i> Analytics
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-folder"></i> Documents
                        </a>
                    </li>
                    <li><a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a></li>
                </ul>


            </div>
        </nav>

        <!-- Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!-- Your page content goes here -->
            <h1 class="mt-2">Contents goes here</h1>
        </main>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
