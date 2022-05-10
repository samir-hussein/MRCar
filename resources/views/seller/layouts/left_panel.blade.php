<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img
                    src="{{ asset('images/L.png') }}" alt="Logo" height="70" width="70"></a>
            <a class="navbar-brand hidden" href="/"><img
                    src="{{ asset('images/L.png') }}" alt="Logo" width="30" height="30"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('seller.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                <h3 class="menu-title">PAGES</h3><!-- /.menu-title -->

                <li>
                    <a href="{{ route('car.sell') }}"> <i class="menu-icon fa fa-th"></i>Sell Car</a>
                </li>

                <li>
                    <a href="{{ route('seller.cars') }}"> <i class="menu-icon fa fa-th"></i>My Cars</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
