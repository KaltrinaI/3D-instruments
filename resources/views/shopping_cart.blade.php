<!DOCTYPE html>
<html>
<head>
    <title>~ Strings N' Things ~</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/instruments.css') }}" rel="stylesheet">

    <script src="{{ url('js/dropzone.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">


</head>
<body class="bg-light col-lg-12 h-100">

<div class="container d-block mx-auto align-content-center">
    <nav class="navbar navbar-expand-lg navbar-collapse bg-dark navbar-dark rounded-bottom font-weight-bold mb-3">
        <div class="container">
            <div class="collapse navbar-collapse center-block" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item mr-5"><a class="nav-link" href="/home">Home</a></li>
                    <li class="nav-item mr-5"><a class="nav-link" href="/catalogue">Catalogue</a></li>
                    <li class="nav-item active"><a class="nav-link text-light" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">Shopping cart</h3>
        </div>
    </div>

    <hr class="style15">

    @if (session('success'))
        <div class="alert alert-success" style="margin: 15px;">
            <strong> {{ session('success') }} </strong>
        </div>
        @elseif(session('warning'))
        <div class="alert alert-warning" style="margin: 15px;">
            <strong> {{ session('warning') }} </strong>
        </div>
    @endif

    @if(sizeof($data) > 0)
        <div class="table-responsive">
        <table class="mx-auto text-monospace m-4 col-9 table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th></th>
                <th class="text-center">Quantity</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody class="text-monospace text-dark">
        @foreach($data as $ins)
            <tr>
                <td>
                    <p><strong>{{$ins->name}}</strong></p>
                </td>
                <td>${{$ins->price}}</td>
                <td class="float-right">
                    <div class="btn text-monospace text-center text-dark">
                        <a class="btn-text" style="text-decoration: none" href="{{action('App\Http\Controllers\CartController@decrease', ['id' => $ins->id])}}"><span>-</span></a>
                    </div>
                </td>
                <td class="text-center">{{$ins->qty}}</td>
                <td class="float-left">
                    <div class="btn text-monospace text-center text-dark">
                        <a class="btn-text" style="text-decoration: none" href="{{action('App\Http\Controllers\CartController@increase', ['id' => $ins->id])}}"><span>+</span></a>
                    </div>
                </td>
                <td>
                <td>
                    <div class="btn text-monospace text-center">
                        <a id="remove" class="btn-text" style="text-decoration: none" href="{{action('App\Http\Controllers\CartController@remove', ['id' => $ins->id])}}"><span>Remove</span></a>
                    </div>
                </td>
            </tr>
        @endforeach

            </tbody>

            <tfoot>
            <tr>
                <td class="mt-4 pt-5" colspan="5">&nbsp;</td>
                <td class="h5 pt-5 float-right text-monospace text-uppercase">Total:</td>
                <td class="h5 mt-4 pt-5 text-monospace">${{$total}}</td>
            </tr>
            <tr class="table-borderless">
                <td class="mt-4 pt-5" colspan="5">&nbsp;</td>
                <td>
                    <div class="btn text-monospace text-center float-right">
                        <a class="btn-text" style="text-decoration: none" href="{{action('App\Http\Controllers\CartController@checkout')}}"><span>Checkout</span></a>
                    </div>
                </td>
                <td>
                    <div class="btn text-monospace text-center">
                        <a class="btn-text" style="text-decoration: none"  href="{{action('App\Http\Controllers\CartController@clear')}}"><span>Clear</span></a>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
        </div>


    @else
        <div class="typewriter pt-5 col-lg-10 mx-auto text-muted text-center">
            <h5>There are currently no instruments in your shopping cart.</h5>
        </div>
    @endif

</div>

</body>
</html>

