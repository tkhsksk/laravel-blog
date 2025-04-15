<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @yield('common.head')
  </head>
  <body>
    <div class="container">
        <div class="offset-md-2 col-md-8 py-5">
          @yield('common.header')
            @yield('contents')
        </div>
    </div>
  </body>
</html>