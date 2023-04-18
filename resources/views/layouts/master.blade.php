<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     @include('layouts.head')
<body>
     @include('layouts.navbar')
     <div class="page-content">
          @include('layouts.slidebar')
          @yield('content')
     </div>
     @include('layouts.notifications')
     @include('layouts.config')
</body>
</html>