<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    @if (session('user.type') == 2)
        <title>DMS Designer</title>
    @elseif(session('user.type') == 1)
        <title>DMS Designer</title>
    @endif

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->

            <a class="navbar-brand ps-3" href="#">DMS-Designer</a>


        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('userdash') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        {{-- <div class="sb-sidenav-menu-heading">Users</div>
                        {{-- @if (auth()->check()) --}}

                        {{-- @endif --}}
                        {{-- Other navigation links --}}
                        <div class="sb-sidenav-menu-heading">Quick Access</div>

                        {{-- <a class="nav-link" href="{{ route('addcat') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-th-list"></i></div>
                            Categories
                        </a>
                        <a class="nav-link" href="{{ route('task') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i>
                            </div>Tasks

                        </a> --}}
                        <a class="nav-link" href="{{ route('ticket') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-ticket"></i></i>
                            </div>Tickets

                        </a>
                        <a class="nav-link" href="{{ route('ticketsubmission') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i>
                            </div>SubmittedTickets

                        </a>
                        <a class="nav-link" href="{{ route('dailyupdates',['id' => session('user.id')])}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Daily Updates
                        </a>
                        <a class="nav-link" href="{{route('viewownwork',['id' => session('user.id')])}}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-person-chalkboard"></i></div>
                            Daily Works
                        </a>
                    </div>
                </div>
                <div class="sub">
                    <div class="sb-sidenav-footer">
                        @yield('sub') <!-- This is where the "Logged in as" message will go -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('main')
            </main>
            <!-- # -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>
