@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="z-index: 9999; right: 15px; top: 15px;">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert" style="z-index: 9999; right: 15px; top: 15px;">
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
                                <span>Update Task</span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="{{route('updatetask')}}" enctype="multipart/form-data" class="clearfix">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Task Name</label>
                                                <input type="text" class="form-control" name="name" id="size" placeholder="Task Name" value="{{ $task->name ?? '' }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Task Number</label>
                                                <input type="text" class="form-control" name="number" id="task-files" placeholder="Task Number" value="{{ $task->number ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Category">Task Category</label>
                                                <select class="form-control" name="category" id="task-category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>{{ $category->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Category">Contact Person</label>
                                                <select class="form-control" name="person" id="category">
                                                    @foreach ($contacts as $con)
                                                        <option value="{{ $con->id }}" {{ $con->id == $task->person_id ? 'selected' : '' }}>{{ $con->incharge }} | | {{ $con->office_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Size</label>
                                                <input type="text" class="form-control" name="size" id="task-size" placeholder="Task Size" value="{{ $task->size ?? '' }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Files</label>
                                                <input type="file" class="form-control" name="taskfile" id="task-files" accept=".jpg, .jpeg, .png, .gif, .bmp, .pdf, .doc, .docx, .xls, .xlsx" value="{{ Storage::url('app/' . $task->file_path) }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="task-description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Task Description">{{ $task->description ?? '' }}</textarea>
                                    </div>
                                    <input type="hidden" name="staff" value="{{ session('user.id') }}">
                                    <input type="hidden" name="task_id" value="{{ $id}}">
                                    <button type="submit" name="add_task" class="btn btn-primary">Update Task</button>
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
