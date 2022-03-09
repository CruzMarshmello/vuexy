<body class="vertical-layout vertical-menu-modern {{ $configData['showMenu'] === true ? '2-columns' : '1-column' }} {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{ $configData['verticalMenuNavbarType'] }}
{{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}" data-menu="vertical-menu-modern" data-col="{{ $configData['showMenu'] === true ? '2-columns' : '1-column' }}"
    data-layout="{{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme'] }}" style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/')}}">

    @if ((isset($configData['showMenu']) && $configData['showMenu'] === true))
    @include('guest.panels.sidebar')
    @endif

    @include('guest.panels.navbar')

    <div class="app-content content {{ $configData['pageClass'] }}">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        @if (($configData['contentLayout']!=='default') && isset($configData['contentLayout']))
        <div class="content-area-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
            <div class="{{ $configData['sidebarPositionClass'] }}">
                <div class="sidebar">
                    @yield('content-sidebar')
                </div>
            </div>
            <div class="{{ $configData['contentsidebarClass'] }}">
                <div class="content-wrapper">
                    <div class="content-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
            @if ($configData['pageHeader'] === true && isset($configData['pageHeader']))
            @include('guest.panels.breadcrumb')
            @endif

            <div class="content-body">
                @yield('content')
            </div>
        </div>
        @endif

    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('guest.panels.footer')
    @include('guest.panels.scripts')

    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>

</html>
