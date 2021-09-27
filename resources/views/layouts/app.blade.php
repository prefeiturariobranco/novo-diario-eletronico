<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diário Oficial Eletrônic</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- Scripts -->
    <script src="https://use.fontawesome.com/5340275f25.js"></script>
    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script>
        $(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
<div id="app">

    @include('layouts.navbar')
    <div class="container">
        <div class="row header">
            <div class="col-md-4 col-md-offset-2">
                <a href="/">
                    <img id="logo" src="/img/logo.png" alt="Logo" width="360" height="60">
                </a>
            </div>
            @stack('filter')
        </div>
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="/js/all.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

</body>
</html>


