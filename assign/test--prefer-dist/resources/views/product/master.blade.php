<html>
    <head>
        <title>@yield('Invoice System')</title>
         <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
         <script src="{{ asset('js/jquery.js') }}"></script>
         <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
         <link rel="stylesheet" href="{{ asset('css/fancybox.css') }}"  />
        <script type="text/javascript" src="{{ asset('js/fancybox.pack.js') }}"></script>
         <!-- <script src="{{ asset('js/invoice_create.js') }}"></script>
 -->
           @yield('extra-css')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>