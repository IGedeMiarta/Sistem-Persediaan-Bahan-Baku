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

                    <a href="index.html" class="logo"><img src="assets/images/logo_dark.png" height="20" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="<?= base_url('gudang') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Dashboard</span>
                            </a>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span> Material </span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('gudang/material') ?>"> Stok Gudang</a></li>
                                <li><a href="<?= base_url('gudang/material_in') ?>"> Material Masuk</a></li>
                                <li><a href="<?= base_url('gudang/material_out') ?>"> Material Keluar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= base_url('Ups') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Retur</span>
                            </a>
                        </li>

                        <li class="menu-title">Report</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span> Laporan </span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?= base_url('Ups') ?>"> Laporan Material</a></li>
                                <li><a href="<?= base_url('Ups') ?>"> Laporan Stok </a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->