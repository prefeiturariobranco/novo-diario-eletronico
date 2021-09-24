<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/app.css')}}">--}}
    <title>Protocolo de Ponto</title>
    <style>
        :root {
            --blue: #3490dc;
            --indigo: #6574cd;
            --purple: #9561e2;
            --pink: #f66d9b;
            --red: #e3342f;
            --orange: #f6993f;
            --yellow: #ffed4a;
            --green: #38c172;
            --teal: #4dc0b5;
            --cyan: #6cb2eb;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #3490dc;
            --secondary: #6c757d;
            --success: #38c172;
            --info: #6cb2eb;
            --warning: #ffed4a;
            --danger: #e3342f;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Nunito", sans-serif;
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Nunito", sans-serif;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f8fafc;
        }

        label {
            font-size: 15px;
            font-weight: bolder;
        }

        .bg-info {
            background-color: #6cb2eb !important;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .container,
        .container-fluid,
        .container-xl,
        .container-lg,
        .container-md,
        .container-sm {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        @media (min-width: 576px) {
            .container-sm, .container {
                max-width: 540px;
            }
        }

        @media (min-width: 768px) {
            .container-md, .container-sm, .container {
                max-width: 720px;
            }
        }

        @media (min-width: 992px) {
            .container-lg, .container-md, .container-sm, .container {
                max-width: 960px;
            }
        }

        @media (min-width: 1200px) {
            .container-xl, .container-lg, .container-md, .container-sm, .container {
                max-width: 1140px;
            }
        }

        .col-xl,
        .col-xl-auto, .col-xl-12, .col-xl-11, .col-xl-10, .col-xl-9, .col-xl-8, .col-xl-7, .col-xl-6, .col-xl-5, .col-xl-4, .col-xl-3, .col-xl-2, .col-xl-1, .col-lg,
        .col-lg-auto, .col-lg-12, .col-lg-11, .col-lg-10, .col-lg-9, .col-lg-8, .col-lg-7, .col-lg-6, .col-lg-5, .col-lg-4, .col-lg-3, .col-lg-2, .col-lg-1, .col-md,
        .col-md-auto, .col-md-12, .col-md-11, .col-md-10, .col-md-9, .col-md-8, .col-md-7, .col-md-6, .col-md-5, .col-md-4, .col-md-3, .col-md-2, .col-md-1, .col-sm,
        .col-sm-auto, .col-sm-12, .col-sm-11, .col-sm-10, .col-sm-9, .col-sm-8, .col-sm-7, .col-sm-6, .col-sm-5, .col-sm-4, .col-sm-3, .col-sm-2, .col-sm-1, .col,
        .col-auto, .col-12, .col-11, .col-10, .col-9, .col-8, .col-7, .col-6, .col-5, .col-4, .col-3, .col-2, .col-1 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }

        .row-cols-1 > * {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .row-cols-2 > * {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .row-cols-3 > * {
            flex: 0 0 33.3333333333%;
            max-width: 33.3333333333%;
        }

        .row-cols-4 > * {
            flex: 0 0 25%;
            max-width: 25%;
        }

        .row-cols-5 > * {
            flex: 0 0 20%;
            max-width: 20%;
        }

        .row-cols-6 > * {
            flex: 0 0 16.6666666667%;
            max-width: 16.6666666667%;
        }

        .col-auto {
            flex: 0 0 auto;
            width: auto;
            max-width: 100%;
        }

        .col-1 {
            flex: 0 0 8.3333333333%;
            max-width: 8.3333333333%;
        }

        .col-2 {
            flex: 0 0 16.6666666667%;
            max-width: 16.6666666667%;
        }

        .col-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-4 {
            flex: 0 0 33.3333333333%;
            max-width: 33.3333333333%;
        }

        .col-5 {
            flex: 0 0 41.6666666667%;
            max-width: 41.6666666667%;
        }

        .col-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-7 {
            flex: 0 0 58.3333333333%;
            max-width: 58.3333333333%;
        }

        .col-8 {
            flex: 0 0 66.6666666667%;
            max-width: 66.6666666667%;
        }

        .col-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }

        .col-10 {
            flex: 0 0 83.3333333333%;
            max-width: 83.3333333333%;
        }

        .col-11 {
            flex: 0 0 91.6666666667%;
            max-width: 91.6666666667%;
        }

        .col-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .order-first {
            order: -1;
        }

        .order-last {
            order: 13;
        }

        .order-0 {
            order: 0;
        }

        .order-1 {
            order: 1;
        }

        .order-2 {
            order: 2;
        }

        .order-3 {
            order: 3;
        }

        .order-4 {
            order: 4;
        }

        .order-5 {
            order: 5;
        }

        .order-6 {
            order: 6;
        }

        .order-7 {
            order: 7;
        }

        .order-8 {
            order: 8;
        }

        .order-9 {
            order: 9;
        }

        .order-10 {
            order: 10;
        }

        .order-11 {
            order: 11;
        }

        .order-12 {
            order: 12;
        }

        .offset-1 {
            margin-left: 8.3333333333%;
        }

        .offset-2 {
            margin-left: 16.6666666667%;
        }

        .offset-3 {
            margin-left: 25%;
        }

        .offset-4 {
            margin-left: 33.3333333333%;
        }

        .offset-5 {
            margin-left: 41.6666666667%;
        }

        .offset-6 {
            margin-left: 50%;
        }

        .offset-7 {
            margin-left: 58.3333333333%;
        }

        .offset-8 {
            margin-left: 66.6666666667%;
        }

        .offset-9 {
            margin-left: 75%;
        }

        .offset-10 {
            margin-left: 83.3333333333%;
        }

        .offset-11 {
            margin-left: 91.6666666667%;
        }

        @media (min-width: 576px) {
            .col-sm {
                flex-basis: 0;
                flex-grow: 1;
                max-width: 100%;
            }

            .row-cols-sm-1 > * {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .row-cols-sm-2 > * {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .row-cols-sm-3 > * {
                flex: 0 0 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .row-cols-sm-4 > * {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .row-cols-sm-5 > * {
                flex: 0 0 20%;
                max-width: 20%;
            }

            .row-cols-sm-6 > * {
                flex: 0 0 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .col-sm-auto {
                flex: 0 0 auto;
                width: auto;
                max-width: 100%;
            }

            .col-sm-1 {
                flex: 0 0 8.3333333333%;
                max-width: 8.3333333333%;
            }

            .col-sm-2 {
                flex: 0 0 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .col-sm-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .col-sm-4 {
                flex: 0 0 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .col-sm-5 {
                flex: 0 0 41.6666666667%;
                max-width: 41.6666666667%;
            }

            .col-sm-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .col-sm-7 {
                flex: 0 0 58.3333333333%;
                max-width: 58.3333333333%;
            }

            .col-sm-8 {
                flex: 0 0 66.6666666667%;
                max-width: 66.6666666667%;
            }

            .col-sm-9 {
                flex: 0 0 75%;
                max-width: 75%;
            }

            .col-sm-10 {
                flex: 0 0 83.3333333333%;
                max-width: 83.3333333333%;
            }

            .col-sm-11 {
                flex: 0 0 91.6666666667%;
                max-width: 91.6666666667%;
            }

            .col-sm-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .order-sm-first {
                order: -1;
            }

            .order-sm-last {
                order: 13;
            }

            .order-sm-0 {
                order: 0;
            }

            .order-sm-1 {
                order: 1;
            }

            .order-sm-2 {
                order: 2;
            }

            .order-sm-3 {
                order: 3;
            }

            .order-sm-4 {
                order: 4;
            }

            .order-sm-5 {
                order: 5;
            }

            .order-sm-6 {
                order: 6;
            }

            .order-sm-7 {
                order: 7;
            }

            .order-sm-8 {
                order: 8;
            }

            .order-sm-9 {
                order: 9;
            }

            .order-sm-10 {
                order: 10;
            }

            .order-sm-11 {
                order: 11;
            }

            .order-sm-12 {
                order: 12;
            }

            .offset-sm-0 {
                margin-left: 0;
            }

            .offset-sm-1 {
                margin-left: 8.3333333333%;
            }

            .offset-sm-2 {
                margin-left: 16.6666666667%;
            }

            .offset-sm-3 {
                margin-left: 25%;
            }

            .offset-sm-4 {
                margin-left: 33.3333333333%;
            }

            .offset-sm-5 {
                margin-left: 41.6666666667%;
            }

            .offset-sm-6 {
                margin-left: 50%;
            }

            .offset-sm-7 {
                margin-left: 58.3333333333%;
            }

            .offset-sm-8 {
                margin-left: 66.6666666667%;
            }

            .offset-sm-9 {
                margin-left: 75%;
            }

            .offset-sm-10 {
                margin-left: 83.3333333333%;
            }

            .offset-sm-11 {
                margin-left: 91.6666666667%;
            }
        }

        @media (min-width: 768px) {
            .col-md {
                flex-basis: 0;
                flex-grow: 1;
                max-width: 100%;
            }

            .row-cols-md-1 > * {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .row-cols-md-2 > * {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .row-cols-md-3 > * {
                flex: 0 0 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .row-cols-md-4 > * {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .row-cols-md-5 > * {
                flex: 0 0 20%;
                max-width: 20%;
            }

            .row-cols-md-6 > * {
                flex: 0 0 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .col-md-auto {
                flex: 0 0 auto;
                width: auto;
                max-width: 100%;
            }

            .col-md-1 {
                flex: 0 0 8.3333333333%;
                max-width: 8.3333333333%;
            }

            .col-md-2 {
                flex: 0 0 16.6666666667%;
                max-width: 16.6666666667%;
            }

            .col-md-3 {
                flex: 0 0 25%;
                max-width: 25%;
            }

            .col-md-4 {
                flex: 0 0 33.3333333333%;
                max-width: 33.3333333333%;
            }

            .col-md-5 {
                flex: 0 0 41.6666666667%;
                max-width: 41.6666666667%;
            }

            .col-md-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .col-md-7 {
                flex: 0 0 58.3333333333%;
                max-width: 58.3333333333%;
            }

            .col-md-8 {
                flex: 0 0 66.6666666667%;
                max-width: 66.6666666667%;
            }

            .col-md-9 {
                flex: 0 0 75%;
                max-width: 75%;
            }

            .col-md-10 {
                flex: 0 0 83.3333333333%;
                max-width: 83.3333333333%;
            }

            .col-md-11 {
                flex: 0 0 91.6666666667%;
                max-width: 91.6666666667%;
            }

            .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .order-md-first {
                order: -1;
            }

            .order-md-last {
                order: 13;
            }

            .order-md-0 {
                order: 0;
            }

            .order-md-1 {
                order: 1;
            }

            .order-md-2 {
                order: 2;
            }

            .order-md-3 {
                order: 3;
            }

            .order-md-4 {
                order: 4;
            }

            .order-md-5 {
                order: 5;
            }

            .order-md-6 {
                order: 6;
            }

            .order-md-7 {
                order: 7;
            }

            .order-md-8 {
                order: 8;
            }

            .order-md-9 {
                order: 9;
            }

            .order-md-10 {
                order: 10;
            }

            .order-md-11 {
                order: 11;
            }

            .order-md-12 {
                order: 12;
            }

            .offset-md-0 {
                margin-left: 0;
            }

            .offset-md-1 {
                margin-left: 8.3333333333%;
            }

            .offset-md-2 {
                margin-left: 16.6666666667%;
            }

            .offset-md-3 {
                margin-left: 25%;
            }

            .offset-md-4 {
                margin-left: 33.3333333333%;
            }

            .offset-md-5 {
                margin-left: 41.6666666667%;
            }

            .offset-md-6 {
                margin-left: 50%;
            }

            .offset-md-7 {
                margin-left: 58.3333333333%;
            }

            .offset-md-8 {
                margin-left: 66.6666666667%;
            }

            .offset-md-9 {
                margin-left: 75%;
            }

            .offset-md-10 {
                margin-left: 83.3333333333%;
            }

            .offset-md-11 {
                margin-left: 91.6666666667%;
            }
        }

        .text-white {
            color: #fff !important;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }


        .mt-2, .my-2 {
            margin-top: 0.5rem !important;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .bg-dark {
            background-color: #343a40 !important;
        }

        .text-center {
            text-align: center !important;
        }

        .mt-3, .my-3 {
            margin-top: 1rem !important;
        }
    </style>
</head>
<body cz-shortcut-listen="true">
<div class="container">

    <div class="row bg-info">
{{--        <img src="{{\Illuminate\Support\Facades\URL::asset('assets/logo-prefeitura.png')}}" alt="logo" width="25%">--}}
    </div>

    <div class="row">
        <div class="col col-12">
            <h3>Diário Eletrônico </h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
{{--            <p>Nome: <label class="font-weight-bold">{{$employ->peopleEmploy->people->name}}</label></p>--}}
            <p>Nome: <label class="font-weight-bold"></label></p>
        </div>

        <div class="col col-md-6">
{{--            <p>Secretaria: <label class="font-weight-bold">{{$employ->organLotation->organ->name}}</label>--}}
            <p>Secretaria: <label class="font-weight-bold"></label></p>

        </div>

        <div class="col col-md-6">
{{--            <p>Lotação: <label class="font-weight-bold">{{$employ->organLotation->lotation->number}}</label></p>--}}
            <p>Lotação: <label class="font-weight-bold"></label></p>

        </div>

        <div class="col col-md-6">
            <p>Data:
                <label class="font-weight-bold">
{{--                    @if(!is_null($employ->workday->out_of_the_day))--}}
{{--                        {{date_format(date_create($employ->workday->out_of_the_day), 'd/m/Y H:i:s')}}--}}
{{--                    @elseif (!is_null($employ->workday->entry_back))--}}
{{--                        {{date_format(date_create($employ->workday->entry_back), 'd/m/Y H:i:s')}}--}}
{{--                    @elseif(!is_null($employ->workday->day_out))--}}
{{--                        {{date_format(date_create($employ->workday->day_out), 'd/m/Y H:i:s')}}--}}
{{--                    @else--}}
{{--                        {{date_format(date_create($employ->workday->entry_day), 'd/m/Y H:i:s')}}--}}
{{--                    @endif--}}
                </label>
            </p>
        </div>

        <div class="col col-12 bg-dark text-center -align-justify">
{{--            <p class="text-white font-weight-bold mt-2">PONTORIOBRANCO{{$employ->workday->protocol}}</p>--}}
        </div>
    </div>

    <div class="row footer bg-info mt-3">
        <p class="font-weight-bold ml-3">Prefeitura de Rio Branco - Ac</p>
    </div>
</div>
</body>
</html>
