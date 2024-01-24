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


    <div class="container mt-5">

        <h1 class="mb-4">Update User</h1>

        <form method="post" action="{{route('updatestaff')}}" class="col-md-8 offset-md-2" onsubmit="return validateForm()">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" class="form-control" required value="{{ $users->name }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" required value="{{ $users->email }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Phone Number (Sri Lanka):</label>
                    <input type="tel" name="phone" id="phone" class="form-control" pattern="[0-9]{10}" required value="{{ $users->phone }}">
                    {{-- <small id="phoneHelp" class="form-text text-muted">Please enter a valid 10-digit phone number.</small> --}}
                </div>

                <div class="form-group col-md-6">
                    <label for="nic">NIC (Old/New):</label>
                    <input type="text" name="nic" class="form-control" required value="{{ $users->nic}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="type">User Type:</label>
                    <select name="type" class="form-control" required>
                        <option value=0>User</option>
                        <option value=1>Supervisor</option>
                        <option value=2>Admin</option>
                    </select>
                </div>


            </div>
            <input type="hidden" name="id" value="{{$users->id}}">

            <button type="submit" class="btn btn-info">Update User</button>
        </form>
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
