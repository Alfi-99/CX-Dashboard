Berdasarkan gambar terbaru yang kamu unggah, dashboard ini memiliki struktur yang jauh lebih kompleks dan teknis dibanding menu navigasi sebelumnya. Ini adalah **Operational Dashboard** dengan gaya **Infomedia/Telkom Red CX**.

Berikut adalah panduan **Design System** (Design.md) khusus untuk tampilan dashboard statistik tersebut:

---

# Design System: Red CX Operational Dashboard

## 1. Visual Theme & Atmosphere
Dashboard ini menggunakan pendekatan **"Data-Heavy Precision"**. Fokus utamanya adalah menyajikan metrik KPI (Key Performance Indicator) dalam jumlah banyak tanpa membuat pengguna bingung. Penggunaan gradasi warna merah ke ungu pada *header cards* memberikan kesan futuristik dan modern.

**Key Characteristics:**
- **Layered Cards**: Penggunaan kartu dalam kartu (nested cards) untuk memisahkan kategori data.
- **Vibrant KPI Headers**: Metrik utama menggunakan latar belakang gradasi linear (Red to Deep Purple).
- **Interactive Map**: Penggunaan peta Indonesia sebagai jangkar visual untuk data distribusi geografis.
- **Clean Tables**: Tabel tanpa garis vertikal (*borderless*) untuk menjaga kebersihan visual.

---

## 2. Color Palette

### Primary & Gradients
- **Active Red**: `#E31E24` (Warna brand utama).
- **Gradient Start**: `#D62027` (Red).
- **Gradient End**: `#4D0E2B` (Dark Purple/Maroon) — Digunakan pada *Hero KPI Cards*.
- **Map Pin**: `#E31E24` dengan shadow putih.

### Functional Colors
- **Chart Colors**: Palet warna-warni (Blue, Orange, Purple, Pink) untuk *Doughnut Chart* agar setiap segmen mudah dibedakan secara cepat.
- **Table Header**: `#E31E24` (Background merah padat dengan teks putih).

---

## 3. Typography Hierarchy

| Role | Font | Size | Weight | Color |
| :--- | :--- | :--- | :--- | :--- |
| **KPI Label** | Sans-Serif | 14px | 600 (Semibold) | `#E31E24` |
| **KPI Value** | Sans-Serif | 28px - 32px | 800 (Extra Bold) | `#FFFFFF` |
| **Section Title** | Sans-Serif | 16px | 700 (Bold) | `#E31E24` |
| **Table Header** | Sans-Serif | 12px | 600 | `#FFFFFF` |
| **Table Body** | Sans-Serif | 12px | 400 | `#1A1A1A` |

---

## 4. Component Stylings

### KPI Hero Cards (Atas)
- **Background**: `linear-gradient(90deg, #D62027 0%, #4D0E2B 100%)`.
- **Border Radius**: `10px`.
- **Icon**: Putih, opacity 0.5, terletak di sisi kanan kartu.
- **Value**: Rata tengah (Center Aligned).

### Doughnut Chart (Distribution Channel)
- **Stroke Width**: Cukup lebar agar terlihat seperti donat.
- **Legend**: Terletak di sisi kanan dengan dot warna yang sesuai.
- **Shadow**: Tipis pada area chart untuk memberikan efek kedalaman.

### Operational Tables
- **Header**: Sudut membulat di bagian atas (`border-radius: 10px 10px 0 0`).
- **Row**: *Zebra stripping* (warna selang-seling abu-abu sangat muda) untuk membantu keterbacaan data yang rapat.
- **Status (Blank)**: Jika data kosong, gunakan teks `(Blank)` dengan warna abu-abu dalam kurung.

### Indonesia Map Container
- **Base Map**: Warna abu-abu muda (`#CCCCCC`).
- **Pins**: Warna merah menyala.
- **Layout**: Ditempatkan di tengah section bawah sebagai elemen visual utama "Walkin - Grapari".

---

## 5. Implementasi ke Laravel (GSheet Data Mapping)

Karena datanya banyak, berikut adalah cara memetakan kolom GSheet ke tampilan ini:

1.  **KPI Cards**: Ambil dari *cell* tunggal (misal: Total Traffik di Cell B2).
2.  **Channel Table**: Ambil range data (A1:F6) lalu lakukan *looping* di Blade template.
3.  **Map Pins**: Jika ingin dinamis, GSheet harus berisi koordinat Lat/Long atau Nama Kota yang dipetakan ke koordinat CSS di atas gambar peta.

---

## 6. Do's and Don'ts

### Do
- Gunakan **Uppercase** untuk judul tabel (LOKASI, SEAT, TRAFFIK).
- Pastikan angka ribuan menggunakan pemisah titik/koma (misal: 15K atau 15.000).
- Berikan *padding* yang cukup pada sel tabel agar teks tidak menempel ke pinggir.

### Don't
- Jangan menggunakan warna teks hitam pekat pada background gradasi gelap (gunakan putih).
- Jangan membuat ukuran chart terlalu kecil hingga label persentase tidak terbaca.
- Jangan menggunakan font dekoratif; gunakan font fungsional seperti **Inter** atau **Roboto**.

---

## 7. Prompt untuk Pengembangan (AI/Developer)

> "Buat dashboard Laravel dengan 4 kartu KPI di atas menggunakan gradasi merah ke ungu. Di bawahnya, bagi menjadi dua kolom: kolom kiri berisi doughnut chart, kolom kanan berisi tabel statistik 'Channel'. Bagian paling bawah adalah section lebar berjudul 'Walkin - Grapari' yang berisi tabel data di kiri dan peta Indonesia dengan pin merah di tengah, serta list Top/Bottom 5 di kanan."

**Saran Tambahan:** Untuk peta Indonesia, kamu bisa menggunakan gambar SVG agar lebih ringan dan pin-nya bisa dibuat interaktif menggunakan CSS `absolute positioning`.