<!doctype html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Dictionary</title>
     <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon"/>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> </head>
 <body>
     <!--  Page-header opened -->
     <div class="app-content icon-content">
         <style>
             .text-bold{
                 font-weight: bold;
             }
             p{
                 font-size: 16px;
             }
             .p__title{
                 margin: 0 0 10px 0 ;
             }
             .rtl{
                 direction: rtl;
                 text-align: right;
             }
             .ltr{
                 direction: ltr;
                 text-align: left;
             }
             .form{
                 margin-bottom: 20px;
             }
             body{
                 background-color: #D1D5DB;
             }
         </style>
         <!--  Page-header closed -->
         <div class="row" style="margin-top: 50px"></div>
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-9">
                     <div class="page-header">
                         <ol class="breadcrumb" style="background-color: white">
                             <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('dictionaries.index') }}">Dictionaries</a></li>
                             <li class="breadcrumb-item active" aria-current="page">word detail - {{ $dictionary->word }}</li>
                         </ol>
                     </div>
                     <div class="form">
                         <i class="fa fa-search"></i>
                         <form method="get" id='basicSearch' action="{{route('asdf.index')}}">
                             <input type="text" name="word" class="form-control form-input" placeholder="Search anything...">
                         </form>
                     </div>
                     <div class="app-content icon-content">
                         <!--  Page-header closed -->
                         <div class="card">
                             <div class="card-header" style="background-color: #1B5F9E">
                                 <h5 class="card-title text-bold">Word Detail - {{ $dictionary->word }}</h5>
                             </div>
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <p class="p__title"><span class="text-bold">word:</span><span>{{$dictionary->word}}</span></p>
                                         <p class="p__title"><span class="text-bold">phonetic:</span><span>{{$dictionary->phonetic}}</span></p>
                                         <p class="p__title"><span class="text-bold">type:</span><span>{{$dictionary->type}}</span></p>
                                     </div>
                                     <div class="col-md-6">
                                         <p class="p__title"><span class="text-bold">level:</span><span>{{$dictionary->level}}</span></p>
                                         <p class="p__title"><span class="text-bold">status:</span><span>{{$dictionary->status}}</span></p>
                                     </div>
                                     <div class="col-md-12">
                                         <audio controls>
                                            <source src="{{ $dictionary->audio }}" type="audio/ogg">
                                         </audio>
                                     </div>
                                     <div class="col-md-12">
                                         <span class="text-bold">translate:</span>
                                         @foreach($translates as $translate)
                                             <span>{{ $translate }}, </span>
                                         @endforeach
                                     </div>

                                     <div class="col-md-12">
                                         <p><span class="text-bold">definition:</span> {{ $dictionary->definition }}</p>
                                     </div>

                                     <hr>
                                     <br><br>
                                     <div class="col-md-12">
                                         <p><span class="text-bold">short definition:</span> {{ $dictionary->short_definition }}</p>
                                     </div>
                                     <hr>
                                     <div class="col-md-12">
                                         <p><span class="text-bold">example:</span> {{ $dictionary->example }}</p>
                                     </div>
                                     <hr>
                                 </div>
                             </div>
                         </div>
                         <br>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </body>
 </html>
