@include('dashboard.layouts.header')
@include('dashboard.layouts.navbar')
@if (Auth::guard('admin')->check())
@include('dashboard.layouts.sidebar.admin')    
@else
@include('dashboard.layouts.sidebar.student')    
@endif
@yield('content')   
@include('dashboard.layouts.footer')