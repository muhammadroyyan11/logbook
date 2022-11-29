<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Logbook | <?= $title ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini <?= $this->uri->segment(1) == 'ambil' ? 'sidebar-collapse' : null ?>">

	<div class="wrapper">
		<header class="main-header">
			<a href="<?= site_url('dashboard') ?>" class="logo">
				<span class="logo-mini">A<b>L</b></span>
				<span class="logo-lg"><i>Logbook</i><b></b></span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url() ?>assets/foto/images.png" class="user-image">
								<span class="hidden-xs"><?= userdata('nama')?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?= base_url() ?>assets/foto/images.png">
									<p><span class="hidden-xs">tes</span>
										<small>Indonesia</small>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
									</div>
									<div class="pull-right">
										<a href="<?= site_url('auth/logout') ?>" class="btn btn-flat bg-red">Keluar</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column -->
		<aside class="main-sidebar">
			<section class="sidebar">

				<!-- sidebar menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN MENU</li>

					<li <?= $this->uri->segment(1) == 'dashboard' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
					</li>
					<?php
					if (userdata('role') == 2) { ?>
						<li <?= $this->uri->segment(1) == 'logbook' ? 'class="active"' : '' ?>>
							<a href="<?= site_url('logbook') ?>"><i class="fa fa-list"></i> <span>Isi LogBook</span></a>
						</li>
					<?php }
					?>
					<li <?= $this->uri->segment(1) == 'pelatihan' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('pelatihan') ?>"><i class="fa fa-list"></i> <span>Riwayat Pelatihan</span></a>
					</li>
					<li <?= $this->uri->segment(1) == 'VerifyLog' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('VerifyLog') ?>"><i class="fa fa-list "></i> <span>Verifikasi LogBook</span></a>
					</li>
					<li <?= $this->uri->segment(1) == 'ambil' ? 'class="active"' : '' ?>>
						<a href="<?= site_url('tampil') ?>"><i class="fa fa-print "></i> <span>Rekap Logbook</span></a>
					</li>
					<!-- <li>
						<a href="">
							<i class="fa fa-users"></i> <span>Customers</span>
						</a>
					</li> -->

					<!-- <li class="treeview" <?= $this->uri->segment(1) == 'history' ? 'class="active"' : '' ?>>
						<a href="#">
							<i class="fa fa-pie-chart"></i> <span>History</span>
							<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= site_url('antrian') ?>"><i class="fa fa-circle-o"></i> Antrian</a></li>
							<li><a href="#"><i class="fa fa-circle-o"></i> Laporan per tanggal</a></li>
						</ul>
					</li> -->

					<li class="header">Master Data</li>
					<li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?>><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>

				</ul>
			</section>
		</aside>

		<!-- Content Wrapper -->
		<div class="content-wrapper">
			<?php echo $contents ?>
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.0
			</div>
			<strong>Copyright &copy; <?php echo date("Y") ?> <a href="#">Smart LogBook</a></strong>
		</footer>

	</div>

	<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

	<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#table1').DataTable()
		})
	</script>

</body>

</html>