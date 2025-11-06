<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'views/partials/meta.php'; ?>
	<meta property="og:title" content="Administrator · Bagitugas">
	<meta property="og:url" content="<?=SITE.PATH?>">
	<base href="<?=SITE?>">
	<title>Administrator · Bagitugas</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap">
	<link rel="stylesheet" href="lib/flaticon/flaticon.css">
	<link rel="stylesheet" href="assets/css/main.css?v=<?php include 'views/partials/_version.php'; ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<?php include 'views/partials/modal.php'; ?>

	<div class="wrapper">

		<div class="main-header">

			<nav class="navbar navbar-header navbar-expand-lg d-flex position-relative" data-background-color="blue2" style="background: #1269DB !important;">
				<a class="navbar-brand text-white font-weight-light" href="">BagiTugas</a>
				<div class="ml-auto pr-lg-2">
<?php include 'views/partials/navbar.php'; ?>
				</div>
			</nav>

		</div>

		<div class="main-panel w-100">

			<div class="content" id="content">

				<div class="page-inner">

					<div class="page-header">
						<h4 class="page-title py-1">Statistik</h4>
					</div>
					<div class="row custom-widget">
						<div class="col-6 col-md-3">
							<div class="card card-dark bg-success-gradient mx-0 mb-4 rounded-lg">
								<div class="card-body curves-shadow">
									<div class="row">
										<div class="col-auto pr-0 pr-sm-1 pr-md-0 pr-lg-1">
											<i class="flaticon-users fz-32 d-none d-sm-block d-md-none d-lg-block"></i>
											<i class="flaticon-users fz-20 mt-1 d-sm-none d-md-block d-lg-none"></i>
										</div>
										<div class="col">
											<h1 class="mb-0 d-none d-sm-block d-md-none d-lg-block" data-stats-pengguna>...</h1>
											<h2 class="mb-0 d-sm-none d-md-block d-lg-none" data-stats-pengguna>...</h2>
											<h5 class="op-8 mb-0">Pengguna</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="card card-dark bg-info-gradient mx-0 mb-4 rounded-lg">
								<div class="card-body skew-shadow">
									<div class="row">
										<div class="col-auto pr-0 pr-sm-1 pr-md-0 pr-lg-1">
											<i class="flaticon-placeholder fz-32 d-none d-sm-block d-md-none d-lg-block"></i>
											<i class="flaticon-placeholder fz-20 mt-1 d-sm-none d-md-block d-lg-none"></i>
										</div>
										<div class="col">
											<h1 class="mb-0 d-none d-sm-block d-md-none d-lg-block" data-stats-satker>...</h1>
											<h2 class="mb-0 d-sm-none d-md-block d-lg-none" data-stats-satker>...</h2>
											<h5 class="op-8 mb-0">Satker</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="card card-dark bg-warning-gradient mx-0 mb-4 rounded-lg">
								<div class="card-body bubble-shadow">
									<div class="row">
										<div class="col-auto pr-0 pr-sm-1 pr-md-0 pr-lg-1">
											<i class="flaticon-list fz-32 d-none d-sm-block d-md-none d-lg-block"></i>
											<i class="flaticon-list fz-20 mt-1 d-sm-none d-md-block d-lg-none"></i>
										</div>
										<div class="col">
											<h1 class="mb-0 d-none d-sm-block d-md-none d-lg-block" data-stats-tugas>...</h1>
											<h2 class="mb-0 d-sm-none d-md-block d-lg-none" data-stats-tugas>...</h2>
											<h5 class="op-8 mb-0">Surat Tugas</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-md-3">
							<div class="card card-dark bg-secondary-gradient mx-0 mb-4 rounded-lg">
								<div class="card-body curves-shadow">
									<div class="row">
										<div class="col-auto pr-0 pr-sm-1 pr-md-0 pr-lg-1">
											<i class="flaticon-database fz-32 d-none d-sm-block d-md-none d-lg-block"></i>
											<i class="flaticon-database fz-20 mt-1 d-sm-none d-md-block d-lg-none"></i>
										</div>
										<div class="col">
											<h1 class="mb-0 d-none d-sm-block d-md-none d-lg-block" data-stats-database>...</h1>
											<h2 class="mb-0 d-sm-none d-md-block d-lg-none" data-stats-database>...</h2>
											<h5 class="op-8 mb-0">Database</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="page-header">
						<h4 class="page-title pb-1 pt-3">Administrator</h4>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Buat Notifikasi</div>
								</div>
								<div class="card-body">
									<div class="d-flex flex-column" style="height: 348px">
										<div>
											<div class="row">
												<div class="col-auto pt-1 pb-2"><i class="fa-fw fas fa-users"></i></div>
												<div class="col pl-0">
													<select class="selectpicker" id="notif-destination" data-width="100%" data-live-search="true" title="Target User" data-actions-box="true" data-style="btn-light btn-sm" multiple data-max-options="100"></select>
												</div>
											</div>
											<div class="row my-2">
												<div class="col-auto fw-600 pt-1 pb-2"><i class="fa-fw fas fa-cog"></i></div>
												<div class="col pl-0">
													<select class="selectpicker" id="notif-icon" data-width="100%" data-style="btn-light btn-sm" data-icon-base="icon"></select>
												</div>
												<div class="col pl-0">
													<select class="selectpicker" id="notif-type" data-width="100%" data-style="btn-light btn-sm"></select>
												</div>
											</div>
											<div class="row">
												<div class="col-auto pt-1 pb-2"><i class="fa-fw fas fa-calendar-alt"></i></div>
												<div class="col pl-0"><input id="notif-expired" type="text" class="form-control form-control-sm"></div>
												<div class="col-auto pl-0"><input id="notif-life" type="text" class="form-control form-control-sm" style="width: 50px" value="1" maxlength="2"></div>
											</div>
										</div>
										<div style="flex: 1 1 100%;">
											<div class="row h-100 pt-2 pb-3">
												<div class="col-auto mt-1"><i class="fa-fw fas fa-bullhorn"></i></div>
												<div class="col pl-0 h-100"><textarea id="notif-msg" class="form-control h-100"></textarea></div>
											</div>
										</div>
										<div class="text-right"><button class="btn btn-default" id="notif-test" onclick="notifTest()"><i class="fas fa-play mr-2"></i>Coba</button><button class="btn btn-success ml-2" id="notif-submit" onclick="notifSubmit()">Submit</button></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Pengguna Aktif</div>
								</div>
								<div class="card-body card-scrollbar">
									<div class="scrollbar-inner">
										<div class="card-list px-3" id="pengguna-aktif"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row card-tools-still-right">
										<div class="card-title">Matriks Kegiatan</div>
										<div class="card-tools">
											<div class="align-items-center pl-2" title="Satker">
												<i class="fas fa-building mr-2"></i>
												<select id="input-matriks-satker" class="selectpicker" data-width="fit" data-live-search="true" title="Pilih Satker" data-style="btn-light btn-sm"></select>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body border-bottom py-2" style="display: none;">
									<div class="row">
										<div class="col"><span class="fw-600 text-primary mr-2" id="satker-settings-nama"></span><span class="fw-300 text-gray" id="satker-settings-alamat"></span></div>
										<div class="col-lg-auto" id="satker-settings-sistem"></div>
										<div class="col-lg-auto pl-lg-0 fw-600" id="satker-total-surat"></div>
									</div>
								</div>
								<div class="card-body p-2">
									<div class="position-relative h-100">
										<div id="gantt" class="border" style="min-height:160px"></div>
									</div>
								</div>
								<div class="card-body border-top py-2" style="display: none;">Terakhir diupdate:<span class="ml-2 text-success" id="satker-terakhir-update"></span></div>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/id.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="lib/datatables/datatables.min.js"></script>
	<script src="lib/atlantis-lite/js/atlantis.mod.js"></script>
	<script src="lib/atlantis-lite/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="lib/jQuery.Gantt.js"></script>

	<script>

		const PEGAWAI = <?=json_encode($data['pegawai'])?>;
		const SETTINGS = <?=json_encode($data['settings'])?>;
		const LIBUR = <?=json_encode($data['libur'])?>;

		const STATS = {
			pengguna: PEGAWAI.filter(a => a.login_terakhir!=='2019-01-01 07:30:00').length,
			satker: SETTINGS.length,
			tugas: <?=$data['total-tugas']?>,
			database: '<?=str_replace('.', ',', $data['database-size'])?> <small>MB</small>',
		};

		const $modal = $('#modal'),
			$modalDialog = $('#modal > .modal-dialog'),
			$modalTitle = $('#modal-title'),
			$modalBody = $('#modal-body'),
			$modalBtn = [$('#modal-footer > .btn-primary'), $('#modal-footer > .btn-default')],
			$modalBtnBefore = $('#modal-footer > .d-flex');

		var modalHiddenAction = false;

		const modal = ({ title, body, data={}, primaryBtn='', primaryBtnLabel='Ok', secondaryBtn='', secondaryBtnLabel='Batal', modalDialog='', misc='' }) => {
			$modalTitle.html(title);
			$modalBody.html(body);
			$modalBtn[0].html(primaryBtnLabel).attr('class','btn btn-primary').addClass(primaryBtn);
			$modalBtn[1].html(secondaryBtnLabel).attr('class','btn btn-default').addClass(secondaryBtn);
			$modalBtnBefore.html(misc);
			$modalDialog.attr('class', 'modal-dialog').addClass(modalDialog);
			return $modal.data(data).modal('show');
		}
		if ($modal.length) $modal
			.on('hidden.bs.modal', e=> { $modalBtn[0].removeData().prop('disabled', false); $modal.removeData(); if (modalHiddenAction) modalHiddenAction(); modalHiddenAction = false; })
			.on('shown.bs.modal', e=> { if ($modal.data('shown.bs.modal')) $modal.data('shown.bs.modal')(); })
			.on('show.bs.modal', e=> { $modal.find('.selectpicker').selectpicker('render'); if ($modal.data('show.bs.modal')) $modal.data('show.bs.modal')(); });

		const notif = (message, type, close=false, settings, options) => {
			if (close) $.notifyClose();
			let icon = 'icon-info';
			if (type==='wait') { icon = 'icon-hourglass'; type = 'info'; }
			if (type==='success') { icon = 'icon-check'; }
			if (type==='danger') { icon = 'icon-exclamation'; }
			$.notify({ message, icon, ...options },{ type, placement: { from: 'bottom' }, animate: { enter: 'animated fadeInUp', exit: 'animated fadeOutDown' }, ...settings });
		}

		const notifSubmit = () => {
			let data = {},
				ok = true;
			$notif.life.val(parseInt($notif.life.val())||'');
			for (a in $notif) {
				data[a] = $notif[a].val();
				if (!data[a].length) { $notif[a].parent().addClass('has-error'); ok = false; } else $notif[a].parent().removeClass('has-error');
			}
			if (data.destination.length>100) { $notif.destination.parent().addClass('has-error'); ok = false; }
			if (ok) {
				$('#notif-submit').prop('disabled', true);
				$.ajax({
					type: 'POST',
					data,
					url: 'api/admin/notify',
					success: res => {
						console.info('Response from admin/notify', res);
						if (res.success) {
							notif('Notifikasi berhasil dikirim', 'success', 1);
							$notif.msg.val(''); $notif.destination.selectpicker('deselectAll').selectpicker('refresh');
						}
						else notif('Terjadi kesalahan', 'danger', 1);
						$('#notif-submit').prop('disabled', false);
					},
					error: e => {
						console.warn(e.status, e.statusText);
						if (window.location.hostname==='localhost') console.error(e.responseText);
						notif('Terjadi kesalahan', 'danger', 1);
						$('#notif-submit').prop('disabled', false)
					}
				});
				notif('Mengirim notifikasi...', 'wait');
			}
		}

		const notifTest = () => {
			let data = {}; for (a in $notif) { data[a] = $notif[a].val() }
			if (data.msg) {
				$notif.msg.parent().removeClass('has-error');
				notif(data.msg, data.type?['info','success','warning','danger'][data.type]:'info', true, { delay: 0 }, { icon: 'icon-'+data.icon });
			}
			else $notif.msg.parent().addClass('has-error');
		}

		const getTugas = satker => {
			$.ajax({
				type: 'POST',
				data: { satker },
				url: 'api/admin/get-tugas',
				success: res => {
					console.info('Response from admin/get-tugas', res);
					if (res.surat) {
						notif('Data tugas terambil', 'success', 1);
						let { nama_bps, sistem, alamat } = SETTINGS.find(a=>a.satker===satker);
						renderGantt({
							pegawai: PEGAWAI.filter(a=>a.satker===satker),
							surat: res.surat,
							libur: LIBUR,
							tglGantt: [moment().subtract(3, 'months').toDate()],
							ganttItems: 100,
							sistem: parseInt(sistem),
						});
						$('#satker-settings-nama').html('BPS '+(nama_bps||'.......'));
						$('#satker-settings-alamat').html(alamat||'');
						$('#satker-settings-sistem').html(['Sistem 1 &nbsp;(ST, ST PWS, SPD)','Sistem 2 &nbsp;(ST, SPD)','Sistem 3 &nbsp;(Custom)'][sistem]).closest('.card-body').slideDown();
						let terakhir_update = res.surat.length? res.surat.sort((a,b)=>moment(a.terakhir_update).isBefore(b.terakhir_update))[0].terakhir_update : PEGAWAI.find(a=>a.satker===satker).login_terakhir;
						$('#satker-terakhir-update').html(moment(terakhir_update).format('D MMMM YYYY [pukul] HH:mm')).parent().slideDown();
						$('#satker-total-surat').html(`[Total: ${res.total_surat||0}]`);
					}
					else notif('Terjadi kesalahan', 'danger', 1);
				},
				error: e => {
					console.warn(e.status, e.statusText);
					if (window.location.hostname==='localhost') console.error(e.responseText);
					notif('Terjadi kesalahan', 'danger', 1);
				}
			});
			notif('Mengambil data tugas...', 'wait');
		}

		moment.updateLocale('id', {
			relativeTime: {
				past: '%s',
			}
		});

		$.fn.datepicker.defaults.maxViewMode = 1;
		$.fn.datepicker.defaults.format = 'yyyy-mm-dd';
		$.fn.datepicker.defaults.startDate = '2019-01-01';
		$.fn.datepicker.defaults.language = 'id';
		$.fn.datepicker.defaults.weekStart = 1;

		const $notif = {
			destination: $('#notif-destination'),
			icon: $('#notif-icon'),
			type: $('#notif-type'),
			expired: $('#notif-expired'),
			life: $('#notif-life'),
			msg: $('#notif-msg'),
		}

		$(()=>{

			$('.scrollbar-inner').scrollbar();

			for (let key in STATS) $(`[data-stats-${key}]`).html(STATS[key].toLocaleString('id-ID'));

			$notif.destination.html('<option value="*" data-content="<span class=\'fw-600 text-primary\'>SEMUA</span>">SEMUA</option>'+PEGAWAI.map((a,i) => `<option value="${a.nipbps}" data-subtext="${a.satker}">${a.nama}</option>`).join(''));
			$notif.icon.html(['info','check','close','exclamation','hourglass','emotsmile','bell','pin','present','like','dislike','bulb','heart','link','star','lock','lock-open','trophy','badge','ghost','fire'].map(a=>`<option value="${a}" data-icon="icon-${a}">${a}</option>`).join(''));
			$notif.type.html(['Info','Success','Warning','Danger'].map((a,i)=>`<option value="${i}" data-content="<span class='text-${a.toLowerCase()}'>${a}</span>">${a}</option>`).join(''));

			$('#pengguna-aktif').html(PEGAWAI.slice(0,100).map(({ nama, nipbps, username, urlfoto, satker, jabatan, login_terakhir }) => `
				<div class="item-list">
					<div class="avatar">
						<img src="https://community.bps.go.id/images/avatar/${urlfoto}" class="avatar-img rounded-circle opos-top">
					</div>
					<div class="info-user mx-3">
						<div class="username mb-0"><span class="mr-2 cur-p desc" data-id="${nipbps}">${nama}</span><span class="text-gray fw-300">${satker}</span></div>
						<div class="status">${jabatan}</div>
					</div>
					<div class="fz-12 text-success pr-1" title="${moment(login_terakhir).format('D MMMM YYYY [pukul] HH:mm')}">${moment(login_terakhir).fromNow()}</div>
				</div>
			`).join(''));

			$notif.expired.val(moment().add(1, 'days').format('YYYY-MM-DD')).datepicker({ startDate: moment().format('YYYY-MM-DD') });

			$('#input-matriks-satker').html(SETTINGS.map(a => `<option data-subtext="${a.nama_bps}" value="${a.satker}">${a.satker}</option>`).join('')).change(function() { getTugas(this.value) });

			$('.selectpicker').selectpicker('refresh');

			setTimeout(() => {
				getTugas('6111');
			}, 400);

		});

		const TODAY = moment().format('DD/MM/YYYY');
		const PREVWEEK = moment().subtract(7, 'days');
		const IS_WEEKEND = moment().day()===0 || moment().day()===6;

		const getNomorSurat = (no, tgl, jenis=null, sistem=0) => {
			let mm = moment(tgl).format('MM'),
				yy = moment(tgl).format('YYYY');
			if (sistem===2) return no.replace('{BB}', mm).replace('{MM}', mm).replace('{TTTT}', yy).replace('{YYYY}', yy);
			if (jenis==='spd') return [no, mm, 'SPD', yy].join('/');
			if (jenis==='pws') return [no, mm, 'ST', 'PWS', yy].join('/');
			return no==='-'? '-' : [no, mm, 'ST', yy].join('/');
		}

		const getWaktu = (mulai, akhir=null) => {
			if (akhir==null || mulai===akhir) return moment(mulai).format('D MMMM YYYY');
			let tMulai = moment(mulai).format('D MMMM YYYY').split(' '),
				tAkhir = moment(akhir).format('D MMMM YYYY').split(' ');
			if (tMulai[2]===tAkhir[2]) return tMulai[1]===tAkhir[1]? tMulai[0]+' s.d. '+tAkhir.join(' ') : tMulai[0]+' '+tMulai[1]+' s.d. '+tAkhir.join(' ');
			return tMulai.join(' ')+' s.d. '+tAkhir.join(' ');
		}

		const ANGKUTAN = ['', 'Kendaraan Dinas', 'Kendaraan Pribadi', 'Angkutan Umum'];
		const COLOR = ['#343a40','#ffe180','#f9bad6','#d2ea95','#ccc','#fcd29a','#b6d5fc'];

		const f0 = 'YYYY-MM-DD';
		const f1 = 'DD/MM/YYYY';
		const f2 = 'D MMMM YYYY';

		const ganttBar = (jenis, spd=true) => ['bg-dark text-white','ganttYellow','ganttRed','ganttGreen','ganttGray','ganttOrange','ganttBlue'][jenis] + (spd?' has-flag':'')

		const ganttColor = jenis => ['text-dark','ganttYellow-text','ganttRed-text','ganttGreen-text','ganttGray-text','ganttOrange-text','ganttBlue-text'][jenis]

		const $gantt = $('#gantt');
		var $ganttTopRow;

		function ganttSticky() {
			let y = $(window).scrollTop()-$gantt.offset().top+14;
			$ganttTopRow && $ganttTopRow.css('top', (y>0? y : 0)+'px');
		}

		$(()=>{
			window.addEventListener('scroll', e => { ganttSticky() });
			$(document).on('click', '.desc[data-id]', function() { modalViewPegawai($(this).data('id')) });
		});

		const renderGantt = ({ pegawai, surat, libur, tglGantt, ganttItems=10, sistem=0 }) => {
			$gantt.gantt({
				source: pegawai.sort((a,b) => a.urutan-b.urutan).map(a => mapPegawaiSurat(a, surat, tglGantt[0])),
				holidays: libur,
				navigate: 'scroll',
				scale: 'days',
				maxScale: 'days',
				minScale: 'days',
				months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
				dow: ['M', 'S', 'S', 'R', 'K', 'J', 'S'],
				waitText: 'Mohon tunggu...',
				scrollToToday: false,
				itemsPerPage: ganttItems,
				dateStart: tglGantt[0]? moment(tglGantt[0]).toDate() : moment().subtract(1, 'months').toDate(),
				dateEnd: tglGantt[1]? moment(tglGantt[1]).toDate() : moment().add(1, 'months').toDate(),
				onItemClick: (data) => { console.log(data); },
				onAddClick: (dt, rowId) => { },
				popover: ({ no, no_spd, pws, tgl, tujuan, tempat, tgl_mulai, tgl_akhir }) => ({
				title: no==='-'? '' : getNomorSurat(no, tgl, pws==1? 'pws' : null, sistem) + (no_spd!=null&&no_spd!='-'? '<div class="d-inline-block mx-1">·</div>'+getNomorSurat(no_spd, tgl, 'spd', sistem) : ''),
				content: popoverBar({ tujuan, tempat, tgl_mulai, tgl_akhir }),
					trigger: 'hover',
					placement: ()=> matchMedia('(min-width: 576px)').matches? 'auto' : 'top',
					html: true,
				}),
				onRender: (core, element) => {
					var $rightPanel = $(element).find(".rightPanel");
					var $dataPanel = $rightPanel.find(".dataPanel");
					var rightPanelWidth = $rightPanel.width();
					var dataPanelWidth = $dataPanel.width();
					var shift = function () { core.repositionLabel(element) };
					if (!element.scrollNavigation.canScroll || !$dataPanel.find(".today").length) { return false }
					var max_left = (dataPanelWidth - rightPanelWidth) * -1;
					var cur_marg = $dataPanel.css("margin-left").replace("px", "");
					var val = $dataPanel.find(".today").offset().left - $dataPanel.offset().left;
					val -= 24*7-1;
					val *= -1;
					if (val > 0) val = 0;
					else if (val < max_left) val = max_left;
					$dataPanel.animate({ "margin-left": val + "px" }, "fast", shift);
					element.scrollNavigation.panelMargin = val;
					setTimeout(core.synchronizeScroller, 200, element);
					ganttNotRendered = false;
					$ganttTopRow = $('#gantt .dataPanel > .row, #gantt .leftPanel > .row.spacer');
				}
			});
		}

		const getUserLevelIcon = (level) => {
			if (level<3) return 'fas fa-certificate text-warning';
			if (level<5) return 'fas fa-star text-warning';
			if (level<6) return 'fas fa-user text-primary';
			return 'far fa-user text-primary';
		};

		const mapPegawaiSurat = ({ nipbps, nip, username, nama, urlfoto, level }, surat, dateStart) => ({
			id: nipbps,
			name: surat
				.find(({ tgl_mulai, tgl_akhir, pelaksana, no_spd }) => IS_WEEKEND || pelaksana.includes(nipbps) && moment().isBetween(tgl_mulai, tgl_akhir, 'day', '[]') && no_spd)
					? '<i class="fa-fw fas fa-fingerprint text-lightgray"></i>'
					: '<i class="fa-fw fas fa-fingerprint text-success"></i>',
			desc: `<i class="fa-fw ${getUserLevelIcon(level)} mr-1"></i> ${nama}`,
			values: surat
				.filter(({ pelaksana }) => pelaksana.includes(nipbps))
				.map(({ no_spd, pws, tgl_mulai, tgl_akhir, jenis, ...rest }) => ({
					from: moment(tgl_mulai).isBefore(dateStart, 'day') ? moment(dateStart).subtract(1, 'days').format() : moment(tgl_mulai).format(),
					to: moment(tgl_akhir).format(),
					dataObj: { no_spd, pws, tgl_mulai, tgl_akhir, jenis, ...rest },
					customClass: ganttBar(jenis, no_spd),
					label: pws==='1'? '<i class="fas fa-user-tie"></i>' : '',
				}))
		});

		const popoverBar = ({ tujuan, tempat, tgl_mulai, tgl_akhir }) => `
			<div class="font-weight-bold">${tujuan}</div>
			<div>di ${tempat}</div>
			<div class="text-muted mt-2"><i class="far fa-calendar-alt mr-2"></i>${getWaktu(tgl_mulai, tgl_akhir)}</div>
		`;

		const modalViewPegawai = nipbps => {
			let { nip, username, nama, urlfoto, satker, pangkat, golongan, seksi, jabatan, level, login_terakhir } = PEGAWAI.find(a=>a.nipbps==nipbps);
			modal({
				title: nama,
				body: `
					<div class="text-center">
						<div class="avatar avatar-xxl">
							<img src="https://community.bps.go.id/images/avatar/${urlfoto}" alt="..." class="avatar-img rounded-circle opos-top">
						</div>
						<h3 class="mt-2 mb-0">${nama}</h3>
						<div class="text-muted mb-2">${jabatan}</div>
						<div class="text-primary"><i class="fas fa-envelope mr-2"></i>${username? username+'@bps.go.id' : '-'}</div>
						<div class="fz-13">NIP. ${nip}<div class="d-inline-block mx-1">/</div>${nipbps}</div>
					</div>
				`,
				primaryBtn: 'd-none',
				secondaryBtnLabel: 'Tutup',
				modalDialog: 'modal-sm',
			})
		}

	</script>

</body>
</html>