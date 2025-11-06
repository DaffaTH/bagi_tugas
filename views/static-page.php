<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'views/partials/meta.php'; ?>
	<meta property="og:title" content="BagiTugas">
	<meta property="og:url" content="<?=SITE.PATH?>">
	<base href="<?=SITE?>">
	<title>BagiTugas</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
	<link rel="stylesheet" href="assets/css/main.css?v=<?php include 'views/partials/_version.php'; ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<div class="wrapper">

		<div class="main-header">

			<nav class="navbar navbar-header navbar-expand-lg d-flex position-relative" data-background-color="blue2" style="background: #1269DB !important;">
				<a class="navbar-brand text-white font-weight-light" href="">BagiTugas</a>
				<div class="ml-auto pr-lg-2">
<?php include 'views/partials/navbar.php'; ?>
				</div>
			</nav>

		</div>

		<div class="main-panel w-100"><div class="content" id="content">

<?php include 'views/static-page-bantuan.php'; ?>

<?php include 'views/static-page-catatan-rilis.php'; ?>

			<div class="page-inner" data-route="statistik" data-title="Statistik · BagiTugas" style="display:none">
				<div class="page-header">
					<h4 class="page-title py-1">Statistik</h4>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header"><div class="card-title">Bulan Lalu</div></div>
							<div class="card-body"><div id="chart-bulan-lalu" style="height: 250px"><span class="text-gray">Tidak ada data</span></div></div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="card">
							<div class="card-header"><div class="card-title">Bulan Ini</div></div>
							<div class="card-body"><div id="chart-bulan-ini" style="height: 250px"><span class="text-gray">Tidak ada data</span></div></div>
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

		</div></div>

	</div>

	<script>
		const PEGAWAI = <?=json_encode($data['pegawai'])?>;
		const SURAT = <?=json_encode($data['surat']??[])?>;
		$(()=>{ $('#penomoran-custom-contoh').html(`123/${moment().format('MM')}/ST/${moment().format('YYYY')}`) });
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<?php if (Auth::isLoggedIn()) { ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/7.0.3/highcharts.js"></script>
<?php } ?>
	<script src="assets/js/static-page.js?v=<?php include 'views/partials/_version.php'; ?>"></script>

</body>
</html>