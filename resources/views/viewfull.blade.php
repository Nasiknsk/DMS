@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@extends('admin')

@section('main')
<main role="main">
    <!-- Your page content goes here -->
    <div class="row" style="margin-left: 50px;margin-right: 150px; margin-top: 10px; border:1px solid black">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span><h1>User Information</h1></span>
                    </strong>
                </div>
                <div class="panel-body">

                    <p><strong>First Name:</strong> {{$users->name}}</p>
                    <p><strong>Last Name:</strong> {{$users->lname}}</p>
                    <p><strong>Email:</strong> {{$users->email}}</p>
                    <p><strong>Phone Number 1:</strong> {{$users->phone}}</p>
                    <p><strong>Phone Number 2:</strong> {{$users->phone2}}</p>
                    <p><strong>Address:</strong> {{$users->address1}}</p>
                    <p><strong>User Type:</strong>
                        @if ($users->type == 0)
                            User
                        @elseif ($users->type == 1)
                            Supervisor
                        @elseif ($users->type == 2)
                            Admin
                        @endif
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span><h1>Relative Information</h1></span>
                    </strong>
                </div>
                <div class="panel-body">

                    <p><strong>NIC:</strong> {{$users->nic}}</p>
                    <p><strong>Relative Name:</strong> {{$users->r_name}}</p>
                    <p><strong>Relationship:</strong> {{$users->r_ship}}</p>
                    <p><strong>Relative Address:</strong> {{$users->address2}}</p>
                    <p><strong>Relative Phone 1:</strong> {{$users->r_phone1}}</p>
                    <p><strong>Relative Phone 2:</strong> {{$users->r_phone2}}</p>
                </div>
            </div>
        </div>
    </div>
</main>




    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function validateForm() {
            var phoneInput = document.getElementById('phone');
            var phoneRegex = /^[0-9]{10}$/;

            var emailInput = document.getElementsByName('email')[0];
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            var nicInput = document.getElementsByName('nic')[0];
            var nicRegex = /^(?:\d{9}v?|\d{12})$/i;

            if (!phoneRegex.test(phoneInput.value)) {
                alert('Please enter a valid 10-digit phone number.');
                return false;
            }

            if (!emailRegex.test(emailInput.value)) {
                alert('Please enter a valid email address.');
                return false;
            }

            if (!nicRegex.test(nicInput.value)) {
                alert('Please enter a valid NIC number.');
                return false;
            }

            // You can add more validations as needed

            return true;
        }
    </script>


@endsection
