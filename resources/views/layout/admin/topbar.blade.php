<!-- Topbar Start -->
<header class="app-header flex items-center px-5 gap-4">

    <!-- Brand Logo -->
    <a href="index.html" class="logo-box">
        <img src="{{asset('assets/images/logofix.png')}}" class="h-6" alt="Small logo">
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu" class="nav-link p-2">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="uil uil-bars text-2xl"></i>
        </span>
    </button>

    <!-- Page Title -->
    <h4 class="text-slate-900 text-lg font-medium">@yield('title')</h4>

    <a id="button-toggle-profile" class="nav-link p-2 ms-auto" style="cursor: pointer;" href="{{ route('logout') }}">
        <span class="sr-only">Profile Menu Offcanvas Button</span>
        <span class="flex items-center justify-center h-6 w-6">
            <i class="uil uil-arrow-circle-right text-2xl"></i>
        </span>
    </a>
</header>
<!-- Topbar End -->
