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

@extends('admin')

@section('sub')
    @if (session('user'))
        <div class="small">Logged in as: {{ session('user.name') }}</div>
    @endif
@endsection

@section('main')
    <main role="main">
        <!-- Your page content goes here -->
        <div class="row" style="margin-left:20px; margin-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Add New Category</span>
                    </strong>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">

                        <form method="post" action="{{ route('newcat') }}">
                            @csrf

                            <div>
                                <div class="form-group">
                                    <label for="name">Category Name:</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button><br><br>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All Categories
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($categories as $cats)
                            <tr>
                                <td>{{ $cats->id }}</td>
                                <td>{{ $cats->cat_name }}</td>
                                <td>
                                    <a href="{{ route('editcat', ['id' => $cats->id]) }}"><i class="fas fa-edit"></i></a>

                                    <a href="{{ route('deletecat', ['id' => $cats->id]) }}" onclick="confirm('Do you sure want to delete?')"><i
                                            class="fas fa-trash" style="color: red;"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No categories available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>



    </main>


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
