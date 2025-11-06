# BagiTugas

https://www.youtube.com/watch?v=q7Lbn_JtLdw

BagiTugas merupakan aplikasi berbasis website yang dikembangkan oleh [BPS Kabupaten Kayong Utara](https://kayongutarakab.bps.go.id). Aplikasi ini dibuat untuk menjalankan fungsi utamanya yaitu untuk manajemen surat tugas dan surat perjalanan dinas, serta menjalankan fungsi-fungsi pendukung seperti pengelolaan database pegawai organik & mitra.

<br>

## Tech-Stack

- **Back-end:**
  - PHP (tanpa framework)
  - SQLite - utk databasenya
  - [OpenTBS](https://www.tinybutstrong.com/opentbs.php?doc) - utk generate `.doc` file
- **Front-end:**
  - [jQuery](https://jquery.com/)
  - [jQuery UI](https://jqueryui.com/)
  - [Bootstrap v4](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
  - [Node.js](https://nodejs.org/en)
  - [Gulp.js](https://gulpjs.com/)
  - SCSS
  - dan berbagai library lainnya (terlalu banyak utk disebutkan semuanya 😇)

<br>

## Cara Menjalankan Project di Local

Sebenernya aku udah agak lupa gimana caranya, LOL 🤣\
Dah lama gak nyentuh project ini. Ini project jadul, didevelop pada bulan **Mei 2019**.

Kamu yakin mau ngelanjutin ini?? 😏\
Ya, aku tau, kamu ke sini karena disuruh atasanmu 😆

### Front-end

Pastikan di komputermu udah terinstall [Node.js](https://nodejs.org/en), silakan cari sendiri cara installnya.\
Install dependency: `npm install`

Di sini pakai Node.js itu utk jalanin [Gulp.js](https://gulpjs.com/) yg tugasnya:

- Compile file2 `.scss` di [/src/css](/src/css/) → Jadilah [/assets/css/main.css](/assets/css/main.css)
- Compile file2 `.js` di [/src/js](/src/js/) → Jadilah [/assets/js/\*](/assets/js/)

Artinya, kalo kamu mau ngotak-atik frontendnya:

1. Ubah file2 CSS/JS di folder `/src`
2. Lakukan build dengan `npm run build`
3. Jadilah file CSS/JS di `/assets`
4. Halaman webnya akan mengambil CSS/JS dari `/assets`\
   (mungkin kamu akan perlu me-refresh pagenya dulu).

### Back-end

Pastikan kamu bisa run server PHP. Dulu aku pake [XAMPP](https://www.apachefriends.org/).\
Install dependency: `composer install`

Siapin credentials. Bikin file `SECRET.php`, yg isinya adalah:

```php
define('SECRET', [
  'clientId' => '<isikan clientId dari SSO BPS>',
  'clientSecret' => '<isikan clientSecret dari SSO BPS>',
  'username' => '<isikan username yg bisa dipakai login Community BPS>',
  'password' => '<isikan password dr username Community BPS tadi>',
]);
```

\*_Pastikan daftar akun SSO BPS dulu, dan dapatkan `clientId` & `clientSecret`_

Pertama, kamu bisa cek file `.htaccess`.\
Di situ menginstruksikan agar semua request yg masuk:

- Jika itu adalah `/assets`, `/lib`, atau `/uploads`, maka serve as is.
- Selain itu, maka ke [app.php](/app.php)

Jadi entry-point nya adalah [app.php](/app.php).\
Kamu bisa lanjut cek aja file2 yg di-include di sana.

<br>

## Lisensi

Hak cipta © 2019 Muhammad Afifudin

Izin diberikan secara gratis kepada siapa saja yang mendapatkan salinan kode sumber ini, untuk menggunakan, menyalin, mengubah, dan mendistribusikan hanya untuk tujuan **non-komersial**, tanpa perlu menyertakan pemberitahuan hak cipta.

KODE SUMBER INI DIBERIKAN "APA ADANYA", TANPA JAMINAN APA PUN, TERMASUK JAMINAN KESESUAIAN UNTUK TUJUAN TERTENTU. PENULIS TIDAK BERTANGGUNG JAWAB ATAS KERUSAKAN ATAU MASALAH YANG TIMBUL DARI PENGGUNAAN KODE INI.

🚫 Penggunaan untuk tujuan **komersial** dilarang kecuali dengan izin tertulis dari pemilik hak cipta.

<br>

<br>

---

<br>

### ℹ️ Catatan Tambahan:

- Penulis tidak menerima komplain jika kode ini susah dipahami.
- Penulis sudah tidak terikat kontrak/perjanjian dengan pihak manapun terkait pengembangan aplikasi ini.
- Penulis tidak melarang siapapun utk berkonsultasi,\
  namun sadari bahwa penulis berhak utk **melayani** atau **tidak melayani** konsultasi.
