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
    @if(session('user'))
        <div class="small">Logged in as: {{ session('user.name') }}</div>
    @endif
@endsection

@section('main')
    <main role="main">
        <!-- Your page content goes here -->
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>NIC</th>
                            <th>TYPE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
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
                                <a href="{{ route('updateuser', ['id' => $user->id]) }}" ><i class="fas fa-edit"></i></a>
                                <a href="{{ route('deleteuser', ['id' => $user->id]) }}"  onclick="confirm('Do you sure want to delete?')"><i class="fas fa-trash" style="color: red;"></i>
                                </a>
                                {{-- {{ route('update.user', ['id' => $user->id]) }} --}}
                            </td>
                        </tr>
                    @endforeach

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
