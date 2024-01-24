<!-- resources/views/layouts/app.blade.php -->

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @auth
                        @if (Auth::user()->type == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">User Dashboard</a>
                            </li>
                        @elseif (Auth::user()->type == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('supervisor.dashboard') }}">Supervisor Dashboard</a>
                            </li>
                        @elseif (Auth::user()->type == 2)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- ... other body content ... -->
</body>
