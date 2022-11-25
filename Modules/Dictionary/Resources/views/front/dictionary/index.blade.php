<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Dictionary</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
        <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon"/>
        <style>
            ::-webkit-scrollbar {
              width: 8px;
            }
            /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555;
            } body{

            background: #d1d5db;
            }

            .height{

            height: 100vh;
            }

            .form{

            position: relative;
            }

            .form .fa-search{

            position: absolute;
            top:20px;
            left: 20px;
            color: #9ca3af;

            }

            .form span{

            position: absolute;
            right: 17px;
            top: 13px;
            padding: 2px;
            border-left: 1px solid #d1d5db;

            }

            .left-pan{
            padding-left: 7px;
            }

            .left-pan i{

            padding-left: 10px;
            }

            .form-input{

            height: 55px;
            text-indent: 33px;
            border-radius: 10px;
            }

            .form-input:focus{

            box-shadow: none;
            border:none;
            }
            #white-btn:hover {
                 border: none;
                 outline: none;
             }
        </style>
        </head>

        <body class='snippet-body'>
            <div class="container">
                <div class="row height d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <h1 class="h1" style="color: #454545">Dictionary</h1>
                        <br>
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <form method="get" id='basicSearch' action="{{route('asdf.index')}}">
                                <input type="text" name="word" class="form-control form-input" placeholder="Search anything...">
                                <span class="left-pan">
                                    <button type="submit" style="background-color: white;border: white" id="white-btn">Search</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
        </body>
    </html>
