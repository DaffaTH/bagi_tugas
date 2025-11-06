<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'views/partials/meta.php'; ?>
	<meta property="og:title" content="BagiTugas">
	<meta property="og:url" content="<?=SITE.PATH?>">
	<base href="<?=SITE?>">
	<title>BagiTugas</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/css/dataTables.bootstrap4.min.css"> -->
	<link rel="stylesheet" href="lib/datatables/datatables.min.css">
	<link rel="stylesheet" href="assets/css/main.css?v=<?php include 'views/partials/_version.php'; ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php include 'views/partials/modal.php'; ?>

	<div class="wrapper sidebar_minimize">

		<div class="main-header">

			<div class="logo-header" data-background-color="blue">
				<a href="" data-custom-link="true" data-group="main" class="logo d-lg-none"><span class="text-white font-weight-light mr-4">BagiTugas</span></a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>

			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<a class="navbar-brand text-white font-weight-light d-none d-lg-block" href="" data-custom-link="true" data-group="main">BagiTugas</a>
				<div class="container-fluid pr-lg-2">
<?php include 'views/partials/navbar.php'; ?>
				</div>
			</nav>

		</div>

		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary" id="nav">
						<li class="nav-item">
							<a href="" data-custom-link="true" data-group="main">
								<i class="icon-calendar"></i><p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="daftar-tugas" data-custom-link="true" data-group="main">
								<i class="icon-docs"></i><p>Daftar Tugas</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="daftar-pegawai" data-custom-link="true" data-group="main">
								<i class="icon-organization"></i><p>Daftar Pegawai</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="statistik" data-group="main">
								<i class="icon-chart"></i><p>Statistik</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="pengaturan" data-custom-link="true" data-group="main">
								<i class="icon-settings"></i><p>Pengaturan</p>
							</a>
						</li>
						<li class="nav-item">
							<div style="margin: 12px 0; border-top: 1px solid #f1f1f1;"></div>
						</li>
						<li class="nav-item <?=preg_match('/^bps\d{4}$/', $_SESSION[AUTH]['nipbps'])?'d-none':''?>">
							<a href="tugas-saya" data-custom-link="true" data-group="main">
								<i class="icon-briefcase"></i><p>Tugas Saya</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="akun-saya" data-custom-link="true" data-group="main">
								<i class="icon-user"></i><p>Akun Saya</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-panel">

			<div class="content" id="content">

				<div class="page-inner" data-route="" data-title="BagiTugas" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1">Dashboard</h4>
						<div class="card-tools ml-auto">
							<a href="pengaturan" data-custom-link="true" data-group="main" class="btn btn-info btn-border btn-round cur-p mr-2" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Pengaturan"><i class="fas fa-cogs fa-fw"></i></a>
							<div class="btn btn-info btn-border btn-round cur-p set-tgl-btn" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Atur Rentang Waktu"><i class="fas fa-calendar-alt fa-fw"></i></div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="card-head-row card-tools-still-right">
								<div class="card-title">Matriks Kegiatan</div>
								<div class="card-tools">
									<div class="d-none d-sm-flex align-items-center pl-2" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Jumlah pegawai yang ditampilkan per halaman">
										<i class="fas fa-users mr-2"></i>
										<select class="custom-select custom-select-sm" onchange="(function(a){ ganttItems=a; renderGantt({ pegawai, surat, libur, tglGantt, ganttItems }); })(this.value)">
											<option value="10">10</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="999" selected>Semua</option>
										</select>
									</div>
									<div class="d-flex d-sm-none align-items-center pl-2" title="Jumlah pegawai yang ditampilkan per halaman">
										<i class="fas fa-users mr-2"></i>
										<select class="custom-select custom-select-sm" onchange="(function(a){ ganttItems=a; renderGantt({ pegawai, surat, libur, tglGantt, ganttItems }); })(this.value)">
											<option value="10">10</option>
											<option value="50">50</option>
											<option value="100">100</option>
											<option value="999" selected>Semua</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body p-2">
							<div class="position-relative h-100">
								<div id="gantt" class="border" style="min-height:160px"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xl-4" id="panel-tugas">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<div class="card-title">Tugas</div>
										<div class="card-tools">
											<div class="btn btn-info btn-border btn-round cur-p buat-st-btn" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Buat Baru"><i class="fas fa-plus fa-fw"></i></div>
										</div>
									</div>
								</div>
								<div class="card-body card-scrollbar daftar-tugas"><div class="scrollbar-inner" id="daftar-st"></div></div>
							</div>
						</div>
						<div class="col-md-6 col-xl-4 without-st-pws-hidden" id="panel-tugas-pengawasan">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<div class="card-title">Tugas Pengawasan</div>
										<div class="card-tools">
											<div class="btn btn-info btn-border btn-round cur-p buat-pws-btn" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Buat Baru"><i class="fas fa-plus fa-fw"></i></div>
										</div>
									</div>
								</div>
								<div class="card-body card-scrollbar daftar-tugas"><div class="scrollbar-inner" id="daftar-pws"></div></div>
							</div>
						</div>
						<div class="col-md-6 col-xl-4" id="panel-perjalanan-dinas">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<div class="card-title">Perjalanan Dinas</div>
									</div>
								</div>
								<div class="card-body card-scrollbar daftar-tugas"><div class="scrollbar-inner" id="daftar-spd"></div></div>
							</div>
						</div>
					</div>
				</div>

				<div class="page-inner" data-route="daftar-tugas" data-title="Daftar Tugas · BagiTugas" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1">Daftar Tugas</h4>
						<div class="card-tools ml-auto">
							<div class="btn btn-success btn-border btn-round cur-p" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Export ke Excel" onclick="exportSurat()"><i class="fas fa-file-excel fa-fw"></i></div>
						</div>
						<div class="card-tools ml-2">
							<div class="btn btn-info btn-border btn-round cur-p set-tgl-btn" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Atur Rentang Waktu"><i class="fas fa-calendar-alt fa-fw"></i></div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<table class="table table-hover table-sm w-100" id="table-surat"></table>
						</div>
					</div>
					<button class="btn btn-sm btn-round btn-info position-fixed" style="bottom:15px;display:none;" onclick="downloadSelectedSurat()">
						<div id="download-btn" class="container">Download</div>
					</button>
				</div>

				<div class="page-inner pb-0" data-route="daftar-pegawai" data-title="Daftar Pegawai · BagiTugas" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1">Daftar Pegawai</h4>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="card-head-row card-tools-still-right">
								<div class="card-title">Organik</div>
								<div class="card-tools">
