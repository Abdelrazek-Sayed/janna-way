 <!DOCTYPE html>
 <html lang="{{ LaravelLocalization::getCurrentLocale() }}"
     dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

 <head>
     @include('layouts.dashboard.partials.styles')
     @yield('styles')
     @livewireStyles
 </head>

 <body class="app sidebar-mini" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
     @include('layouts.dashboard.partials.navbar')
     @include('layouts.dashboard.partials.sidemenu')
     @yield('content')
     @include('layouts.dashboard.partials.scripts')
     @yield('scripts')
     @livewireScripts
 </body>

 </html>
