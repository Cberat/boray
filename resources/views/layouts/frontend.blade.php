<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{$settings["keywords"]}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset("assets/frontend/temp/styles/styles.css")}}" />
    <script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
    <link rel="shortcut icon" href="https://www.borayemlak.com/wp-content/themes/boray_theme/img/favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
          crossorigin="anonymous">
    <title>Anasayfa</title>
    <script src="{{asset("assets/frontend/temp/scripts/Vendor.js")}}"></script>
</head>

<body>

@include("frontend.include.header")
<!--MAIN LAYOUT-->
<!--MAIN LAYOUT-->
<!--MAIN LAYOUT-->

@yield("content")

<!--MAIN LAYOUT-->
<!--MAIN LAYOUT-->
<!--MAIN LAYOUT-->



@include("frontend.include.footer")

<script src="{{asset("assets/frontend/temp/scripts/App.js")}}"></script>
</body>

</html>
