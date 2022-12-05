
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>{{$title}}</title>
</head>
<body>
    <div>
        <img src="img/index.jpg" alt="" width="100%">
        <h1>JOGJA BERWISATA</h1>
        <hr>
        <h3>TAGLINE</h3>
        <p>{{$user}}</p>
        <form action="/logout" method="post">
            @csrf
            <button type="submit" style="border: 0; background-color: #1A374D">
                <i class="fa fa-sign-out"></i>
                <a style="font-weight:600; font-size:13px; color:#b1d0e0">Logout</a>
            </button>
        </form>
    </div>
    <div>
        <div>
            <a href="/destinasi"> <img src="img/index.jpg" alt="" width="25%"></a>
        </div>
        <div>
            <a href="/transportasi"> <img src="img/index.jpg" alt="" width="25%"></a>
        </div>
        <div>
            <a href="/event"> <img src="img/index.jpg" alt="" width="25%"></a>
        </div>
        <div>
            <a href="/kuliner"> <img src="img/index.jpg" alt="" width="25%"></a>
        </div>
        <div>
            <a href="/infowisata"> <img src="img/index.jpg" alt="" width="25%"></a>
        </div>
    </div>

    <div class="footer">
        @include('partials.footer')
    </div>
    
    
</body>
</html>