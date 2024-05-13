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
    <main role="main">
        <div style="margin-left: 20px; margin-top:20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>Remove Designer From Task</span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('unassignedusers') }}" enctype="multipart/form-data"
                                    class="clearfix">
                                    @csrf


                                    <div class="form-group">
                                        <label>Select User</label>
                                        <div>
                                            @foreach ($users as $user)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="user_{{ $user['id'] }}" name="user_ids[]"
                                                        value="{{ $user['id'] }}">
                                                    <label class="form-check-label" for="user_{{ $user['id'] }}">
                                                        {{ $user['name']}} || {{ $user['id'] }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="staff" value="{{ session('user.id') }}">
                                    <input type="hidden" name="task_id" value="{{ $id }}">
                                    <button type="submit" name="unassigned" class="btn btn-danger">Un Assigned User</button>
                                </form>
                            </div>
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
