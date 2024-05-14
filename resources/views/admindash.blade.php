@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show fixed-top" role="alert"
        style="z-index: 9999; right: 15px; top: 15px;">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert"
        style="z-index: 9999; right: 15px; top: 15px;">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@extends(session('user.type') == 1 ? 'supervisor' : 'admin')

@section('sub')
    @if (session('user'))
        <div class="small">Logged in as: {{ session('user.name') }}</div>
    @endif
@endsection

@section('main')
    <main role="main" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 bg-primary">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Daily Works</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-calendar-alt fa-3x text-white"></i>
                            <div>Daily Works</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 bg-success">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Clients</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x text-white"></i>
                            <div>Clients</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 bg-warning">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Staffs</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-user-tie fa-3x text-white"></i>
                            <div>Staffs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 bg-danger">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Tasks</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-tasks fa-3x text-white"></i>
                            <div>Content for Card 4</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 bg-info">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Tickets</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-ticket-alt fa-3x text-white"></i>
                            <div>Content for Card 5</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 bg-secondary">
                        <div class="card-header text-white">
                            <a href="#" class="text-white">Categories</a>
                        </div>
                        <div class="card-body text-center">
                            <i class="fas fa-list fa-3x text-white"></i>
                            <div>Content for Card 6</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
