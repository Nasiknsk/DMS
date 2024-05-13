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
                Daily Works
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Works</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Works</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($worksDetails as $tick)
                            <tr>
                                <td>
                                    <div class="report-box">
                                        <p><b>ID:</b> {{ $tick->id }}</p>
                                        <p><b>Name:</b> {{ $tick->name }} {{ $tick->lname }}</p>
                                        {{-- <div>Last Name: {{ $tick->lname }}</div> --}}
                                        <p><b>Date:</b> {{ $tick->created_at }}</p>
                                        <p><b>Works:</b></p>
                                        {{-- <p><strong>Today's Work:</strong></p> --}}
                                        <p id="work-description">{!! nl2br(e($tick->description)) !!}</p>
                                    </div>
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
