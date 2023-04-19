<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     @include('layouts.head')
<body>
     @include('layouts.navbar')
     <div class="page-content">
          @include('layouts.slidebar')
               <div class="content-wrapper">
                    <div class="content-inner">
                         @include('layouts.header')
                         @yield('content')
                         @include('layouts.footer')
                    </div>
                    <div class="btn-to-top"><button class="btn btn-secondary btn-icon rounded-pill" type="button"><i class="ph-arrow-up"></i></button></div>
               </div>
     </div>
     @include('layouts.notifications')
     @yield('scripts')
</body>
</html>