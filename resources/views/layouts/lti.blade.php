
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Properties -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }
        .ui.fixed.menu{
            background-color: #3e92b9;
        }
        .ui.fixed.menu .item{
            color: #ffffff;
        }
        .ui.menu .item img.logo {
            margin-right: .5em;
            height: 46px;
            width: auto;
        }
        .main {
            margin-top: 7em;
        }
        .wireframe {
            margin-top: 2em;
        }
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }

        div [class*="left floated"] {
            float: left;
            margin-left: 0.25em;
        }

        div [class*="right floated"] {
            float: right;
            margin-right: 0.25em;
        }
    </style>

</head>
<body>

<div class="ui fixed menu">
    <div class="ui container">
        <a class="item" href="{{ route('sets.create') }}" target="_blank">
            <i class="plus icon"></i>
            {{ __('Add Set') }}
        </a>
        <div class="right menu">
            <div class="item">
                {!! Form::get()->route('home.search') !!}
                    <div class="ui icon input">
                        <input type="text" name="q" placeholder="{{ __('Search') }}..." value="{{ request('q') }}">
                        <i class="search link icon"></i>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="main">
    @yield('content')
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/semantic.min.js') }}"></script>
@stack('scripts')
<script>
    $(function(){
        $('.message .close')
            .on('click', function() {
                $(this)
                    .closest('.message')
                    .transition('fade')
                ;
            })
        ;
    });
</script>
</body>

</html>
