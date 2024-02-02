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
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All users
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>

                        <th>Office Name</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>Address</th>
                        <th>OfficeMail</th>
                        <th>Office Number</th>
                        <th>Person</th>
                        <th>Number2</th>
                        <th>Number1</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>

                        <th>Office Name</th>
                        <th>Department</th>
                        <th>Section</th>
                        <th>Address</th>
                        <th>OfficeMail</th>
                        <th>Office Number</th>
                        <th>Person</th>
                        <th>Number2</th>
                        <th>Number1</th>
                        <th>ACTION</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($contact as $con)
                        <tr>

                            <td>{{ $con->office_name }}</td>
                            <td>{{ $con->department }}</td>
                            <td>{{ $con->section }}</td>
                            <td>{{ $con->address }}</td>
                            <td>{{ $con->office_mail }}</td>
                            <td>{{ $con->office_phone }}</td>
                            <td>{{ $con->incharge }}</td>
                            <td>{{ $con->phone1 }}</td>
                            <td>{{ $con->phone2 }}</td>



                            <td>
                                <a href="#"><i class="fas fa-edit"></i></a>
                                {{-- <a href="{{ route('viewfull', ['id' => $user->id]) }}"><i class="fas fa-eye"></i></a> --}}
                                <a href="#"
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
    <!-- Your page content goes here -->
    <div style="margin-left: 50px; margin-right: 50px; margin-top: 10px;">
        <div class="row">
            <div class="col-md-12"> <!-- Remove col-md-8 class -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <span class="glyphicon glyphicon-th"></span>
                            Add New Client
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form method="post" action="{{route('addcontact')}}" enctype="multipart/form-data" class="clearfix">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="department">Office Name</label>
                                            <input type="text" class="form-control" name="office" id="department"
                                                placeholder="Office Name" value="{{ old('department') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="section">Address</label>
                                            <input type="text" class="form-control" name="address" id="section"
                                                placeholder="Address" value="{{ old('section') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="department">Department</label>
                                            <input type="text" class="form-control" name="department" id="department"
                                                placeholder="Department" value="{{ old('department') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="section">Section</label>
                                            <input type="text" class="form-control" name="section" id="section"
                                                placeholder="Section" value="{{ old('section') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="office-mail">Office Mail</label>
                                            <input type="email" class="form-control" name="omail" id="office-mail"
                                                placeholder="Office Mail" value="{{ old('office-mail') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="office-phone">Office Phone</label>
                                            <input type="tel" class="form-control" name="ophone" id="office-phone"
                                                placeholder="Office Phone" value="{{ old('office-phone') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact-person">Contact Person Name</label>
                                            <input type="text" class="form-control" name="person" id="contact-person"
                                                placeholder="Contact Person Name" value="{{ old('contact-person') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contact-email">Contact Email</label>
                                            <input type="email" class="form-control" name="email" id="contact-email"
                                                placeholder="Contact Email" value="{{ old('contact-email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="contact-phone">Contact Phone</label>
                                            <input type="tel" class="form-control" name="phone1" id="contact-phone"
                                                placeholder="Contact Phone" value="{{ old('contact-phone') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contact-phone2">Contact phone2</label>
                                            <input type="tel" class="form-control" name="phone2" id="contact-phone2"
                                                placeholder="Contact phone2" value="{{ old('contact-phone2') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="add_client" class="btn btn-primary">Add Client</button>
                                <!-- Form fields go here -->
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
