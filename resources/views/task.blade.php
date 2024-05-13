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
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All users
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Size</th>
                            {{-- <th>Description</th> --}}
                            <th>File</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Client</th>
                            <th>Size</th>
                            {{-- <th>Description</th> --}}
                            <th>File</th>
                            <th>Date</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->number }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->category_name }}</td>
                            <td>{{ $task->person_name }}</td>
                            <td>{{ $task->size }}</td>
                            {{-- <td><p>{{ $task->description }}</p></td> --}}
                            <td>
                                @if($task->file_path)
                                <a href="{{ Storage::url('app/' . $task->file_path) }}">Download File</a>
                                @else
                                No File Attached
                                @endif
                            </td>
                            <td>{{ $task->updated_at }}</td>
                            <td>{{ $task->staff_name }}</td>
                            <td style="color: {{ $task->status == 0 ? 'red' : 'green' }}">
                                @if($task->status == 0)
                                    Not Assigned
                                @else
                                    Assigned
                                @endif
                            </td>


                            <td>
                                <a href="{{ route('edittask', ['id' => $task->id]) }}"><i class="fas fa-edit"></i></a>
                                {{-- <a href="{{ route('editContact', ['id' => $con->id]) }}"><i class="fas fa-eye"></i></a> --}}

                                <a href="{{ route('assign.task', ['id' => $task->id]) }}"><i class="fas fa-user-plus" aria-hidden="true"></i></a>
                                <a href="{{ route('unassignTask', $task->id) }}"><i class="fas fa-user-minus"></i></a>
                                <a href="{{ route('taskticket', $task->id) }}"><i class="fas fa-eye"></i></a>
                                {{-- <a href="#" onclick="confirm('Do you sure want to delete?')"><i class="fas fa-trash" style="color: red;"></i></a> --}}

                                {{-- {{ route('update.user', ['id' => $user->id]) }} --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
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
                                <form method="post" action="{{route('addtask')}}" enctype="multipart/form-data" class="clearfix">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Task Name</label>
                                                <input type="text" class="form-control" name="name" id="size"
                                                    placeholder="Task Name" value="{{ old('task-size') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Task Number</label>
                                                <input type="text" class="form-control" name="number"
                                                    id="task-files" placeholder="Task Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="Category">Task Category</label>
                                                <select class="form-control" name="category" id="task-category">
                                                    @foreach ($categorie as $category)
                                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="Category">Contact Person</label>
                                                <select class="form-control" name="person" id="category">
                                                    @foreach ($contact as $con)
                                                        <option value="{{ $con->id }}">{{ $con->incharge }}  | | {{ $con->office_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="task-size">Size</label>
                                                <input type="text" class="form-control" name="size" id="task-size"
                                                    placeholder="Task Size" value="{{ old('task-size') }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="task-files">Files</label>
                                                <input type="file" class="form-control" name="taskfile"
                                                    id="task-files"
                                                    accept=".jpg, .jpeg, .png, .gif, .bmp, .pdf, .doc, .docx, .xls, .xlsx">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="task-description">Description</label>
                                        <textarea class="form-control" name="description" id="description" rows="5"
                                            placeholder="Task Description">{{ old('task-description') }}</textarea>
                                    </div>
                                    <input type="hidden" name="staff" value="{{ session('user.id') }}">
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
