<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     @include('layouts.head')
<body>

     <div class="header-height-fix"></div>
     @include('layouts.header')
     @yield('banner')
     {{-- @include('layouts.banner') --}}
          @yield('content')
     @include('layouts.footer')
     @include('layouts.scripts')

</body>
</html>