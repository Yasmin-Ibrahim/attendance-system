<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="Student Attendance System using QR Code" name="description">
    <meta content="Students, Attendance, QR Code, PHP, Laravel, Dashboard, System, Scanner, Management Management, Management" name="keywords">

    <title>Attendance</title>

    <link rel="stylesheet" href="{{asset('css/fontawesome-free-7.0.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <header>
        <div class="head container text-center">
            @auth
            <a href="{{route('scanner')}}"><i class="fa-solid fa-qrcode m-1"></i>Scanner</a>
            @endauth
        </div>
        <div class="auth">
            @guest
                <a href="{{route('login')}}"><i class="fa-solid fa-user"></i></a>
            @endguest

            @auth
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i></button>
                </form>
            @endauth
        </div>
    </header>

@auth
    <aside>
        <div class="content-aside">
            <i class="fa-solid fa-qrcode icon"></i>
            <ul class="sidebar-nav">
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link">
                        <i class="fa-solid fa-user"></i>
                        <span>Admins</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('students.index')}}" class="nav-link">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Students</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('parents.index')}}" class="nav-link">
                        <i class="fa-solid fa-user-group"></i>
                        <span>Parents</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endauth

    <div class="main_body">
        @yield('content')
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
