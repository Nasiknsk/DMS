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
                        <a href="#" class="text-white">Card 1</a>
                    </div>
                    <div class="card-body">
                        Content for Card 1
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 bg-success">
                    <div class="card-header text-white">
                        <a href="#" class="text-white">Card 2</a>
                    </div>
                    <div class="card-body">
                        Content for Card 2
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 bg-warning">
                    <div class="card-header text-white">
                        <a href="#" class="text-white">Card 3</a>
                    </div>
                    <div class="card-body">
                        Content for Card 3
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 bg-danger">
                    <div class="card-header text-white">
                        <a href="#" class="text-white">Card 4</a>
                    </div>
                    <div class="card-body">
                        Content for Card 4
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 bg-info">
                    <div class="card-header text-white">
                        <a href="#" class="text-white">Card 5</a>
                    </div>
                    <div class="card-body">
                        Content for Card 5
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 bg-secondary">
                    <div class="card-header text-white">
                        <a href="#" class="text-white">Card 6</a>
                    </div>
                    <div class="card-body">
                        Content for Card 6
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
@endsection
