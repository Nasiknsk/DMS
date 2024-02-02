@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>NIC</th>
                            <th>TYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>NIC</th>
                            <th>TYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->nic }}</td>
                                <td>
                                    @if ($user->type == 0)
                                        Staff
                                    @elseif($user->type == 1)
                                        Supervisor
                                    @elseif($user->type == 2)
                                        Admin
                                    @else
                                        Unknown Type
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('updateuser', ['id' => $user->id]) }}"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('viewfull', ['id' => $user->id]) }}"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('deleteuser', ['id' => $user->id]) }}"
                                        onclick="confirm('Do you sure want to delete?')"><i class="fas fa-trash"
                                            style="color: red;"></i>
                                    </a>
                                    {{-- {{ route('update.user', ['id' => $user->id]) }} --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" style="margin-left: 50px;margin-right: 50px; margin-top: 10px;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>Add New User</span>
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/users') }}" onsubmit="return validateForm()">
                            @csrf
                            <!-- Staff Section Input Fields -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">First Name:</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Last Name:</label>
                                        <input type="text" name="lname" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number1:</label>
                                        <input type="text" name="phone" id="phone" class="form-control" pattern="[0-9]{10}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number2:</label>
                                        <input type="text" name="phone2" id="phone" class="form-control" pattern="[0-9]{10}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" name="address" class="form-control" required>
                                    </div>



                                    <div class="form-group">
                                        <label for="type">User Type:</label>
                                        <select name="type" class="form-control" required>
                                            <option value=0>User</option>
                                            <option value=1>Supervisor</option>
                                            <option value=2>Admin</option>
                                        </select>
                                    </div>


                                </div>
                                <!-- Relative Section Input Fields -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nic">NIC:</label>
                                        <input type="text" name="nic" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="relative-name">Relative Name:</label>
                                        <input type="text" name="relative" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="relationship">Relationship:</label>
                                        <select name="relationship" class="form-control" required>
                                            <option value="parent">Parent</option>
                                            <option value="children">Children</option>
                                            <option value="husband">Husband</option>
                                            <option value="wife">Wife</option>
                                            <option value="family">Family</option>
                                            <option value="friend">Friend</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Relative Address:</label>
                                        <input type="text" name="address2" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone1">Phone 1:</label>
                                        <input type="text" name="rphone1" class="form-control" pattern="[0-9]{10}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone2">Phone 2:</label>
                                        <input type="text" name="rphone2" class="form-control" pattern="[0-9]{10}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Your page content goes here -->



    </main>


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


@endsection
