<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="/css/normalize.css" />
        <link rel="stylesheet" href="/css/reset.css" />
        <link rel="stylesheet" href="/css/grid.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <script src="/js/script.js"></script>
        <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
        
    </head>
    <body>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }} </p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <!--@yield('content')-->
        @if('title' == 'Login')
            
        else
            <footer>
                    <p>Karoline Modas &copy; 2020</p>
            </footer>
        @endif
    </body>
</html>