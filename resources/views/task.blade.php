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

        <div style="margin-left: 20px; margin-top:20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>Add New Task</span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="#" enctype="multipart/form-data" class="clearfix">
                                    @csrf
                                    <div class="form-group">
                                        <label for="task-name">Task Name</label>
                                        <input type="text" class="form-control" name="task-name" id="task-name"
                                            placeholder="Task Name" value="{{ old('task-name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="task-category">Task Category</label>
                                        <select class="form-control" name="task-category" id="task-category">
                                            <!-- Add your categories dynamically using Blade directives -->
                                            @foreach ($categorie as $category)
                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Size</label>
                                                <input type="text" class="form-control" name="task-size" id="task-size"
                                                    placeholder="Task Size" value="{{ old('task-size') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Files</label>
                                                <input type="file" class="form-control" name="task-files[]"
                                                    id="task-files" multiple
                                                    accept=".jpg, .jpeg, .png, .gif, .bmp, .pdf, .doc, .docx, .xls, .xlsx">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="task-description">Description</label>
                                        <textarea class="form-control" name="task-description" id="task-description" rows="5"
                                            placeholder="Task Description">{{ old('task-description') }}</textarea>
                                    </div>
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
