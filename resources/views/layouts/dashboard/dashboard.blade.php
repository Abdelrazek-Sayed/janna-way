 <!DOCTYPE html>
 <html lang="{{ LaravelLocalization::getCurrentLocale() }}"
     dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

 <head>
     @include('layouts.dashboard.partials.styles')
     @yield('styles')
     @livewireStyles
     <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
