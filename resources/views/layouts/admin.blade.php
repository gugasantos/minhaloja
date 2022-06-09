<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #6d75e0;
        }

        .container {
            color: #444fe7;
            background-color: white;
            padding: 35px;
            margin: 120px;
            border-radius: 15px;
            border: 1px solid #6d75e0;
            box-shadow: 0px 0px 10px #777777
        }

    </style>
</head>

<body>
    <div class="container">

        <header style="text-align: center">
            <h1>@yield('title')</h1>
        </header>
        <section style="margin: 25px">
            @yield('content')
        </section>
        <footer style="text-align: center">
            @sitefeitoporgustavo
        </footer>
</body>
</div>

</html>
