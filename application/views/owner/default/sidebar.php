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
                    <a href="<?= base_url('owner') ?>" class="logo"><img src="<?= base_url('assets/logo/logo-black.png') ?>" height="40" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>

                        <li>
                            <a href="<?= base_url('owner') ?>" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('owner/pegawai') ?>" class="waves-effect">
                                <i class="dripicons-user-group"></i>
                                <span> Pegawai</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('owner/supplier') ?>" class="waves-effect">
                                <i class="dripicons-store"></i>
                                <span> Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('owner') ?>" class="waves-effect">
                                <i class="dripicons-archive"></i>
                                <span> Produk</span>
                            </a>
                        </li>

                        <li class="menu-title">Report</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-print"></i><span> Laporan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
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