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

@extends(session('user.type') == 0 ? 'user' : (session('user.type') == 1 ? 'supervisor' : 'admin'))


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
                            <th>Task Name</th>
                            <th>Ticket Number</th>
                            {{-- <th>Instruction</th> --}}
                            <th>Assignee</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Task Name</th>
                            <th>Ticket Number</th>
                            {{-- <th>Instruction</th> --}}
                            <th>Assignee</th>
                            <th>Status</th>
                            <th>ACTION</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ticket as $tick)
                            @if (session('user.type') == 0 && session('user.id') != $tick->user)
                                @continue
                            @endif
                            @if ($tick->status == 'Submitted' )
                                @continue
                            @endif
                            <tr>
                                <td>{{ $tick->id }}</td>
                                <td>{{ $tick->task_name }}</td>
                                <td>{{ $tick->number }}</td>
                                {{-- <td>{{ $tick->description }}</td> --}}
                                <td>{{ $tick->name }} {{ $tick->lname }}</td>
                                <td>{{ $tick->status }}</td>
                                <td>
                                    @if (session('user.type') == 1 || session('user.type') == 2)
                                        <a href="{{ route('editticket', ['id' => $tick->id]) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="{{ route('viewTicket', ['id' => $tick->id]) }}"><i
                                                class="fas fa-eye"></i></a>
                                        {{-- <a href="#"><i class="fas fa-check-double"></i></a> --}}
                                    @endif
                                    @if (session('user.type') == 0 && session('user.id') == $tick->user)
                                        <a href="{{ route('viewTicket', ['id' => $tick->id]) }}"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="{{ route('startticket', ['id' => $tick->id]) }}"
                                            onclick="return confirm('Are you sure you want to start this ticket?');"><i
                                                class="fas fa-play-circle"></i></a>
                                        <a href="{{ route('submit', ['id' => $tick->id]) }}"><i
                                                class="fas fa-check-circle"></i></a>
                                    @endif
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
