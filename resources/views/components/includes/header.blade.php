<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 75px;">
    <a class="navbar-brand font-weight-bold" href="/" style="font-size: 24px !important;">WAREHOUSE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="font-size: 18px !important;">
        <ul class="navbar-nav">
            <li class="nav-item {{(Request::segment(1) == 'home') ? 'active' : ''}}">
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{(Request::segment(1) == 'barang') ? 'active' : ''}}">
                <a class="nav-link" href="/barang">Barang</a>
            </li>
            <li class="nav-item {{(Request::segment(1) == 'stok') ? 'active' : ''}}">
                <a class="nav-link" href="/stok">Stok</a>
            </li>
            <li class="nav-item {{(Request::segment(1) == 'penjualan') ? 'active' : ''}}">
                <a class="nav-link" href="/penjualan">Penjualan</a>
            </li>
            <li class="nav-item {{(Request::segment(1) == 'report') ? 'active' : ''}}">
                <a class="nav-link" href="/report">Report</a>
            </li>
        </ul>
    </div>
</nav>