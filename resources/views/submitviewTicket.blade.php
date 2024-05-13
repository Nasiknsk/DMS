@extends(session('user.type') == 0 ? 'user' : 'admin')
@section('main')
    <main role="main">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-file-alt me-1"></i>
                Ticket Report
            </div>
            <div class="card-body">
                @foreach ($ticket as $tick)
                    <div class="ticket-info">
                        <h4>Ticket ID: {{ $tick->id }}</h4>
                        <p><strong>Task Name:</strong> {{ $tick->task_name }}</p>
                        <p><strong>Ticket Number:</strong> {{ $tick->number }}</p>
                        <p><strong>Description:</strong></p>
                        <p>{{ $tick->description }}</p>
                        <p><strong>Submit Note:</strong></p>
                        <p>{{ $tick->submit_note }}</p>
                        <p><strong>Repository Link:</strong></p>
                        <p><a href="{{ $tick->link }}">Click Here</a> </p>
                        {{-- <p><strong>Assignee:</strong> {{ $tick->name }} {{ $tick->lname }}</p> --}}
                        <p><strong>Remark:</strong></p>
                        @if (empty($tick->remark))
                            <p>Still not reviewed</p>
                        @else
                            <p>{{ $tick->remark }}</p>
                        @endif
                        <p><strong>Status:</strong> {{ $tick->status }}</p>
                        {{-- <p><strong>Category:</strong> {{ $tick->cat_name }}</p> --}}
                        {{-- <p><strong>Size:</strong> {{ $tick->size }}</p> --}}
                        {{-- @if ($tick->file_path)
            <p><strong>Attachment:</strong> <a href="{{ $tick->file_path }}" download>Download File</a></p>
        @endif --}}
                        <!-- Add more fields as needed -->
                    </div>
                    @if (session('user.type') == 1 || session('user.type') == 2)
                        <div class="text-end">
                            <!-- Remark button -->
                            <a href="{{ route('remarkticket', ['id' => $tick->id]) }}" class="btn btn-primary">Add Remark</a>
                            <!-- Complete button -->
                            <a href="{{ route('completeticket', ['id' => $tick->id]) }}" class="btn btn-success">Complete Ticket</a>

                            {{-- <a href="#" class="btn btn-danger">Delete Ticket</a> --}}
                        </div>
                    @endif
                    <hr> <!-- Optional: Add a horizontal line between each ticket -->
                @endforeach

            </div>
        </div>
    </main>
@endsection
