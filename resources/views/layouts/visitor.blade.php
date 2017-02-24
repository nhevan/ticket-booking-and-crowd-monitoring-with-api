<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <div id="main-container" class="container-fluid">
            <div class="row" style="max-height: 80%;">
                <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-3">
                    <img src="{{ URL::asset('images/logo.png') }}" style="width: 100%;margin-bottom: 50px;"/>
                </div>
                <div id="yielded_content" class="col-md-6 col-sm-12" style="">
                    @yield('content')
                </div>
            </div>
            <div id="footer" class="row">
                <div class="col-md-12" style="position: relative;padding: 0;">
                    <img src="{{ URL::asset('images/footer_image.png') }}" style="width: 100%;"/>
                    <a id="powered-by" target="_blank" href="http://flowdigitalmedia.com">
                        <img src="{{ URL::asset('images/flow_logo.png') }}" style="position: absolute;right: 50px;bottom: 10px;max-width:70px;"/>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
        } );
    </script>
    <style>
        body{
            background-color: white;
            color: black;
            overflow-x: hidden;
        }
        #app > .container-fluid{
            padding-top: 30px;
            min-height: 100vh;
            position: relative;
        }
        #footer{
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1;
        }
        .panel{
            padding: 15px;
            box-shadow: 0px 10px 30px 0px rgba(211, 215, 221, 1);
            border: 1px solid #878787;
            max-width: 650px;
            margin: 0 auto;
        }
        .btn {
            background: #000;
            border: 0;
            padding: 8px;
            color: #fff;
            width: 100%;
            border-radius: 0px;
        }
        .my_input {
            width: 100%;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            margin-bottom: 8px;
        }
        input:focus {
            outline: none !important;
        }
        .bordered{
            border: 1px solid red;
            min-height: 20px;
        }
        #yielded_content{
            z-index: 9999;
        }
        .ui-widget.ui-widget-content {
            z-index: 999999 !important;
        }
        @media (max-width: 992px) {
            #yielded_content{
                margin-bottom: 35%;
            }
        }
        @media (max-width: 768px) {
            #powered-by img{
                width: 50px;
                right: 20px !important;
            }
        }
    </style>
</body>
</html>
