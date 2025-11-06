const modalDaftarSatker = () => {
	$('.modal').modal('hide');
	$('#modal-daftar-satker').modal('show');
}

const modalTentang = () => {
	$('.modal').modal('hide');
	$('#modal-tentang').modal('show');
}

const updateForms = (loading=true) => {
	if (loading) {
		$('#modal-daftar-satker').modal('hide');
		$('#daftar-satker-btn').prop('disabled', true).html('Mendaftarkan...');
		$('#login-btn, input').prop('disabled', true);
	} else {
		$('#daftar-satker-btn').prop('disabled', false).html('Daftar');
		$('#login-btn, input').prop('disabled', false);
	}
}

const daftarSatker = (satker, user) => {
	let ok =1 ;
	if (!/\d{4}/.test(satker)) { $('#modal-daftar-satker [name=satker]').parent().addClass('has-error'); ok=false; }
	else { $('#modal-daftar-satker [name=satker]').parent().removeClass('has-error'); }
	if (!/\d{9}/.test(user) && !/\d{18}/.test(user)) { $('#modal-daftar-satker [name=user]').parent().addClass('has-error'); ok=false; }
	else { $('#modal-daftar-satker [name=user]').parent().removeClass('has-error'); }
	if (!ok) return;

	$.ajax({
		type: 'POST',
		url: registrationUrl,
		data: { satker, user, isSatkerRegistered: satkerTerdaftar.includes(satker) },
		success: res => {
			console.info(res);
			$.notifyClose();
			if (res.status==='SUCCESS') $.notify({ message: "Registrasi berhasil", icon: "icon-check" }, { type: "success" });
			else if (res.status==='ERROR') $.notify({ message: res.message, icon: "icon-exclamation" }, { type: "danger" });
			else $.notify({ message: "Registrasi gagal", icon: "icon-exclamation" }, { type: "danger" });
			updateForms(0);
		},
		error: e => {
			console.warn(e.status, e.statusText); if (window.location.hostname==='localhost') console.error(e.responseText);
			$.notifyClose(); $.notify({ message: "Ooops... terjadi kesalahan pada server", icon: "icon-exclamation" }, { type: "danger" });
			updateForms(0);
		},
	});

	updateForms();
	$.notify({ message: "Harap tunggu...", icon: "icon-hourglass" }, { type: "info", allow_dismiss: false, delay: 0 });
}

$(()=>{

	$('[data-toggle="tooltip"]').tooltip();

	$('#modal-daftar-satker').on('shown.bs.modal', () => { $('#modal-daftar-satker .form-control:first').focus() });

	$('#daftar-satker-form').submit(function(e) { e.preventDefault(); daftarSatker($(this).find('[name=satker]').val(), $(this).find('[name=user]').val()); });

});