<?php if ($_SESSION[AUTH]['level']<5) { ?>
									<div class="btn btn-info btn-border btn-round cur-p tambah-pegawai-btn" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Tambah Data Pegawai Organik"><i class="fas fa-plus fa-fw"></i></div>
<?php } ?>
									<!-- <div id="refresh-data-pegawai-btn" class="btn btn-success btn-border btn-round cur-p ml-2" data-toggle="tooltip" data-trigger="hover" data-placement="left" title="Refresh Data Pegawai Organik"><i class="fas fa-sync fa-fw"></i></div> -->
								</div>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm w-100" id="table-pegawai"></table>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="card-head-row card-tools-still-right">
								<div class="card-title">Mitra</div>
								<div class="card-tools">
									<div class="d-flex">
<?php if ($_SESSION[AUTH]['level']<5) { ?>
										<a href="javascript:void(0)" class="btn btn-info btn-border btn-round cur-p mr-2 tambah-mitra-btn" data-toggle="tooltip" data-trigger="hover" title="Tambah Mitra Baru"><i class="fas fa-plus fa-fw"></i></a>
<?php } ?>
										<a href="javascript:void(0)" class="btn btn-success btn-border btn-round cur-p" onclick="exportMitra()" data-toggle="tooltip" data-trigger="hover" title="Export"><i class="fas fa-file-excel fa-fw"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-hover table-sm w-100" id="table-mitra"></table>
						</div>
					</div>
				</div>

				<div class="page-inner" data-route="pengaturan" data-title="Pengaturan · BagiTugas" style="display:none">
					<div class="row">
						<div class="col-xl-8">
							<div class="page-header">
								<h4 class="page-title py-1">Pengaturan</h4>
							</div>
							<div class="card">
								<div class="card-body">
									<div class="row" id="setting"></div>
