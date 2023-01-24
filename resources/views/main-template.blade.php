<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PolitiPro</title>

    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset("/public/assets/style.css") }}">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('individual-link')

</head>
<body>
<div class="container">
    <div class="col-md-12 center" style="margin-top: 20px;">
        <img src="{{ asset("public/assets/images/Election-Logo.jpg") }}" class="rounded mx-auto d-block" width="300" height="200">
    </div>
    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    <!-- Navbar -->
    <div>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#"><button type="button" class="btn btn-secondary">হোম</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><button type="button" class="btn btn-secondary">জিজ্ঞাসা</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><button type="button" class="btn btn-secondary">নিবন্ধন</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><button type="button" class="btn btn-secondary">লগ ইন</button></a>
            </li>
        </ul>
    </div>
    @yield('body')
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<!--Chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@yield('individual-js')
</body>
</html>
