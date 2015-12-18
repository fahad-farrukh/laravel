<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" -->
        <link rel="stylesheet" href="http://localhost/laravel/public/{{ elixir('css/all.css') }}">
        <!-- link rel="stylesheet" href="http://localhost/laravel/public/css/app.css" -->
        <!-- link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" / -->
    </head>
    <body>
        @include('partials.nav')
        <div class="container">
            @include('flash::message') <?php /* Including view from package, @include('packagename::viewname') */?>
            <?php /*@include('partials.flash')*/ ?>
            
            @yield('content')
        </div>
        
        <script src="http://localhost/laravel/public/js/all.js"></script>
        <!-- script src="https://code.jquery.com/jquery.js"></script -->
        <!-- script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script -->
        <script>
            $('#flash-overlay-modal').modal();// For "flash()->overlay()" messages
            //$('div.alert').not('.alert-important').delay(3000).slideUp(300);
        </script>
        <!-- script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script -->
        @yield('footer')
    </body>
</html>
