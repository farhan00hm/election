<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="robots" content="noindex, nofollow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Wheelizate Tabs sample."/>
    <meta name="keywords" content="tabbed navigation wheel wheelnav.js"/>
    <meta name="author" content="gabor.berkesi@softwaretailoring.net"/>
    <link rel="shortcut icon" href="https://wtabs.softwaretailoring.net/wheelizate-tabs-logo.png">

    <title>Wheelizate Tabs - Sample HTML5</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--CSS for your project-->
    <link href="https://wtabs.softwaretailoring.net/assets/dist/css/wheelizate.tab.min.css" rel="stylesheet">
    <link href="https://wtabs.softwaretailoring.net/themes/themeColor/Red/theme.min.css" rel="stylesheet">

    <!--JS for your project-->
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/jquery-1.11.3.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/raphael.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/raphael.icons.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/required/js/wheelnav.min.js"></script>
    <script src="https://wtabs.softwaretailoring.net/assets/dist/js/wheelizate.tab.min.js"></script>
</head>
<body>
<div class="container">
    <div id="tab"
         data-wtab
         data-wtab-selectedtab="3"
         data-wtab-tabtype="Apart"
         data-wtab-tabsubtype="Left"
         data-wtab-tabthemetype="Color"
         data-wtab-tabwheeltype="Pie"
         data-wtab-wheelradius="110"
         data-wtab-titlerotateangle="0"
         data-wtab-iconheight="40"
         data-wtab-iconwidth="40"
         data-wtab-clockwise
         data-wtab-marker
         data-wtab-wheelanimation="bounce"
         data-wtab-paneanimation="bounce"
         data-wtab-tabrounded
         data-wtab-tabshadowed
         data-wtab-minheight="300"
         data-wtab-sliderseconds="0"
         data-wtab-keyenabled>
        <div>
            <div data-wtab-tabtitle-text="মামলা" data-wtab-tabtitle-tooltip="Tooltip 1">Tab pane 1</div>
            <div data-wtab-tabtitle-text="আয়" data-wtab-tabtitle-tooltip="Tooltip 2">Tab pane 2</div>
            <div data-wtab-tabtitle-text="ঋণ" data-wtab-tabtitle-tooltip="Tooltip 3">Tab pane 3
            </div>
            <div data-wtab-tabtitle-text="সম্পদ" data-wtab-tabtitle-tooltip="Tooltip 4">Tab pane 4</div>
            <div data-wtab-tabtitle-text="প্রতিশ্রুতি" data-wtab-tabtitle-tooltip="Tooltip 4">প্রতিশ্রুতি</div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('#tab').wheelizateTabHtml();
        // - OR without jQuery - //
        // wheelizateTabHtml("tab");
    }
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
