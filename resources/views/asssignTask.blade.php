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
                                <span>Add New Ticket</span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('addticket') }}" enctype="multipart/form-data"
                                    class="clearfix">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Ticket Name</label>
                                                <input type="text" class="form-control" name="name" id="size"
                                                    placeholder="Task Name" value="{{ $tasks->name }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Ticket Number</label>
                                                <input type="text" class="form-control" name="number" id="task-files"
                                                    placeholder="Task Number" value="{{ $tasks->number }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Select User</label>
                                        <div>
                                            @foreach ($users as $user)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="user_{{ $user->id }}" name="user_ids[]"
                                                        value="{{ $user->id }}">
                                                    <label class="form-check-label" for="user_{{ $user->id }}">
                                                        {{ $user->name }} || {{ $user->id }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" name="staff" value="{{ session('user.id') }}">
                                    <input type="hidden" name="task_id" value="{{ $tasks->id }}">
                                    <button type="submit" name="add_task" class="btn btn-primary">Add Task</button>
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
