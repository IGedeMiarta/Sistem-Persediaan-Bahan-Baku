<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">

        <!-- Top Bar Start -->
        <div class="topbar">

            <div class="topbar-left	d-none d-lg-block">
                <div class="text-center">
                    <a href="<?= base_url('owner') ?>" class="logo"><img src="<?= base_url('assets/logo/logo-white.png') ?>" height="42" alt="logo"></a>
                </div>
            </div>

            <nav class="navbar-custom">

                <!-- Search input -->

                <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <?php if ($alert['alert'] != 0) { ?>
                                <?php echo '<span class="badge badge-danger badge-pill noti-icon-badge">' . $alert['alert'] . '</span>'; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Notification (<?= $alert['alert'] ?>)</h5>
                            </div>



                            <div class="slimscroll-noti">
                                <?php foreach ($status as $s) { ?>
                                    <?php if ($this->session->userdata('side') == 'kasir') { ?>
                                        <a href="<?= base_url('kasir/material_in') ?>" class="dropdown-item notify-item active mb-1">
                                        <?php } else { ?>
                                            <a href="#" class="dropdown-item notify-item active mb-1">
                                            <?php } ?>
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b><?= $s->nama . ' [ ' . $s->jumlah . ' gram ]' ?></b><span class="text-muted">Menunggu Konfirmasi Bagian Kasir</span></p>
                                            </a>
                                        <?php } ?>
                            </div>



                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item notify-all">
                                View All
                            </a>

                        </div>
                    <?php }
                    ?>
                    </li>

                    <li class="list-inline-item dropdown notification-list nav-user">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?= base_url('vendor/admin/assets/images/users/avatar-6.jpg') ?>" alt="user" class="rounded-circle">
                            <span class="d-none d-md-inline-block ml-1">
                                <?php if ($this->session->userdata('side') == 'admin') {
                                    echo 'Administrator';
                                } else {
                                    echo $user['nama'];
                                }
                                ?>
                                <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                            <!-- <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i class="dripicons-exit text-muted"></i> Logout</a>
                        </div>
                    </li>

                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="list-inline-item">
                        <button type="button" class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                </ul>


            </nav>

        </div>
        <!-- Top Bar End -->