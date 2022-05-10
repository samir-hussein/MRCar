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
                    <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                <h3 class="menu-title">PAGES</h3><!-- /.menu-title -->
                @if (Auth::user()->role == 'owner')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Admins</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a
                                    href="{{ route('admin.register') }}">Create Admin</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="{{ route('admin.show') }}">All Admins</a></li>
                        </ul>
                    </li>
                @endif

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Cars</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a
                                href="{{ route('car.waiting') }}">Waiting</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{ route('car.approved') }}">Approved</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('seller.show') }}"><i class="menu-icon fa fa-th"></i>All Sellers</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->
