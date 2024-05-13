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
        <div style="margin-left: 20px; margin-top:20px;">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>Submit Today Work</span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12" id="work-section">
                                @if ($description)
                                    <p><strong>Today's Work:</strong></p>
                                    <p id="work-description">{!! nl2br(e($description)) !!}</p>
                                    <a href="#" id="edit-work" class="btn btn-primary">Edit Work</a>
                                @else
                                    <form method="post" action="{{route('submitwork')}}" enctype="multipart/form-data"
                                        class="clearfix">
                                        @csrf

                                        <div class="form-group">
                                            <label for="description">List Your Work</label>
                                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description"
                                                required></textarea>
                                        </div>

                                        <input type="hidden" name="staff" value="{{ session('user.id') }}">
                                        {{-- <input type="hidden" name="ticket_id" value="{{ $ticket->id }}"> --}}
                                        <button type="submit" name="add_task" class="btn btn-primary">Submit</button>
                                    </form>
                                @endif
                            </div>
                            <div class="col-md-12" id="edit-section" style="display: none;">
                                <form method="post" action="{{route('updatework')}}" enctype="multipart/form-data"
                                    class="clearfix">
                                    @csrf

                                    <div class="form-group">
                                        <label for="edited-description">Edit Work</label>
                                        <textarea class="form-control" name="edited-description" id="edited-description" rows="4" placeholder="Edit description"
                                            required></textarea>
                                    </div>

                                    <input type="hidden" name="staff" value="{{ session('user.id') }}">
                                    {{-- <input type="hidden" name="ticket_id" value="{{ $ticket->id }}"> --}}
                                    <button type="submit" name="update_task" class="btn btn-primary">Update</button>
                                    <button type="button" id="cancel-edit" class="btn btn-secondary">Cancel</button>
                                </form>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var editWorkBtn = document.getElementById('edit-work');
                                var cancelEditBtn = document.getElementById('cancel-edit');
                                var workSection = document.getElementById('work-section');
                                var editSection = document.getElementById('edit-section');
                                var editedDescriptionTextarea = document.getElementById('edited-description');

                                // Show edit section and hide work section when edit button is clicked
                                editWorkBtn.addEventListener('click', function () {
                                    workSection.style.display = 'none';
                                    editSection.style.display = 'block';

                                    // Set the value of the textarea to the previous description
                                    var workDescription = document.getElementById('work-description').innerText;
                                    editedDescriptionTextarea.value = workDescription;
                                });

                                // Show work section and hide edit section when cancel button is clicked
                                cancelEditBtn.addEventListener('click', function () {
                                    workSection.style.display = 'block';
                                    editSection.style.display = 'none';
                                });
                            });
                        </script>

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
