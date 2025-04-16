<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="home">
  <head>
    @yield('common.head')
  </head>
  <body>
    @yield('common.header_home')
    <main>
    <div class="container">
      <div class="row">
        <div class="col-md-9 offset-md-3">
          @yield('contents')
        </div>
      </div>
    </div>
  </main>
  </body>
</html>