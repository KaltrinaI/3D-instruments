<!DOCTYPE html>
<html>
<head>
    <title>~ Strings n' Things~</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/instruments.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block justify-content-center text-center">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item mr-5"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item active mr-5"><a class="nav-link text-light" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="title pt-2 col-lg-2 mx-auto text-center">
        <h3>Catalogue</h3>
    </div>

    <div class="container">
        <hr class="style15">
        <div class="text-monospace text-center text-dark">
            <span>Musical instruments are grouped into families based on how they make sounds. In an orchestra, musicians sit together in these family groupings. But not every instrument fits neatly into a group. For example, the piano has strings that vibrate, and hammers that strike. Is it a string instrument or a percussion instrument? Some say it is both!</span>
        </div>
        <hr class="style15">
    </div>



    <div class="container text-center">
        <div class="btn-group">
            @if($family == 1)
            <div class="btn rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 1)}}">
                    <span>Brass</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 2)}}">
                    <span>Percussion</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 3)}}">
                    <span>String</span>
                </a>
            </div>
            <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 4)}}">
                    <span>Woodwind</span>
                </a>
            </div>
            @elseif($family == 2)

                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 1)}}">
                    <span>Brass</span>
                    </a>
                </div>
                <div class="btn text-dark border-active rounded-pill mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 2)}}">
                    <span>Percussion</span>
                    </a>
                </div>
                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 3)}}">
                    <span>String</span>
                    </a>
                </div>
                <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                    <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 4)}}">
                    <span>Woodwind</span>
                    </a>
                </div>

                @elseif( $family == 3)
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 1)}}">
                        <span>Brass</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 2)}}">
                        <span>Percussion</span>
                        </a>
                    </div>
                    <div class="btn text-dark rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 3)}}">
                        <span>String</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 4)}}">
                        <span>Woodwind</span>
                        </a>
                    </div>
                @else
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 1)}}">
                        <span>Brass</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 2)}}">
                        <span>Percussion</span>
                        </a>
                    </div>
                    <div class="btn rounded-pill border border-dark mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 3)}}">
                        <span>String</span>
                        </a>
                    </div>
                    <div class="btn text-dark rounded-pill border-active mt-2 mb-2 mr-4 ml-4">
                        <a class="btn-link text-dark" style="text-decoration: none" href="{{action('App\Http\Controllers\InstrumentController@instruments', 4)}}">
                        <span>Woodwind</span>
                        </a>
                    </div>
                @endif
        </div>
    </div>


    @if(sizeof($instruments) == 0)
        <div class="typewriter pt-5 col-lg-10 mx-auto text-muted text-center">
            <h5>There are currently no instruments in this instrument family.</h5>
        </div>
    @else
    @foreach($instruments as $ins)
    <div class="row d-inline-block col-xl-4 col-lg-4">
        <div class="card-group mr-3 ml-3 mt-3 col-xl-12 col-lg-12 justify-content-center">
        <div class="row mx-auto col-lg-12 w-100">

            <div class="container col-xl-12 col-lg-12 col-md-8 col-sm-12 mx-auto mt-5 mr-5 ml-5">
                <div class="w-75 h-75 border border-dark" >
                    <div class="card-img mx-auto p-3">
                        <img class="img-thumbnail embed-responsive w-100 h-100" src="{{URL("$ins->preview")}}" width="350" height="200"/>
                    </div>
                    <div class="card-title text-monospace text-center text-dark"><h5></h5></div>
                </div>
            </div>

         </div>
        </div>

        <div class="card-group mr-3 ml-3 mb-3 col-xl-12 col-lg-12 justify-content-center">
        <div class="row mx-auto col-lg-12 w-100">

            <div class="container col-xl-12 col-lg-12 col-md-8 col-sm-12 mx-auto">
                <div class="w-75 h-75 text-center" >
                    <div class="card-title text-monospace text-center text-dark"><span style="font-size: 15px">{{$ins['name']}}</span></div>
                    <div class="card-body text-monospace text-center text-dark"><span style="font-size: 15px">${{$ins['price']}}</span></div>
                    <div class="btn text-monospace text-center text-dark">
                        <a class="btn-text" style="text-decoration: none" href="/catalogue/{{$family}}/instruments/{{$ins['id']}}"><span>See more</span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    @endforeach
    @endif

    <hr class="style15">

    {{ $instruments->links("pagination::customPagination") }}

</div>



</body>
</html>
