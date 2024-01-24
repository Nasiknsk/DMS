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
        <div class="row" style="margin-left:100px; margin-top:100px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Update Category</span>
                    </strong>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">

                        <form method="post" action="{{route('updatecat')}}">
                            @csrf

                            <div>
                                <div class="form-group">
                                    <label for="name">Category Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{$editcat->cat_name}}" required>
                                    <input type="hidden" name="id" class="form-control" value="{{$editcat->id}}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
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
