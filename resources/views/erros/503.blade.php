<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Diário Oficial Eletrônico do Ministério Público do Estado do Acre</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/all.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row header">
            <div class="col-md-8 col-md-offset-2">
                <a class="text-center" href="/">
                    <img id="logo" src="{{ asset('img/logo.png') }}" alt="Logo" width="360" height="60">
                </a>
            </div>
        </div>

        <div class="row" style="margin-top: 70px">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger text-center">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    <h2>Este site está em manutenção,<br /> volte novamente mais tarde.</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="js/all.js"></script>
</body>
</html>


