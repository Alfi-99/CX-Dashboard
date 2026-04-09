<div align="center">
  <h1>🔴 Red CX Operational Dashboard</h1>
  <p>Dashboard Operasional Berbasis Laravel untuk Monitoring KPI & Performa</p>
</div>

---

## 📖 Tentang Proyek

**Red CX Dashboard** adalah aplikasi *Operational Dashboard* tingkat enterprise yang dirancang khusus untuk memantau data operasional seperti metrik KPI, persebaran data geografis, pengelolaan SDM, dan catatan finansial perusahaan.

Dashboard ini menggunakan tema visual **"Data-Heavy Precision"**, yang secara khusus dioptimalkan untuk menyajikan metrik KPI dalam jumlah masif dengan tingkat keterbacaan yang tinggi tanpa membingungkan penggunanya. Aplikasi ini memadukan estetika modern menggunakan palet warna khas *Red CX* (merah hingga ungu gelap), komponen kartu modular (*nested cards*), dan tata letak data yang bersih.

## ✨ Fungsionalitas & Modul Utama

Aplikasi ini dibagi menjadi beberapa modul utama yang saling terkait untuk mendukung proses pengambilan keputusan dan pelaporan di tingkat manajemen:

- **📊 Dashboard Utama (Dashboard)**
  Menyajikan *helicopter view* atau ringkasan keseluruhan tentang operasional organisasi. Mencakup visualisasi data skala besar, tren *traffic*, dan performa jalur layanan *(distribution channel)* menggunakan bagan-bagan informatif dan tabel statistik dinamis.

- **📈 Performance Mapping (Performance)**
  Pemantauan detail metrik dan performa KPI. Modul ini digunakan untuk melacak target layanan, mengevaluasi pencapaian, dan menyoroti titik-titik krusial yang memerlukan atensi (seperti laporan Top/Bottom 5 performers).

- **📝 Berita Acara Penerimaan Pekerjaan (BAPP)**
  Modul pengelolaan administrasi dan dokumentasi. Menampilkan ringkasan status berkas, kemajuan pengerjaan dokumen BAPP, dan rekapitulasi data persetujuan (approval) yang saling terhubung dengan bagian keuangan.

- **💰 Pengelolaan Finansial (Financial)**
  Menampilkan ringkasan data anggaran, pengeluaran, serta pengelolaan *revenue* perusahaan. Terhubung erat dengan metrik laporan bulanan dan pemantauan pencapaian target profitabilitas.

- **🧑‍🤝‍🧑 Sumber Daya Manusia (SDM)**
  Modul untuk pengelolaan staf operasional. Berguna untuk memantau kapasitas ketersediaan *seat* agen, jadwal pergeseran *(shift)*, lokasi geografis (melalui representasi *Walkin-Grapari Interactive Map*), dan distribusi kinerja agen perseorangan.

## 🎨 Pendekatan Desain Enterprise

Proyek ini sangat mengedepankan estetika visual dan pengalaman pengguna profesional. Beberapa elemen spesifik diimplementasikan:
- **Tabel Borderless:** Menggunakan pendekatan tabel tanpa garis antar-kolom (*clean table*) dipadu dengan gaya selang-seling (*zebra-striping*) untuk kerapatan data tinggi.
- **Visual Mapping:** Memanfaatkan basis peta Indonesia (*SVG Map Base*) lengkap dengan *pin markers* berkoordinat untuk pemantauan operasi yang tersebar di multi-titik geografis.
- **Smart AI Integration:** Asisten pintar bawaan (berbasis AI model *Deepseek*) untuk memberikan bantuan navigasi interaktif pada kompleksitas antarmuka dan laporan.

Untuk panduan mendalam mengenai desain, hierarki warna, *typography*, dan komponen-komponen yang mengaturnya, silakan merujuk pada:
👉 **[Pedoman Desain (DESIGN.md)](DESIGN.md)**

---
*Dibuat eksklusif untuk kebutuhan operasional internal organisasi. Seluruh modul dan spesifikasi desain telah disesuaikan dengan standar korporasi Red CX.*
