<!DOCTYPE html>
<html>
<head>
    <title>~ Strings n' Things~</title>
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
                    <li class="nav-item active"><a class="nav-link" href="/shopping_cart">Shopping cart</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-lg-12 p-5">
        <div class="title pt-3 col-lg-12 mx-auto text-center">
            <h3 class="mt-3">Checkout</h3>
        </div>
    </div>

    <div class="container col-lg-12 text-center pt-4">
        <div class="btn text-monospace text-center text-dark">
        </div>
    </div>

    <hr class="style15">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif(session()->get('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
    @endif

    <form method="POST" class="d-inline-block pt-5 col-lg-6 col-md-6" enctype="multipart/form-data">
        {{csrf_field()}}

        <h4 class="p-3">Billing Details</h4>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">E-mail address:</label><br/>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Full name:</label><br/>
            <input type="text" class="form-control" name="full_name" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">City:</label><br/>
            <input type="text" class="form-control" name="city" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Province:</label><br/>
            <input type="text" class="form-control" name="province" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Postal code:</label><br/>
            <input type="text" class="form-control" name="postal_code" required>
        </div>

        <div class="form-group col-5 float-left pb-5 pl-3 pr-3 pt-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Phone:</label><br/>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">+389</span>
                </div>
                <input type="text" class="form-control" name="phone" required>
            </div>
        </div>

        <h4 class="p-3">Payment Details</h4>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Name on the card:</label><br/>
            <input type="text" class="form-control" name="name_on_card" required>
        </div>

        <div class="form-group col-10 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Credit or debit card:</label><br/>
            <input type="text" class="form-control" name="card_number" placeholder="Card number" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">Expiration date:</label><br/>
            <input type="month" class="form-control" name="expiration_date" required>
        </div>

        <div class="form-group col-5 float-left p-3">
            <label class="text-monospace text-muted" style="font-size: 20px">CVC:</label><br/>
            <input type="text" class="form-control" name="cvc" required>
        </div>

        <div class="text-center float-right p-4">
            <button type="submit" class="btn btn-text text-monospace text-center text-dark">Submit</button>
        </div>
    </form>

    @if(sizeof($data) > 0)
    <div class="table-responsive d-inline-block float-right col-lg-6 col-md-6" style="padding-top: 120px">
        <table class="mx-auto text-monospace m-4 col-9 table">
            <thead>
            <tr>
                <th class="h5">Product</th>
                <th class="h5 text-center">Quantity</th>
                <th class="h5">Price</th>
            </tr>
            </thead>

            <tbody class="text-monospace text-muted">
            @foreach($data as $ins)
                <tr>
                    <td>
                        <p><strong>{{$ins->name}}</strong></p>
                    </td>
                    <td class="text-center">{{$ins->qty}}</td>
                    <td>${{$ins->price}}</td>
                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>
                <td class="mt-4 pt-5" colspan="1">&nbsp;</td>
                <td class="h5 pt-5 float-right text-monospace font-weight-bold text-uppercase">Total:</td>
                <td class="h5 mt-4 pt-5 text-monospace font-weight-bold">${{$total}}</td>
            </tr>
            </tfoot>
        </table>
    </div>
    @endif
</div>


</body>
</html>
