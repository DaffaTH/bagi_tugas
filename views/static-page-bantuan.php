			<div class="page-inner" data-route="bantuan" data-title="Bantuan · BagiTugas" style="display:none">
				<div class="row">
					<div class="col-xl-9">
						<div class="page-header">
							<h4 class="page-title py-1">Intro</h4>
						</div>
						<div style="position: relative; width: 100%; height: 0; padding-bottom: 56.25%; background: #ccc">
							<iframe style="position: absolute; left: 0; top: 0; width: 100%; height: 100%;" src="https://www.youtube.com/embed/q7Lbn_JtLdw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<br>
						<p><span class="fw-600 text-primary">BagiTugas</span> merupakan aplikasi berbasis <i>website</i> yang dikembangkan oleh <a href="https://kayongutarakab.bps.go.id" target="_blank">BPS Kabupaten Kayong Utara</a>. Aplikasi ini dibuat untuk menjalankan fungsi utamanya yaitu untuk manajemen surat tugas dan surat perjalanan dinas, serta menjalankan fungsi-fungsi pendukung seperti pengelolaan <i>database</i> pegawai organik & mitra. Aplikasi ini dapat digunakan oleh seluruh BPS kabupaten/kota dan BPS provinsi. Adapun fitur-fitur yang tercakup di dalam aplikasi ini adalah sebagai berikut:</p>
						<ul>
							<li>
								<p><b class="fz-17">Manajemen Surat Tugas</b><br>Aplikasi ini dapat menyimpan, mengedit, dan menghapus data surat tugas atau surat perjalanan dinas.</p>
							</li>
							<li>
								<p><b class="fz-17">Penomoran Otomatis Surat Tugas</b><br>Aplikasi ini dapat melakukan penomoran otomatis pada surat tugas atau surat perjalanan dinas yang akan dibuat.</p>
							</li>
							<li>
								<p><b class="fz-17">Validasi Surat Tugas</b><br>Aplikasi ini dapat melakukan validasi data surat tugas atau surat perjalanan dinas berdasarkan pada <i>rule</i> yang telah ditetapkan pada aplikasi.</p>
							</li>
							<li>
								<p class="mb-2"><b class="fz-17">Visualisasi Pembagian Tugas dengan Gantt Chart</b><br>Untuk mempermudah pengguna dalam melihat pembagian tugas beserta jadwal pelaksanaannya, aplikasi ini menyediakan visualisasi yang interaktif dalam bentuk <i>gantt chart</i>.</p>
								<p class="img-container li-child"><img src="assets/img/bantuan/bagitugas-gantt.gif"></p>
							</li>
							<li>
								<p><b class="fz-17">Visualisasi Jadwal Tugas dalam Bentuk Kalender</b><br>Selain <i>gantt chart</i>, aplikasi ini juga menyediakan visualisasi dalam bentuk kalender untuk mempermudah melihat jadwal tugas yang telah diberikan.</p>
							</li>
							<li>
								<p><b class="fz-17">Membuat Surat Tugas</b><br>Aplikasi ini dapat membuat (<i>generate</i>) file surat tugas atau surat perjalanan dinas yang siap untuk dicetak.</p>
							</li>
							<li>
								<p><b class="fz-17">Ekspor Data Surat Tugas</b><br>Data surat tugas atau surat perjalanan dinas yang telah dibuat dapat diekspor ke dalam file Excel.</p>
							</li>
							<li>
								<p><b class="fz-17">Mengelola Database Pegawai</b><br>Aplikasi ini dapat mengelola <i>database</i> organik dan mitra.</p>
							</li>
						</ul>
						<hr class="my-4">
						<div class="page-header" id="penomoran-surat">
							<h4 class="page-title py-1">Sistem Penomoran Surat</h4>
						</div>
						<p>Terdapat 3 pengaturan sistem penomoran surat yang dapat dipakai:</p>
						<ul>
							<li>
								<p class="fz-17 mb-1"><b>Sistem 1</b><span class="badge badge-primary ml-2">ST</span> <span class="badge badge-info">ST PWS</span> <span class="badge badge-success">SPD</span></p>
								<p class="mb-1">Terdapat 3 macam surat, yaitu Surat Tugas (ST), Surat Tugas Pengawasan (ST PWS), dan Surat Perjalanan Dinas (SPD).
								Surat Tugas dibedakan menjadi 2, yaitu Surat Tugas biasa (misal pencacahan, konsultasi teknis, dll) dan Surat Tugas untuk kegiatan pegawasan. Surat Perjalanan Dinas memiliki sistem penomoran tersendiri, terpisah dari penomoran Surat Tugasnya. Sistem ini mengikuti aturan penomoran Surat Tugas dan Surat Perjalanan Dinas di BPS Kabupaten Kayong Utara. Adapun pola nomor surat sistem 1 adalah sebagai berikut:</p>
								<table class="mb-3">
									<tr>
										<td>ST</td>
										<td class="px-1 px-sm-2">→</td>
										<td class="fw-600"><span class="text-danger" data-toggle="tooltip" title="Nomor Surat Tugas">no</span>/<span class="text-success fw-400" data-toggle="tooltip" title="2 digit bulan">MM</span>/ST/<span class="text-success fw-400" data-toggle="tooltip" title="4 digit tahun">YYYY</span></td>
									</tr>
									<tr>
										<td>ST Pengawasan</td>
										<td class="px-1 px-sm-2">→</td>
										<td class="fw-600"><span class="text-danger" data-toggle="tooltip" title="Nomor Surat Tugas Pengawasan">no</span>/<span class="text-success fw-400" data-toggle="tooltip" title="2 digit bulan">MM</span>/ST/PWS/<span class="text-success fw-400" data-toggle="tooltip" title="4 digit tahun">YYYY</span></td>
									</tr>
									<tr>
										<td>SPD</td>
										<td class="px-1 px-sm-2">→</td>
										<td class="fw-600"><span class="text-danger" data-toggle="tooltip" title="Nomor Surat Perjalanan Dinas">no</span>/<span class="text-success fw-400" data-toggle="tooltip" title="2 digit bulan">MM</span>/SPD/<span class="text-success fw-400" data-toggle="tooltip" title="4 digit tahun">YYYY</span></td>
									</tr>
								</table>
							</li>
							<li class="pt-1">
								<p class="fz-17 mb-1"><b>Sistem 2</b><span class="badge badge-primary ml-2">ST</span> <span class="badge badge-success">SPD</span></p>
								<p class="mb-1">Hanya terdapat 2 macam surat, yaitu Surat Tugas (ST) dan Surat Perjalanan Dinas (SPD). Surat Tugas & Surat Perjalanan Dinas memiliki sistem penomoran yang terpisah. Adapun pola nomor surat sistem 2 adalah sebagai berikut:</p>
								<table class="mb-3">
									<tr>
										<td>ST</td>
										<td class="px-1 px-sm-2">→</td>
										<td class="fw-600"><span class="text-danger" data-toggle="tooltip" title="Nomor Surat Tugas">no</span>/<span class="text-success fw-400" data-toggle="tooltip" title="2 digit bulan">MM</span>/ST/<span class="text-success fw-400" data-toggle="tooltip" title="4 digit tahun">YYYY</span></td>
									</tr>
									<tr>
										<td>SPD</td>
										<td class="px-1 px-sm-2">→</td>
										<td class="fw-600"><span class="text-danger" data-toggle="tooltip" title="Nomor Surat Perjalanan Dinas">no</span>/<span class="text-success fw-400" data-toggle="tooltip" title="2 digit bulan">MM</span>/SPD/<span class="text-success fw-400" data-toggle="tooltip" title="4 digit tahun">YYYY</span></td>
									</tr>
								</table>
							</li>
							<li class="pt-1" id="penomoran-surat-custom">
								<p class="fz-17 mb-1"><b>Sistem 3</b><span class="badge badge-default ml-2">Custom</span></p>
								<p class="mb-2">Sistem penomoran Surat Tugas dan Surat Perjalanan Dinas bebas, dapat disesuaikan dengan kondisi masing-masing satker. Pada sistem ini, fitur penomoran otomatis dihilangkan. Pada sistem penomoran custom, nomor surat ditulis secara lengkap, misal: <span class="fw-600">123/06/ST/2019</span>.</p>
								<div class="alert alert-info mb-4" role="alert">Anda dapat menggunakan karakter template "<span class="text-success fw-600">{MM}</span>" untuk mendapatkan 2 digit bulan dan "<span class="text-success fw-600">{YYYY}</span>" untuk mendapatkan 4 digit tahun sesuai tanggal surat.<br>Contoh: tuliskan <span class="fw-600">123/{MM}/ST/{YYYY}</span>, maka aplikasi otomatis akan menggantinya dengan <span class="fw-600" id="penomoran-custom-contoh">123/{MM}/ST/{YYYY}</span>.</div>
							</li>
						</ul>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Mendaftarkan Satker</h4>
						</div>
						<p>Sebelum memulai menggunakan aplikasi <span class="fw-600 text-primary">BagiTugas</span>, Anda perlu mendaftarkan satker Anda terlebih dahulu. Pendaftaran satker dapat dilakukan melalui halaman <a href="login">login</a>, pada menu "Daftarkan Satker" di bagian bawah. Isi formulir 4 digit kode satker dan username Anda, kemudian klik tombol Daftar. Aplikasi akan mengambil data pegawai dari <span class="text-primary">community.bps.go.id</span>, proses ini biasanya membutuhkan waktu cukup lama. Setelah proses pendaftaran sudah selesai dan berhasil, Anda dapat login menggunakan akun Anda.</p>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Pengaturan Awal</h4>
						</div>
						<p>Setelah proses pendaftaran selesai, terdapat beberapa pengaturan pada halaman <a href="pengaturan">Pengaturan</a> yang perlu disesuaikan dengan satker Anda, yaitu sistem penomoran surat, nama kabupaten/kota, kepala BPS, Pejabat Pembuat Komitmen (PPK), alamat BPS, alamat yang akan di tampilkan pada tanda tangan surat, dan footer surat.</p>
						<div class="alert alert-warning mb-4" role="alert">Pengubahan pengaturan hanya dapat dilakukan oleh Administrator.</div>
						<p class="img-container"><img src="assets/img/bantuan/bagitugas-pengaturan.gif"></p>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Mengelola Database Pegawai</h4>
						</div>
						<p>Aplikasi ini membutuhkan <i>database</i> pegawai untuk menjalankan fitur utamanya. Dengan demikian, aplikasi ini menyediakan tempat untuk menelola <i>database</i> pegawai organik maupun mitra. Untuk pegawai organik, aplikasi ini akan mengambil data dari <i>website</i> <span class="text-primary">community.bps.go.id</span> pada saat pendaftaran satker. Data pegawai organik hanya dapat diedit, data tersebut tidak dapat ditambah ataupun dikurangi. Adapun data pegawai organik yang disimpan di aplikasi adalah sebagai berikut:</p>
						<table class="table text-darkgray">
							<thead>
								<tr><th width="1" class="pr-4">Variabel</th><th>Keterangan</th></tr>
							</thead>
							<tbody>
								<tr><td class="align-top">No Urut</td><td>Nomor urut digunakan untuk menentukan urutan pegawai yang akan ditampilkan pada <i>gantt chart</i>.</td></tr>
								<tr><td class="align-top">NIP BPS</td><td>Terdiri dari 9 digit, data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">NIP</td><td>Terdiri dari 18 digit, data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">Username</td><td>Data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">Email</td><td>Data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">Nama</td><td>Data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">URL Foto</td><td>Alamat foto profil di <span class="text-primary">community.bps.go.id</span>, data ini diperoleh dari <i>Community</i> dan tidak dapat diubah.</td></tr>
								<tr><td class="align-top">Pangkat</td><td>Data pangkat (berdasarkan golongan).</td></tr>
								<tr><td class="align-top">Golongan</td><td>Data golongan PNS.</td></tr>
								<tr><td class="align-top">Jabatan</td><td>Data jabatan di satker.</td></tr>
								<tr>
									<td class="align-top">Peran</td>
									<td>
										Peran dalam aplikasi, terbagi menjadi:
										<ul style="padding-left: 1.5rem; list-style-type: square; margin-bottom: 0;">
											<li><span class="fw-600">Viewer</span>: hanya mampu melihat daftar tugas dan mendownload surat tugas, viewer tidak dapat membuat surat tugas maupun mengelola <i>database</i> pegawai.</li>
											<li><span class="fw-600">Editor</span>: mampu membuat, mengedit, menghapus, dan mendownload surat tugas, namun tidak dapat mengelola data pegawai atau mengubah pengaturan.</li>
											<li><span class="fw-600">Administrator</span>: mampu menjalankan peran editor, sekaligus mampu mengelola data pegawai dan mengubah pengaturan.</li>
										</ul>
									</td>
								</tr>
							</tbody>
						</table>
						<p>Untuk melakukan edit data pegawai organik, <span class="fw-600">administrator</span> dapat membuka halaman <span class="text-primary">Daftar Pegawai</span>. Kemudian pada tabel pegawai organik, klik tombol edit <span class="d-inline-block">( <i class="fas fa-pen text-primary"></i> )</span> sehingga jendela edit pegawai muncul. Isikan data kemudian klik tombol Simpan.</p>
						<p>Selain <i>database</i> pegawai organik BPS, aplikasi <span class="fw-600 text-primary">BagiTugas</span> juga menyediakan fitur untuk mengelola <i>database</i> pegawai mitra BPS. Data mitra yang dapat disimpan di aplikasi yaitu nama mitra, asal kecamatan & desa/kelurahan, nomor hape, Nomor Induk Kependudukan (NIK), nomor rekening, dan NPWP. Untuk menambahkan data mitra, klik tombol Tambah Mitra Baru <span class="d-inline-block">( <i class="fas fa-plus text-primary"></i> )</span>. Selanjutnya isikan data kemudian klik tombol Simpan. Untuk mengedit data mitra, klik tombol edit <span class="d-inline-block">( <i class="fas fa-pen text-primary"></i> )</span>, ubah data dan kemudian klik tombol Simpan Perubahan. Untuk menghapus mitra, klik tombol hapus <span class="d-inline-block">( <i class="fas fa-trash text-danger"></i> )</span> kemudian konfirmasi penghapusan mitra.</p>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Manajemen Surat Tugas</h4>
						</div>
						<p>Editor dan administrator dapat memberikan tugas kepada pegawai organik ataupun mitra (yang telah ditambahkan). Untuk membuat surat tugas baru, klik tanggal yang masih kosong pada <i>gantt chart</i> yang tersedia, atau klik tombol Buat Baru <span class="d-inline-block">( <i class="fas fa-plus text-primary"></i> )</span> pada panel Tugas / Tugas Pengawasan. Jendela Buat Surat Tugas akan muncul, kemudian lengkapi isian formulir surat tugas. Jika tugas membutuhkan perjalanan dinas, maka aktifkan opsi Perjalanan Dinas dan isikan nomor Surat Perjalanan Dinas (SPD). Klik tombol Simpan jika semua isian sudah terisi. Aplikasi akan melakukan proses penyimpanan data surat tugas dan menampilkan surat tugas yang telah tersimpan.</p>
						<p>Untuk melakukan edit surat tugas, klik tugas yang ada pada <i>gantt chart</i> yang ingin diedit, atau klik surat tugas yang ingin diedit pada panel Tugas / Tugas Pengawasan. Jendela Edit Surat akan muncul. Ubah isian pada formulir surat tugas, kemudian klik Simpan Perubahan. Aplikasi akan melakukan proses penyimpanan data surat tugas dan memperbarui tampilan daftar surat tugas.</p>
						<div class="alert alert-info" role="alert">
							<div class="fw-600">Catatan:</div>
							<ul style="padding-left: 1.5rem; list-style-type: square; margin-bottom: 0;">
								<li>Isikan strip (-) pada nomor SPD jika melakukan perjalanan dinas yang biayanya tidak dibebankan pada kantor (yang tidak perlu SPD dari kantor).</li>
								<li>Viewer tidak dapat membuat atau mengedit surat tugas, viewer hanya dapat mengunduh surat tugas.</li>
								<li>Editor hanya dapat membuat atau mengedit surat tugas pada rentang waktu H-7 sampai H+30 dari hari ini.</li>
								<li>Editor hanya dapat mengedit atau menghapus surat tugas yang dibuat sendiri atau yang dibuat oleh teman satu seksi.</li>
								<li>Administrator dapat mengedit atau menghapus semua surat tugas tanpa batasan rentang waktu.</li>
								<li>Tanggal tanda tangan surat tugas harus sebelum atau sama dengan tanggal mulai pelaksanaan tugas.</li>
							</ul>
						</div>
						<p>Untuk menghapus surat tugas, klik tugas yang ada pada <i>gantt chart</i> yang ingin dihapus, atau klik surat tugas yang ingin dihapus pada panel Tugas / Tugas Pengawasan. Jendela konfirmasi penghapusan surat akan muncul. Klik Ya jika akan melanjutkan penghapusan surat. Surat yang telah dihapus tidak dapat dikembalikan lagi.</p>
						<p class="img-container"><img src="assets/img/bantuan/bagitugas-buat-edit-surat.gif"></p>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Generate (& Unduh) Surat Tugas</h4>
						</div>
						<p>Aplikasi <span class="fw-600 text-primary">BagiTugas</span> dapat melakukan <i>generate</i> surat tugas dan surat perjalanan dinas ke dalam file DOCX yang dapat diunduh. Surat tugas dapat diunduh oleh administrator, editor, ataupun viewer. Surat tugas dapat diunduh melalui halaman <i class="icon-calendar"></i> <a href="">Dashboard</a>, halaman <i class="icon-docs"></i> <a href="daftar-tugas">Daftar Tugas</a>, maupun halaman <i class="icon-briefcase"></i> <a href="tugas-saya">Tugas Saya</a>.</p>
						<p>Untuk mengunduh surat tugas melalui halaman Dashboard, klik tugas pada <i>gantt chart</i> atau panel Tugas / Tugas Pengawasan di bawahnya, kemudian klik tombol <span class="text-primary">Download</span> pada jendela surat tugas. Untuk mengunduh surat tugas melalui halaman Tugas Saya, klik tugas pada kalender, kemudian klik tombol <span class="text-primary">Download</span> pada jendela surat tugas.</p>
						<p>Untuk men<i>generate</i> beberapa surat tugas sekaligus ke dalam sebuah file DOCX, buka halaman Daftar Tugas. Pilih surat tugas yang akan diunduh. Untuk memilih lebih dari surat tugas, tekan tombol <kbd>Ctrl</kbd> atau <kbd>Shift</kbd> pada saat memilih. Kemudian klik tombol <span class="text-primary">download surat yang terpilih</span> pada pojok kiri bawah halaman.</p>
						<p class="img-container mb-4"><img src="assets/img/bantuan/bagitugas-download-surat.gif"></p>
						<p class="pt-3">Berikut ini adalah contoh tampilan Surat Tugas & Surat Perjalanan Dinas yang dihasilkan secara <i>default</i>.</p>
						<div class="d-flex flex-wrap">
							<a class="mb-2 mr-2" href="assets/img/bantuan/bagitugas-surat-tugas.png" data-toggle="lightbox" title="Contoh Surat Tugas" data-title="Contoh Surat Tugas" data-gallery="bantuan"><img src="assets/img/bantuan/bagitugas-surat-tugas.png" class="border border-primary" style="height: 80px;"></a>
							<a class="mb-2 mr-2" href="assets/img/bantuan/bagitugas-surat-perjalanan-dinas-1.png" data-toggle="lightbox" title="Contoh Surat Perjalanan Dinas (halaman 1)" data-title="Contoh Surat Perjalanan Dinas (halaman 1)" data-gallery="bantuan"><img src="assets/img/bantuan/bagitugas-surat-perjalanan-dinas-1.png" class="border border-primary" style="height: 80px;"></a>
							<a class="mb-2 mr-2" href="assets/img/bantuan/bagitugas-surat-perjalanan-dinas-2.png" data-toggle="lightbox" title="Contoh Surat Perjalanan Dinas (halaman 2)" data-title="Contoh Surat Perjalanan Dinas (halaman 2)" data-gallery="bantuan"><img src="assets/img/bantuan/bagitugas-surat-perjalanan-dinas-2.png" class="border border-primary" style="height: 80px;"></a>
						</div>
						<hr class="my-4">
						<div class="page-header" id="pengaturan-server">
							<h4 class="page-title py-1">Pengaturan Server</h4>
						</div>
						<p>Aplikasi <span class="fw-600 text-primary">BagiTugas</span> mendukung kustomisasi Surat Tugas atau Surat Perjalanan Dinas. Pengguna dapat menentukan sendiri server tujuan untuk proses <i>download</i> surat sehingga dapat dilakukan penyesuaian format/<i>template</i> surat sesuai dengan kebijakan satker masing-masing.</p>
						<div class="alert alert-warning mb-4" role="alert">
							<div class="row">
								<div class="col-auto pr-0"><i class="fas fa-exclamation-triangle text-warning"></i></div>
								<div class="col"><div class="text-danger fz-18 mb-1">Fitur ini membutuhkan pengetahuan mengenai pengembangan aplikasi berbasis&nbsp;<i>website</i>.</div>Satker yang tidak memiliki pegawai dengan kemampuan tersebut tidak disarankan untuk mengubah pengaturan server. Apabila terdapat kendala atau hal-hal yang ingin ditanyakan dapat menghubungi kontak di bawah.</div>
							</div>
						</div>
						<p>Berikut ini adalah ilustrasi proses <i>download file</i> surat:</p>
						<p class="img-container img-container-2"><img src="assets/img/bantuan/bagitugas-server.png?v=1" title="BagiTugas Server"></p>
						<p>Pada proses <i>download</i> surat, secara <i>default</i> data akan dikirim ke <span class="text-primary"><span class="fw-600">API</span> BagiTugas</span> yaitu<span class="text-primary ml-2 d-inline-block"><i class="fas fa-link mr-2"></i><?=SITE?>api/generate-surat</span></p>
						<p>Aplikasi <span class="fw-600 text-primary">BagiTugas</span> akan menerima data tersebut dan akan men<i>generate</i> sebuah <i>file</i> DOCX yang diisi data yang dikirimkan tersebut. Server tujuan tersebut dapat diubah ke alamat <i>webapp</i> yang telah Anda buat sendiri. Dengan demikian, pada setiap proses <i>download</i> surat, aplikasi <span class="fw-600 text-primary">BagiTugas</span> akan mengirimkan (<span class="text-success">POST</span>) data ke alamat server tersebut. Anda dapat menentukan sendiri <i>response</i> dari proses tersebut, entah itu berupa <i>file</i> PDF, XLS, DOCX, atau lainnya.</p>
						<p>Adapun struktur JSON yang dikirimkan adalah sebagai berikut:</p>
						<table class="table table-sm table-bordered">
							<thead>
								<tr><th>Key</th><th>Tipe</th><th>Keterangan</th></tr>
							</thead>
							<tbody>
								<tr style="background: #efefef;"><td class="fw-600">glob</td><td class="fw-600 text-gray">Object</td><td class="fw-600">Pengaturan Global</td></tr>
								<tr><td class="pl-4">kab</td><td class="text-success">String</td><td>Nama kabupaten/kota/provinsi</td></tr>
								<tr><td class="pl-4">alamat</td><td class="text-success">String</td><td>Alamat BPS kabupaten/kota/provinsi</td></tr>
								<tr><td class="pl-4">footer</td><td class="text-success">String</td><td><i>Footer</i> surat</td></tr>
								<tr><td class="pl-4">tempat</td><td class="text-success">String</td><td>Tempat tanda tangan<div class="text-gray">Berupa nama wilayah administrasi</div></td></tr>
								<tr><td class="pl-4 fw-600">kpl</td><td class="text-gray">Object</td><td>Kepala BPS satker</td></tr>
								<tr><td class="pl-5">nip</td><td class="text-success">String</td><td>NIP Kepala BPS satker</td></tr>
								<tr><td class="pl-5">nama</td><td class="text-success">String</td><td>Nama Kepala BPS satker</td></tr>
								<tr><td class="pl-4 fw-600">ppk</td><td class="text-gray">Object</td><td>Pejabat Pembuat Komitmen (PPK)</td></tr>
								<tr><td class="pl-5">nip</td><td class="text-success">String</td><td>NIP Pejabat Pembuat Komitmen</td></tr>
								<tr><td class="pl-5">nama</td><td class="text-success">String</td><td>Nama Pejabat Pembuat Komitmen</td></tr>
								<tr style="background: #efefef;"><td class="fw-600">data</td><td class="fw-600 text-gray">Array</td><td class="fw-600"><i>Array</i> dari identitas surat tugas</td></tr>
								<tr><td class="pl-4">no</td><td class="text-success">String</td><td>Nomor Surat Tugas</td></tr>
								<tr><td class="pl-4">nama</td><td class="text-success">String</td><td>Nama pelaksana</td></tr>
								<tr><td class="pl-4">nip</td><td class="text-success">String</td><td>NIP pelaksana<div class="text-gray">Terisi "-" jika pelaksana adalah mitra</div></td></tr>
								<tr><td class="pl-4">jabatan</td><td class="text-success">String</td><td>Jabatan pelaksana<div class="text-gray">Terisi "Mitra BPS" jika pelaksana adalah mitra</div></td></tr>
								<tr><td class="pl-4">golongan</td><td class="text-success">String</td><td>Golongan PNS dari pelaksana<div class="text-gray">Terisi "-" jika pelaksana adalah mitra</div></td></tr>
								<tr><td class="pl-4">pangkat</td><td class="text-success">String</td><td>Pangkat pelaksana<div class="text-gray">Terisi "-" jika pelaksana adalah mitra</div></td></tr>
								<tr><td class="pl-4">anggota</td><td class="text-gray">Array</td><td>Nama-nama dari anggota pelaksana <span class="text-gray">(jika ada)</span></td></tr>
								<tr><td class="pl-4">tujuan</td><td class="text-success">String</td><td>Tujuan tugas <span class="text-gray">(bukan tempat tujuan)</span></td></tr>
								<tr><td class="pl-4">tempat</td><td class="text-success">String</td><td>Desa/Kecamatan/Kabupaten/Kota/lainnya tempat tujuan tugas</td></tr>
								<tr><td class="pl-4">angkutan</td><td class="text-success">String</td><td>Angkutan yang digunakan:<ul class="pl-4 mb-0"><li>Kendaraan Dinas</li><li>Kendaraan Pribadi</li><li>Angkutan Umum</li></ul><small class="text-warning">*hanya terisi jika melakukan perjalanan dinas</small></td></tr>
								<tr><td class="pl-4">tgl_mulai</td><td class="text-success">String</td><td>Tanggal mulai pelaksanaan tugas <span class="text-gray">(format: D MMMM YYYY)</span></td></tr>
								<tr><td class="pl-4">tgl_akhir</td><td class="text-success">String</td><td>Tanggal berakhirnya pelaksanaan tugas <span class="text-gray">(format: D MMMM YYYY)</span></td></tr>
								<tr><td class="pl-4">waktu</td><td class="text-success">String</td><td>Gabungan dari tanggal mulai & berakhir pelaksanaan tugas</td></tr>
								<tr><td class="pl-4 fw-600">ttd</td><td class="text-gray">Object</td><td>Tanda tangan surat</td></tr>
								<tr><td class="pl-5">tgl</td><td class="text-success">String</td><td>Tanggal tanda tangan surat</td></tr>
								<tr><td class="pl-5">nip</td><td class="text-success">String</td><td>NIP penandatangan surat</td></tr>
								<tr><td class="pl-5">nama</td><td class="text-success">String</td><td>Nama penandatangan surat</td></tr>
								<tr><td class="pl-5">an</td><td class="text-primary">Boolean</td><td>Atas nama</td></tr>
								<tr><td class="pl-5">plh</td><td class="text-primary">Boolean</td><td>Pelaksana harian</td></tr>
								<tr><td class="pl-4 fw-600">spd</td><td class="text-gray">Object</td><td>Surat Perjalanan Dinas (SPD)</td></tr>
								<tr><td class="pl-5">no</td><td class="text-success">String</td><td>Nomor SPD</td></tr>
								<tr><td class="pl-5">lama</td><td class="text-success">String</td><td>Lamanya waktu perjalanan dinas <span class="text-gray">(n hari)</span></td></tr>
							</tbody>
						</table>
						<p>Contoh JSON data yang dikirimkan dapat dilihat pada halaman berikut:<br><a href="surat-generator"><?=SITE?>surat-generator</a></p>
						<hr class="my-4">
						<div class="page-header">
							<h4 class="page-title py-1">Pusat Bantuan</h4>
						</div>
						<div class="mb-4">
							<div class="mb-1"><i class="fas fa-fw fa-envelope mr-2"></i>muhammad.afifudin@bps.go.id</div>
							<div class="mb-1"><i class="fab fa-fw fa-whatsapp mr-2"></i>089 7652 6474</div>
							<div class="mb-1"><i class="fab fa-fw fa-github mr-2"></i><a href="https://github.com/afiiif">github.com/afiiif</a></div>
						</div>
					</div>
				</div>
			</div>
