@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<h3 class="mb-4 fw-semibold">Tanya Jawab (FAQ)</h3>

<div class="accordion" id="faqAccordion">

    {{-- Dashboard --}}
    <div class="accordion-item mb-3 glass-card">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqDashboard">
            📊 Dashboard Statistik Absensi
        </button>
    </h2>
    <div id="faqDashboard" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            <p><strong>Apa itu Dashboard Statistik Absensi?</strong><br>
            Halaman yang menampilkan ringkasan jumlah pegawai yang sudah absen masuk, absen pulang, dan total absensi hari ini.</p>
            <p><strong>Apa manfaat dashboard ini?</strong><br>
            Memudahkan pemantauan kehadiran pegawai secara real-time dalam satu tampilan yang ringkas dan informatif.</p>
            <p><strong>Bagaimana data ini diperbarui?</strong><br>
            Data diperbarui otomatis sesuai input absensi yang dilakukan pegawai setiap harinya.</p>
            <p><strong>Apa arti tiap statistik?</strong><br>
            - <em>Sudah Absen Masuk:</em> Pegawai yang sudah melakukan absensi masuk.<br>
            - <em>Sudah Absen Pulang:</em> Pegawai yang sudah melakukan absensi keluar.<br>
            - <em>Total Absensi Hari Ini:</em> Jumlah keseluruhan data absensi yang tercatat pada hari tersebut.</p>
        </div>
    </div>
</div>


    {{-- Data Absensi --}}
    <div class="accordion-item mb-3 glass-card">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                ⏱️ Data Absensi
            </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p><strong>Bagaimana cara melihat data absensi pegawai?</strong><br>Klik "Data Absensi" untuk melihat daftar kehadiran lengkap.</p>
                <p><strong>Apakah saya bisa mengedit absensi?</strong><br>Admin bisa mengedit atau hapus data absensi sesuai kebutuhan.</p>
            </div>
        </div>
    </div>

    {{-- Tambah Absensi --}}
    <div class="accordion-item mb-3 glass-card">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                ➕ Tambah Absensi
            </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
                <p><strong>Bagaimana menambahkan absensi secara manual?</strong><br>Gunakan menu ini untuk input absensi secara manual jika dibutuhkan koreksi.</p>
            </div>
        </div>
    </div>

    {{-- Rekap Bulanan --}}
    <div class="accordion-item mb-3 glass-card">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqRekapBulanan">
            📅 Rekap Data Bulanan
        </button>
    </h2>
    <div id="faqRekapBulanan" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            <p><strong>Apa itu Rekap Absensi Bulanan?</strong><br>
            Rekap Absensi Bulanan menampilkan data kehadiran pegawai selama satu bulan tertentu, lengkap dengan waktu masuk dan keluar setiap harinya.</p>
            <p><strong>Bagaimana cara menggunakan filter bulan dan tahun?</strong><br>
            Masukkan nomor bulan (01-12) dan tahun yang ingin kamu lihat, kemudian klik tombol "Tampilkan" untuk memuat data sesuai pilihan.</p>
            <p><strong>Apa arti kolom waktu keluar jika kosong?</strong><br>
            Kolom waktu keluar akan menampilkan tanda "-" jika pegawai belum melakukan absensi pulang pada hari tersebut.</p>
            <p><strong>Manfaat fitur ini?</strong><br>
            Memudahkan pemantauan kehadiran pegawai dan membantu pembuatan laporan absensi bulanan secara terstruktur.</p>
        </div>
    </div>
</div>


    {{-- Laporan PDF --}}
    <div class="accordion-item mb-3 glass-card">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqLaporanPDF">
            📄 Laporan PDF
        </button>
    </h2>
    <div id="faqLaporanPDF" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            <p><strong>Apa itu Laporan PDF?</strong><br>
            Laporan PDF adalah ringkasan data absensi pegawai yang bisa kamu unduh dan simpan dalam format file PDF.</p>
            <p><strong>Bagaimana cara mengunduhnya?</strong><br>
            Klik tombol/menu "Laporan PDF" untuk mengunduh laporan absensi secara lengkap sesuai data yang tersedia.</p>
            <p><strong>Informasi apa saja yang ada di laporan?</strong><br>
            Laporan ini memuat nama pegawai, jabatan, waktu masuk, dan waktu keluar selama periode tertentu.</p>
            <p><strong>Apa manfaat fitur ini?</strong><br>
            Memudahkan pencetakan dan arsip data absensi untuk keperluan administrasi dan laporan resmi.</p>
        </div>
    </div>
</div>


    {{-- Kalender --}}
    <div class="accordion-item mb-3 glass-card">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faqCalendar">
            📅 Kalender
        </button>
    </h2>
    <div id="faqCalendar" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
            <p><strong>Apa itu Menu Kalender ?</strong><br>
            Halaman ini menampilkan jam dan kalender digital yang realtime serta kalender klasik bulanan dengan navigasi untuk melihat bulan lain.</p>
            <p><strong>Bagaimana cara menggunakan kalender klasik?</strong><br>
            Gunakan tombol panah kiri dan kanan di atas kalender untuk berpindah bulan dan tahun.</p>
            <p><strong>Apa bedanya kalender digital dan klasik?</strong><br>
            Kalender digital menampilkan waktu dan tanggal saat ini secara realtime, sedangkan kalender klasik menampilkan tampilan kalender bulan berjalan secara tradisional.</p>
            <p><strong>Apakah kalender ini responsif dan mudah digunakan?</strong><br>
            Ya, kalender ini didesain dengan style modern dan responsif, cocok untuk berbagai ukuran layar dan mudah dioperasikan.</p>
        </div>
    </div>
</div>


</div>
@endsection
