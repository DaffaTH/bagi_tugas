<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
<?php include 'views/partials/meta.php'; ?>
	<meta property="og:title" content="Surat Generator · BagiTugas">
	<meta property="og:url" content="<?=SITE.PATH?>">
	<base href="<?=SITE?>">
	<title>Surat Generator · BagiTugas</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap">
	<link rel="stylesheet" href="assets/css/main.css?v=<?php include 'views/partials/_version.php'; ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="h-100">

<div style="height: 76px;">
	<div class="input-group py-3 container-fluid">
		<div class="input-group-prepend">
			<span class="input-group-text" id="input-addon"><i class="fas fa-link"></i></span>
		</div>
		<input id="server" type="text" class="form-control" placeholder="Target Server" aria-label="Target Server" aria-describedby="input-addon" value="<?=SITE?>api/generate-surat">
	</div>
</div>

<div id="json" style="height: calc(100% - 76px);">{

	"glob": {
		"kab": "Kabupaten Kayong Utara",
		"alamat": "Jln. Batu Daya I No. 8 Sukadana",
		"footer": "Jln. Batu Daya I No. 8 Sukadana 78852, Telp./Fax. (0534) 3031316\nWebsite:  www.kayongutarakab.bps.go.id  |  E-mail:  bps6111@bps.go.id",
		"tempat": "Sukadana",
		"kpl": {
			"nama": "Duaksa Aritonang SE, MM",
			"nip": "19630904 199103 1 002"
		},
		"ppk": {
			"nama": "Nurul Isnaen Syabani, SST",
			"nip": "19850509 200801 1 002"
		}
	},


	"data": [{
		"no": "29/06/ST/2019",
		"nama": "Nur Azizah SST",
		"nip": "19950212 201701 2 001",
		"jabatan": "Staf Seksi Neraca Wilayah dan Analisis Statistik",
		"golongan": "III/a",
		"pangkat": "Penata Muda",
		"anggota": ["Romida Rumapea SST", "Sithadewi Islami S.Tr.Stat."],
		"tujuan": "Pencacahan PMTB 2019",
		"tempat": "Desa Sutra Kecamatan Sukadana",
		"angkutan": "Kendaraan Pribadi",
		"tgl_mulai": "13 Juni 2019",
		"tgl_akhir": "14 Juni 2019",
		"waktu": "13 s.d. 14 Juni 2019",
		"ttd": {
			"tgl": "12 Juni 2019",
			"nama": "Duaksa Aritonang",
			"NAMA": "DUAKSA ARITONANG",
			"nip": "19630904 199103 1 002"
		}
	},{
		"no": "20/06/ST/PWS/2019",
		"nama": "Sharshe Uni Roselide",
		"nip": "19941024 201701 2 001",
		"jabatan": "Statistisi Pertama Seksi Statistik Sosial",
		"golongan": "III/a",
		"pangkat": "Penata Muda",
		"anggota": "-",
		"tujuan": "Pengawasan Susenas Maret 2019",
		"tempat": "Desa Nipah Kuning Kecamatan Simpang Hilir",
		"angkutan": "Kendaraan Dinas",
		"tgl_mulai": "17 Juni 2019",
		"tgl_akhir": "17 Juni 2019",
		"waktu": "17 Juni 2019",
		"ttd": {
			"tgl": "13 Juni 2019",
			"an": 1,
			"nama": "Ardi Atmaja",
			"NAMA": "ARDI ATMAJA",
			"nip": "19890217 201311 1 001",
			"jabatan": "Kepala Seksi Statistik Distribusi"
		},
		"spd": {
			"no": "12/06/SPD/2019",
			"tingkat_biaya": "C",
			"lama": "1 hari"
		}
	},{
		"no": "44/06/ST/2019",
		"nama": "Muhammad Afifudin SST",
		"nip": "19940923 201701 1 001",
		"jabatan": "Staf Seksi Integrasi Pengolahan dan Diseminasi Statistik",
		"golongan": "III/a",
		"pangkat": "Penata Muda",
		"anggota": ["Juni", "Sharshe", "Isnaen", "Azizah", "Faisal", "Ella", "Romida", "Rosid", "Ria", "Jajad"],
		"tujuan": "Pelatihan Petugas Sakernas Agustus 2019",
		"tempat": "Ketapang",
		"angkutan": "Angkutan Umum",
		"tgl_mulai": "22 Juli 2019",
		"tgl_akhir": "26 Juli 2019",
		"waktu": "22 s.d. 26 Juli 2019",
		"ttd": {
			"tgl": "26 Juni 2019",
			"nama": "Duaksa Aritonang",
			"NAMA": "DUAKSA ARITONANG",
			"nip": "19630904 199103 1 002"
		},
		"spd": {
			"no": "33/SPD/06/2019",
			"tingkat_biaya": "C",
			"lama": "5 hari"
		}
	},{
		"no": "28/06/ST/2019",
		"nama": "Pujo Utomo SST",
		"nip": "19930706 201701 1 002",
		"jabatan": "Statistisi Pertama Seksi Statistik Produksi",
		"golongan": "III/a",
		"pangkat": "Penata Muda",
		"anggota": "-",
		"tujuan": "Pencacahan Sakernas Maret 2019",
		"tempat": "Desa Teluk Melano Kecamatan Simpang Hilir",
		"angkutan": "Kendaraan Pribadi",
		"tgl_mulai": "12 Juni 2019",
		"tgl_akhir": "13 Juni 2019",
		"waktu": "12 s.d. 13 Juni 2019",
		"ttd": {
			"tgl": "12 Juni 2019",
			"plh": 1,
			"nama": "Muhammad Afifudin SST",
			"NAMA": "MUHAMMAD AFIFUDIN SST",
			"nip": "19940923 201701 1 001"
		},
		"spd": {
			"no": "11/SPD/06/2019",
			"tingkat_biaya": "C",
			"lama": "2 hari"
		}
	}]

}
</div>

	<div style="position: fixed; bottom: 12px; right: 32px; z-index: 1000;">
		<button class="btn btn-primary" id="generate-btn">Generate Surat</button>
	</div>

	<script>

		const $server = $('#server');
		const $submit = $('#generate-btn');

		$(()=>{

			editor = ace.edit('json');
			editor.setTheme('ace/theme/monokai');
			editor.setShowPrintMargin(false);
			editor.session.setMode('ace/mode/json');
			editor.getSession().setUseWrapMode(true);

			$submit.click(() => {
				let data = JSON.parse(editor.getValue().replace(/(\r\n|\n|\r|\t)/gm, ''));
				console.info(data);
				postAndDownload($server.val(), data);
			});

			$server.on('input keyup paste', function() {
				if (isURL($server.val())) {
					$submit.prop('disabled', false).removeClass('btn-danger').prop('title', '');
					$server.removeClass('border border-danger');
				}
				else {
					$submit.prop('disabled', true).addClass('btn-danger').prop('title', 'Link tujuan tidak valid');
					$server.addClass('border border-danger');
				}
			});

		});

		const postAndDownload = (url, data) => {
			$(`
				<form action="${url}" method="POST" target="_blank" class="d-none">
					<input type="text" name="data" id="data">
					<input type="submit">
				</form>
			`)
			.appendTo('body')
			.find('#data').val(JSON.stringify(data))
			.next().click()
			.closest('form').remove();
		}

		function isURL(str) {
			var pattern = new RegExp('^((https?:\\/\\/)|(\\/\\/))'+ // protocol
			'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
			'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
			'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
			'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
			'(\\#[-a-z\\d_]*)?$','i'); // fragment locator
			return pattern.test(str);
		}

	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.3/ace.js"></script>

</body>
</html>