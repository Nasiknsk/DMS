@if(session('message'))
    <div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="z-index: 9999; right: 15px; top: 15px;">
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
    <div class="row" style="margin-left:200px; margin-top:100px;">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong>
              <span class="glyphicon glyphicon-th"></span>
              <span>Add New User</span>
           </strong>
          </div>
          <div class="panel-body">
            <div class="col-md-6">

            <form method="post" action="{{ url('/users') }}"  onsubmit="return validateForm()">
            @csrf

    <div >
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
    </div>

    <div >
        <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="tel" name="phone" id="phone" class="form-control" pattern="[0-9]{10}" required>

        </div>

        <div class="form-group">
            <label for="nic">NIC </label>
            <input type="text" name="nic" class="form-control" required>
        </div>
    </div>

    <div >
        <div class="form-group">
            <label for="type">User Type:</label>
            <select name="type" class="form-control" required>
                <option value=0>User</option>
                <option value=1>Supervisor</option>
                <option value=2>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nic">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Add User</button>
            </form>
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
