{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="description" content="wheelnav.js test page for javascript way">--}}
{{--    <meta name="author" content="gabor.berkesi@softwaretailoring.net">--}}
{{--    <link rel="shortcut icon" href="wheelnav_favicon.png">--}}

{{--    <title>wheelnav.js - test page</title>--}}


{{--    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
{{--    <!--[if lt IE 9]>--}}
{{--    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
{{--    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
{{--    <![endif]-->--}}

{{--    <link href="{{ asset("/public/assets/wheel2/css/index.css") }}" rel="stylesheet">--}}

{{--    <!--Bootstrap CSS -->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"--}}
{{--          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">--}}

{{--    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/required/raphael.min.js") }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/required/raphael.icons.js") }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/dist/wheelnav.js") }}"></script>--}}
{{--    <script type="text/javascript">--}}


{{--        window.onload = function () {--}}

{{--            var myWheelnav = new wheelnav("divWheelnav");--}}
{{--            myWheelnav.slicePathFunction = slicePath().DonutSlice;--}}
{{--            myWheelnav.colors = new Array("mediumorchid", "royalblue", "darkorange","royalblue");--}}
{{--            myWheelnav.keynavigateEnabled = true;--}}
{{--            myWheelnav.createWheel([icon.github, icon.people, icon.smile,"test"]);--}}
{{--        };--}}

{{--    </script>--}}
{{--</head>--}}
{{--<body>--}}


{{--<div id="divWheelnav" class="wheelNavGitHub"></div>--}}
{{--<!-- Tab panes -->--}}
{{--<div class="tab-content">--}}
{{--    <div class="tab-pane fade in active" id="tabDefault">--}}
{{--        <h2 class="featurette-heading">--}}
{{--            In rotation mode wheelnav acts as a tab navigation.--}}
{{--            <br />--}}
{{--            <span class="text-muted">Click the <span class="link" onclick="tabWheel.navigateWheel(1); $('#tabDefaultNav a[href=\'#tabJS\']').tab('show');">wheel</span>.</span>--}}
{{--        </h2>--}}
{{--    </div>--}}
{{--    <div class="tab-pane fade" id="tabJS">--}}
{{--        <h2 class="featurette-heading">--}}
{{--            Pure JavaScript in separated source files.--}}
{{--        </h2>--}}
{{--    </div>--}}
{{--    <div class="tab-pane fade" id="tabCSS">--}}
{{--        <h2 class="featurette-heading">--}}
{{--            Predefined css classes for easy styling.--}}
{{--        </h2>--}}
{{--    </div>--}}
{{--    <div class="tab-pane fade" id="tabSVG">--}}
{{--        <h2 class="featurette-heading">--}}
{{--            Drawing and animation with svg.--}}
{{--        </h2>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<p>--}}
{{--    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
{{--        Link with href--}}
{{--    </a>--}}
{{--    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">--}}
{{--        Button with data-target--}}
{{--    </button>--}}
{{--</p>--}}
{{--<div class="collapse" id="collapseExample">--}}
{{--    <div class="card card-body">--}}
{{--        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.--}}
{{--    </div>--}}
{{--</div>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}

{{--</body>--}}
{{--</html>--}}
    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="wheelnav.js test page for javascript way">
    <meta name="author" content="gabor.berkesi@softwaretailoring.net">
    <link rel="shortcut icon" href="wheelnav_favicon.png">

    <title>wheelnav.js - test page</title>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset("/public/assets/wheel2/css/index.css") }}" rel="stylesheet">


    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/required/raphael.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/required/raphael.icons.js") }}"></script>
    <script type="text/javascript" src="{{ asset("/public/assets/wheel2/js/dist/wheelnav.js") }}"></script>
        <script type="text/javascript">

            var myWheelnav = new wheelnav("divWheelnav");
            // window.onload = function () {
            //
            //     var myWheelnav = new wheelnav("divWheelnav");
            //     myWheelnav.slicePathFunction = slicePath().DonutSlice;
            //     myWheelnav.colors = new Array("mediumorchid", "royalblue", "darkorange", "royalblue");
            //     myWheelnav.keynavigateEnabled = true;
            //     myWheelnav.createWheel([icon.github, icon.people, icon.smile, "test"]);
            // };

        </script>

    <title>Hello, world!</title>
</head>
<body>
<h1>Hello, world!</h1>
<div id="divWheelnav" class="wheelNavGitHub" data-wheelnav data-wheelnav-titlewidth="50" data-wheelnav-titleheight="50">
    <div data-wheelnav-navitemicon="smile"></div>
    <div data-wheelnav-navitemtext="1" onmouseup="alert('Place your logic here.');" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
         aria-expanded="false" aria-controls="collapseExample"></div>
    <div data-wheelnav-navitemtext="2"><a href="#tabDefault"></a></div>
    <div data-wheelnav-navitemimg="../wheelnav_favicon.png"></div>
</div>

<div id="tab">
    <div>
        <div>Tab pane 1</div>
        <div>Tab pane 2</div>
        <div>Tab pane 3</div>
        <div>Tab pane 4</div>
    </div>
</div>

<div id="divWheelnav" class="wheelNavGitHub" data-wheelnav
     data-wheelnav-slicepath="WheelSlice"
     data-wheelnav-colors="#D80351,#F5D908,#00A3EE,#929292"
>
    <div data-wheelnav-navitemtext="আয়" href="#tabJS" data-toggle="tab"></div>
    <div data-wheelnav-navitemtext="সম্পদ" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
         aria-controls="collapseExample">star</div>
    <div data-wheelnav-navitemtext="ঋণ" href="#tabJS" data-toggle="tab">fork</div>
    <div data-wheelnav-navitemtext="প্রতিশ্রুতি" href="#tabJS" data-toggle="tab">donate</div>
    <div data-wheelnav-navitemtext="মামলা" href="#tabJS" data-toggle="tab">donate</div>
</div>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade in active" id="tabDefault">
        <h2 class="featurette-heading">
            In rotation mode wheelnav acts as a tab navigation.
            <br />
            <span class="text-muted">Click the <span class="link" onclick="tabWheel.navigateWheel(1); $('#tabDefaultNav a[href=\'#tabJS\']').tab('show');">wheel</span>.</span>
        </h2>
    </div>
    <div class="tab-pane fade" id="tabJS">
        <h2 class="featurette-heading">
            Pure JavaScript in separated source files.
        </h2>
    </div>
    <div class="tab-pane fade" id="tabCSS">
        <h2 class="featurette-heading">
            Predefined css classes for easy styling.
        </h2>
    </div>
    <div class="tab-pane fade" id="tabSVG">
        <h2 class="featurette-heading">
            Drawing and animation with svg.
        </h2>
    </div>
</div>

<div id="divWheelnav" class="wheelNavGitHub"></div>

<p>
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
       aria-controls="collapseExample">
        Link with href
    </a>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
        Button with data-bs-target
    </button>
</p>
<div class="collapse" id="collapseExample">
    <div class="card card-body">
        Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user
        activates the relevant trigger.
    </div>
</div>

<script>
    var myWheelnav = new wheelnav("divWheelnav");
</script>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>
