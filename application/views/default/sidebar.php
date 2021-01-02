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
                        <?php if ($this->session->userdata('side') == 'admin') { ?>
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
                                <a href="<?= base_url('owner/produk') ?>" class="waves-effect">
                                    <i class="dripicons-archive"></i>
                                    <span> Produk</span>
                                </a>
                            </li>
                            <li class="menu-title">Report</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-print"></i><span> Laporan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('owner/lap_penjualan') ?>"> Laporan Penjualan </a></li>
                                    <li><a href="<?= base_url('owner/lap_material') ?>"> Laporan Material</a></li>
                                    <li><a href="<?= base_url('owner/lap_stok') ?>"> Laporan Stok </a></li>
                                    <li><a href="<?= base_url('owner/lap_produk') ?>"> Laporan Produk </a></li>
                                </ul>
                            </li>

                        <?php } else if ($this->session->userdata('side') == 'gudang') { ?>
                            <li>
                                <a href="<?= base_url('gudang') ?>" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);"><i class="dripicons-basket"></i><span> Material </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('gudang/material') ?>"> Material</a></li>
                                    <!-- <li><a href="<?= base_url('gudang/material_add') ?>"> Data Material</a></li> -->
                                    <li><a href="<?= base_url('gudang/material_in') ?>"> Material Masuk</a></li>
                                    <li><a href="<?= base_url('gudang/material_out') ?>"> Material Keluar</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Report</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-print"></i><span> Laporan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <!-- <li><a href="<?= base_url('gudang/lap_penjualan') ?>"> Laporan Penjualan </a></li> -->
                                    <li><a href="<?= base_url('gudang/lap_material') ?>"> Laporan Material Masuk</a></li>
                                    <li><a href="<?= base_url('gudang/lap_stok') ?>"> Laporan Stok </a></li>
                                    <!-- <li><a href="<?= base_url('gudang/lap_produk') ?>"> Laporan Produk </a></li> -->
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="menu-title">Main</li>

                            <li>
                                <a href="<?= base_url('kasir') ?>" class="waves-effect">
                                    <i class="dripicons-store"></i>
                                    <span> Dashboard</span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-cart"></i><span> Penjualan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('kasir/sell') ?>">Penjualan</a></li>
                                    <li><a href="<?= base_url('kasir/transaksi') ?>">Data Transkasi</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="<?= base_url('kasir/product') ?>" class="waves-effect">
                                    <i class="dripicons-to-do"></i>
                                    <span> Produk </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-basket"></i><span> Material </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('kasir/material_in') ?>">Material Masuk
                                            <?php if ($alert['alert'] != 0) {
                                                echo '<span class="badge badge-danger badge-pill float-right">' . $alert['alert'] . '</span>';
                                            } ?>

                                        </a></li>
                                    <li><a href="<?= base_url('kasir/material') ?>">Stok Material</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Report</li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-print"></i><span> Laporan </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('kasir/lap_penjualan') ?>"> Laporan Penjualan </a></li>
                                    <li><a href="<?= base_url('kasir/lap_material') ?>"> Laporan Material</a></li>
                                    <li><a href="<?= base_url('kasir/lap_stok') ?>"> Laporan Stok </a></li>
                                    <li><a href="<?= base_url('kasir/lap_produk') ?>"> Laporan Produk </a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->