<?php if ($_SESSION[AUTH]['level']<5) { ?>
									<div class="mt-3">
										<button class="btn btn-primary float-right" onclick="modalEditSetting()"><i class="fas fa-pencil-alt mr-2"></i>Edit</button>
									</div>
<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="page-header">
								<h4 class="page-title py-1">Template Dokumen</h4>
							</div>
							<div class="card">
								<div class="card-body">
									<div id="setting-template"></div>
								</div>
<?php if ($_SESSION[AUTH]['level']<5) { ?>
								<div class="card-footer">
									<button class="btn btn-primary" onclick="modalUploadTemplate()">Ubah Template Dokumen</button>
								</div>
<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="page-inner" data-route="tugas-saya" data-title="Tugas Saya · BagiTugas" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1">Tugas Saya</h4>
					</div>
					<div class="card">
						<div class="card-body">
							<div id="calendar" class="calendar-custom calendar-single-year"></div>
						</div>
					</div>
				</div>

				<div class="page-inner" data-route="akun-saya" data-title="Akun Saya · BagiTugas" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1">Akun Saya</h4>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row" id="akun-saya-container-1">
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Nama</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="nama" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Username</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="username" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Peran</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0"><input name="peran" type="text" class="form-control form-control-sm" readonly></div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row" id="akun-saya-container-2">
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">NIP</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="nip" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">NIP BPS</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="nipbps" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Email</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="email" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Jabatan</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="jabatan" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Golongan</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0 mb-2"><input name="golongan" type="text" class="form-control form-control-sm" readonly></div>
								<div class="col-5 col-sm-3 col-xl-2 mb-2 text-right fw-600 mt-1">Pangkat</div>
								<div class="col-7 col-sm-9 col-xl-10 pl-0"><input name="pangkat" type="text" class="form-control form-control-sm" readonly></div>
							</div>
						</div>
					</div>
				</div>

				<div class="page-inner" data-route="404" data-title="Halaman Tidak Ditemukan" style="display:none">
					<div class="page-header">
						<h4 class="page-title py-1" style="color: #cacedb; font-weight: 600;">Error 404</h4>
					</div>
					<p class="fz-16 text-gray mb-5">Halaman tidak dapat ditemukan :(</p>
				</div>

			</div>

		</div>

	</div>


	<script>

		var pegawai = <?=json_encode($data['pegawai'])?>,
			mitra = <?=json_encode($data['mitra'])?>,
			surat = <?=json_encode($data['surat'])?>,
			libur = <?=json_encode($data['libur'])?>,
			setting = <?=json_encode($data['setting'])?>,
			template = <?=json_encode($data['template'])?>,
			glob = {};

		const SATKER = '<?=$_SESSION[AUTH]['satker']?>';
		const NIP = '<?=$_SESSION[AUTH]['nipbps']?>';
		const LV = <?=$_SESSION[AUTH]['level']?>;
		const NEXTMONTH = '<?=date('d/m/Y', strtotime('+30 day'))?>';
		const DEV = <?=DEV? 'true' : 'false'?>;

<?php if ($_SESSION['first-login']) { ?>
		$(()=>{
			notif('Selamat datang di aplikasi <span class="fw-600">BagiTugas</span>!', 'success', false, {}, { icon: 'icon-emotsmile' });
			setTimeout(function() {
				notif('Ini adalah pertama kalinya Anda login. Kami merekomendasikan Anda untuk membaca dulu panduan penggunaan pada halaman <a href="bantuan">Bantuan</a>.', 'info', false, { delay: 0 }, { icon: 'icon-emotsmile' });
			}, 5000);
		});

<?php } elseif ($_SESSION['notif']) { ?>
		$(()=>{
			notif('<?=$_SESSION['notif']['msg']?>', '<?=$_SESSION['notif']['type']?['info','success','warning','danger'][$_SESSION['notif']['type']]:'info'?>', false, { delay: 0 }, { icon: 'icon-<?=$_SESSION['notif']['icon']?$_SESSION['notif']['icon']:'info'?>' });
		});

<?php } unset($_SESSION['first-login']); unset($_SESSION['notif']); ?>
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/shim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.1/xlsx.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.5.3/cleave.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.0.4/firebase-firestore.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-select/1.3.1/dataTables.select.min.js"></script>
	<script src="https://unpkg.com/js-year-calendar@1/dist/js-year-calendar.min.js"></script>
	<script>Calendar.locales['en'] = { days: ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"], daysShort: ["Min","Sen","Sel","Rab","Kam","Jum","Sab"], daysMin: ["M","S","S","R","K","J","S"], months: ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"], monthsShort: ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des"], weekShort: 'M', weekStart: 1 };</script>
	<script src="lib/terbilang.min.js"></script>
	<script src="assets/js/main.js?v=<?php include 'views/partials/_version.php'; ?>"></script>

</body>
</html>