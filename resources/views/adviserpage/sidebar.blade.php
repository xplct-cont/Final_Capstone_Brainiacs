
<aside class="main-sidebar sidebar-light elevation-0">
    <a href="{{ route('homepage') }}" class="brand-link bg-info">
        <img src="{{url('/images/image17.png')}}"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold" style="color:whitesmoke;">PNHS SHS-GIS</span>
    </a>

    <div class="sidebar bg-dark text-light ">
        <nav class="mt-3 ml-3">
            <ul class="nav nav-pills nav-sidebar flex-column bg-dark" data-widget="treeview" role="menu" data-accordion="false">
                @include('adviserpage.menu')
            </ul>
        </nav>
    </div>

</aside>