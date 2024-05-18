<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Tableau de bord</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">




</head>

<body>



    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="{{ route('dashboard') }}" class="logo">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                </a>
                <a href="{{ route('dashboard') }}" class="logo logo-small">
                    <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
                </a>
            </div>

            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form method="POST" action="{{ route('rechercher') }}">
                    <input type="text" class="form-control" placeholder="Rechercher ici">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">
                <li class="nav-item dropdown language-drop me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/icons/header-icon-01.svg') }}" alt="">
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:;"><i class="flag flag-lr me-2"></i>English</a>
                        <a class="dropdown-item" href="javascript:;"><i class="flag flag-bl me-2"></i>Francais</a>
                    </div>
                </li>
                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list">
                        <img src="assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}"
                                width="31" alt="Soeng Souy">
                            <div class="user-text">
                                @if (Auth::check() && Auth::user()->name)
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                                @else
                                    <h6>Guest</h6>
                                    <p class="text-muted mb-0">Guest</p>
                                @endif
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                @if (Auth::check() && Auth::user()->name)
                                    <h6>{{ Auth::user()->name }}</h6>
                                    <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                                @else
                                    <h6>Guest</h6>
                                    <p class="text-muted mb-0">Guest</p>
                                @endif
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Menu</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="feather-grid"></i> <span> Tableau de bord</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                {{-- <li><a href="{{ route('dashboard') }}">Administation</a></li> --}}
                                {{-- <li><a href="{{ route('teacher-dashboard')}}">Teacher Dashboard</a></li> --}}
                                <li><a href="{{ route('student-dashboard') }}">Student Dashboard</a></li>
                            </ul>
                        </li>
                        {{-- <li class="submenu">
                            <a href="#"><i class="fas fa-user"></i> <span> Users</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('users.index') }}">Liste des users</a></li>
                                <li><a href="{{ route('users.create') }}">Ajouter un user</a></li>
                            </ul>
                        </li> --}}
                        
                        <li class="submenu">
                            <a href="#"><i class="fas fa-graduation-cap"></i> <span> Étudiants</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('students.index') }}">Liste des étudiants</a></li>
                                <li><a href="{{ route('students.create') }}">Ajouter un étudiant</a></li>

                            </ul>
                        </li>
                        {{-- <li class="submenu">
                            <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Enseignants</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('teachers.index') }}">Liste des enseignants</a></li>
                                <li><a href="{{ route('teachers.create') }}">Ajouter un enseignant</a></li>
                            </ul>
                        </li> --}}
                        <li class="submenu">
                            <a href="#"><i class="fas fa-building"></i> <span> Departments</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('departments.index') }}">Liste des départements</a></li>
                                {{-- no autoriser Ajouter une departement par student --}}
                                {{-- <li><a href="{{ route('departments.create') }}">Ajouter un département</a></li> --}}
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-book-reader"></i> <span>Matières</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('subjects.index') }}">Liste des matières</a></li>
                                {{-- no autoriser Ajouter une matière par student --}}
                                {{-- <li><a href="{{ route('subjects.create') }}">Ajouter une matière</a></li> --}}
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Gestion</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-file-invoice-dollar"></i> <span> Comptes</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('fees-collections.index') }}">Collecte des frais</a></li>
                                <li><a href="{{ route('fees-collections.create') }}">Ajouter des frais</a></li>
                            </ul>

                        </li>
                        <li>
                            <a href="{{ route('holiday.index') }}"><i class="fas fa-holly-berry"></i> <span>
                                    Vacances</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-clipboard-list"></i> <span>Examens</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('exam.index') }}"></i> <span>Liste des examens</span></a></li>
                                {{-- no autoriser Ajouter une examan par student --}}
                                {{-- <li><a href="{{ route('exam.create') }}"></i> <span>ajouter examens</span></a></li> --}}
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="{{ route('events.index') }}">
                                <i class="fas fa-calendar-day"></i>
                                <span>Événements</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>

        {{-- @section('content') --}}
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Student Dashboard</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Student</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Students</h6>
                                        <h3>{{ $students }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="{{ asset('assets/img/icons/dash-icon-01.svg') }}"
                                            alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Department</h6>
                                        <h3>{{ $departments }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="{{ asset('assets/img/icons/dash-icon-03.svg') }}"
                                            alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <div class="card bg-comman w-100">
                            <div class="card-body">
                                <div class="db-widgets d-flex justify-content-between align-items-center">
                                    <div class="db-info">
                                        <h6>Teacher</h6>
                                        <h3>{{ $teachers }}</h3>
                                    </div>
                                    <div class="db-icon">
                                        <img src="{{ asset('assets/img/icons/teacher-icon-02.svg') }}"
                                            alt="Dashboard Icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">

                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title">Overview</h5>
                                    </div>
                                    <div class="col-6">
                                        <ul class="chart-list-out">
                                            <li><span class="circle-blue"></span>Teacher</li>
                                            <li><span class="circle-green"></span>Student</li>
                                            <li class="star-menus"><a href="javascript:;"><i
                                                        class="fas fa-ellipsis-v"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="apexcharts-area"></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6">

                        <div class="card card-chart">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="card-title">Number of Students</h5>
                                    </div>
                                    <div class="col-6">
                                        <ul class="chart-list-out">
                                            <li><span class="circle-blue"></span>Girls</li>
                                            <li><span class="circle-green"></span>Boys</li>
                                            <li class="star-menus"><a href="javascript:;"><i
                                                        class="fas fa-ellipsis-v"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/js/feather.min.js') }}"></script>
            <script src="{{ asset('assets/js/popper.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
            <script src="{{ asset('assets/js/script.js') }}"></script>
            <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>


            @yield('scripts')



</body>

</html>
