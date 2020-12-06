    <!-- Loader -->
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="mdi mdi-close"></i>
            </button>

            <div class="left-side-logo d-block d-lg-none">
                <div class="text-center">

                    <a href="index.html" class="logo"><img src="<?= base_url('vendor/admin/assets/images/logo_dark.png') ?>" height="20" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="<?= base_url('kasir') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kasir/sell') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Penjualan </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('kasir/product') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Produk </span>
                            </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-thumb"></i><span> Material </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('kasir/material_in') ?>">Material Masuk</a></li>
                                <li><a href="<?= base_url('kasir/material') ?>">Stok Material</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">Extra</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-thumb"></i><span> Laporan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('ups') ?>">Laporan 1</a></li>
                                <li><a href="<?= base_url('ups') ?>">Laporan 2</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->