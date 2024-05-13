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

@extends(session('user.type') == 0 ? 'user' : 'admin')

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
                            <th>Last Number</th>
                            {{-- <th>Instruction</th> --}}
                            <th>Type</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Number</th>
                            {{-- <th>Instruction</th> --}}
                            <th>Type</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($staffDetails as $tick)
                            <tr>
                                <td>{{ $tick->id }}</td>
                                <td>{{ $tick->name }}</td>
                                <td>{{ $tick->lname }}</td>
                                {{-- <td>{{ $tick->description }}</td> --}}
                                {{-- <td>{{ $staff->name }}</td> --}}
                                <td>
                                    @if ($tick->type === 0)
                                        Designer
                                    @elseif ($tick->type === 1)
                                        Agriculture Instructor
                                    @elseif ($tick->type === 2)
                                        Deputy Director
                                    @else
                                        Unknown Type
                                    @endif
                                </td>
                                <td>
                                    @if ($tick->status === 1)
                                        Active
                                    @elseif ($tick->status === 0)
                                        Inactive
                                    @else
                                        Unknown Status
                                    @endif
                                </td>
                                <td>

                                    <a href="{{ route('viewworks', ['id' => $tick->id]) }}"><i
                                            class="fas fa-eye"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
