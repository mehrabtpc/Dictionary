<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" />
    <link href="{{ asset('assets/css/iranyekanx.css') }}" rel="stylesheet">

    <!-- Favicon-->
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

    <!--toaster-->
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">

    <!-- Notifications css -->
    <link href="{{ asset('assets/plugins/notify/css/jquery.growl.css') }}" rel="stylesheet">


    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>

    <style>
        /* login page needed to be ltr*/
        #ltr{
            direction: ltr !important;
            text-align: left !important;
        }
        *{
            font-family: IRANYekanX;
        }
    </style>
</head>
<body>
<!--Main Navigation-->
<header>
    <style>
        #intro {
            background-image: url({{asset('assets/images/008.jpg')}});
            height: 100vh;
        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
            #intro {
                margin-top: -58.59px;
            }
        }
        .navbar .nav-link {
            color: #fff !important;
        }
    </style>

<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand nav-link" href="http://englishp.ir/">
                <strong>English</strong>
            </a>
        </div>
    </nav>
    <!-- Navbar -->
    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-md-8">
                        <form class="bg-white rounded shadow-5-strong p-5" action="{{route('appLogin')}}"
                              id="loginForm" method="POST">
                            @csrf
                            <h5>Login</h5>
                        <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Password input -->

                            <div class="row">
                                <div class="col-10">
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-2" style="margin: 0;padding: 0">
                                    <div class="input-group-append inline">
                                        <span class="input-group-text btn" style="background-color: #ffffff" onclick="showPassword()">
                                          <i id="eye" class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit button -->
                            <button id="submit" type="submit" class="btn btn-primary btn-block">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
</header>
<!-- MDB -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

<!-- Notifications js -->
<script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>

<!-- Custom scripts -->
<script type="text/javascript" src="js/script.js"></script>

<script>
    //eye button
    function showPassword() {
        var x = document.getElementById("password");
        var y = document.getElementById("eye");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("eye").className = "fa fa-eye-slash";
        } else {
            x.type = "password";
            document.getElementById("eye").className = "fa fa-eye";
        }
    }

    //waiting process when login
    $('form').submit(function (event) {
        if ($(this).hasClass('submitted')) {
            event.preventDefault();
        }
        else {
            $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
            $(this).addClass('submitted');
        }
    });

    //disable login button when login
    $('#loginForm').submit(function(){
        $(this).find('#submit').prop('disabled', true);
    });
</script>

</body>
</html>
