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
        <div style="margin-left: 50px; margin-right: 50px; margin-top: 10px; ">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-th"></span>
                                Update Contact Details
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <form method="post" action="{{route('updatecontact')}}" enctype="multipart/form-data" class="clearfix">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="department">Office Name</label>
                                                <input type="text" class="form-control" name="office" id="department"
                                                     value="{{$editContact->office_name}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="section">Address</label>
                                                <input type="text" class="form-control" name="address" id="section"
                                         value="{{$editContact->address}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="department">Department</label>
                                                <input type="text" class="form-control" name="department" id="department"
                                                     value="{{$editContact->department}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="section">Section</label>
                                                <input type="text" class="form-control" name="section" id="section"
                                         value="{{$editContact->section}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="office-mail">Office Mail</label>
                                                <input type="email" class="form-control" name="omail" id="office-mail"
                                                     value="{{$editContact->office_mail}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="office-phone">Office Phone</label>
                                                <input type="tel" class="form-control" name="ophone" id="office-phone"
                                                     value="{{$editContact->office_phone}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="contact-person">Contact Person Name</label>
                                                <input type="text" class="form-control" name="person" id="contact-person"
                                                     value="{{$editContact->incharge}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact-email">Contact Email</label>
                                                <input type="email" class="form-control" name="email" id="contact-email"
                                                    value="{{$editContact->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="contact-phone">Contact Phone</label>
                                                <input type="tel" class="form-control" name="phone1" id="contact-phone"
                                                     value="{{$editContact->phone1}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact-phone2">Contact phone2</label>
                                                <input type="tel" class="form-control" name="phone2" id="contact-phone2"
                                                     value="{{$editContact->phone2}}">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" class="form-control" value="{{$editContact->id}}" required>
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
