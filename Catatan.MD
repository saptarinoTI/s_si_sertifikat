Baik! Berikut saya buatkan **DESAIN SISTEM TERBARU** yang sudah disesuaikan dengan *seluruh data & contoh dokumen* yang Anda berikan sebelumnya: ** Sertifikat – Billing PNBP – Kuitansi – Alur Pengajuan – Sistem hanya petugas yang login – Pengguna hanya isi form di landing page **.

Desain ini sudah lengkap mulai dari **alur bisnis, arsitektur, modul, database, flow proses, dan dokumen yang dihasilkan**.
Ini dapat langsung dijadikan **blueprint** untuk developer.

---

# 🟦 **1. GAMBARAN UMUM SISTEM**

Sistem ini adalah aplikasi untuk menangani:

1. **Pengajuan PIK (Permohonan Tindakan Karantina)** oleh pengguna (tanpa login)
2. **Verifikasi data** oleh petugas
3. **Pembuatan Billing PNBP**
4. **Pembayaran (manual/online)**
5. **Pembuatan Kuitansi Karantina**
6. **Penerbitan Sertifikat Kesehatan Tumbuhan Antar Area**
7. **Input Nomor Resi (opsional)**

---

# 🟦 **2. ALUR SISTEM (END-TO-END)**

## **A. Pengguna (Tidak Login)**

1. Membuka landing page
2. Mengisi Form PIK:

   * Data pengirim
   * Data penerima
   * Media pembawa
   * Dokumen pendukung (KTP, foto media, dll)
3. Submit → Sistem menghasilkan:

   * **Nomor PIK** (kode permohonan)
4. Pengguna dapat mengecek status lewat:

   * Menu “Cek Status”
   * Dengan memasukkan **Nomor PIK**

---

## **B. Petugas (Login Dashboard)**

1. Login dashboard petugas
2. Melihat list permohonan baru
3. Memverifikasi data dan dokumen
4. Jika disetujui → klik **Buat Billing**
5. Sistem melakukan:

   * Menghitung tarif
   * Generate **Billing PNBP (PDF)** seperti contoh Anda
6. Pengguna melakukan pembayaran

   * Jika manual: petugas upload bukti
   * Jika online: sistem terima webhook
7. Petugas klik **Setujui Pembayaran**

   * Sistem generate **Kuitansi Karantina (PDF)** seperti contoh Anda
8. Petugas klik **Terbitkan Sertifikat**

   * Sistem generate **Sertifikat Antar Area (PDF)** seperti contoh Anda
9. Jika ada pengiriman fisik:

   * Petugas menginput **Nomor Resi**
10. Sistem selesai

---

# 🟦 **3. ARSITEKTUR SISTEM**

```
                  ┌─────────────────────────┐
                  │      Landing Page       │
                  │ (Form PIK / Cek Status) │
                  └───────────┬─────────────┘
                              │
                              v
 ┌───────────────────────────────────────────────────┐
 │                    Backend API                     │
 │   (PIK, Billing, Pembayaran, Kuitansi, Sertifikat) │
 └───────────┬──────────────────────┬────────────────┘
             │                      │
             v                      v
 ┌────────────────────┐   ┌───────────────────────────┐
 │ Dashboard Petugas  │   │        Database            │
 │  (Login, Validasi, │   │ PIK, Billing, Kuitansi,    │
 │   Billing, Kuitansi│   │ Sertifikat, Log, Resi, dll │
 │   Sertifikat)      │   └───────────────────────────┘
 └────────────────────┘
```

---

# 🟦 **4. MODUL-MODUL SISTEM**

## **1. Modul Pengajuan PIK (tanpa login)**

* Form pengirim
* Form penerima
* Form media pembawa
* Upload KTP & foto media
* Generate nomor PIK
* Halaman cek status

---

## **2. Modul Petugas**

* Login petugas
* Dashboard permohonan
* Verifikasi dokumen
* Pembuatan billing
* Verifikasi pembayaran
* Pembuatan kuitansi
* Pembuatan sertifikat
* Input nomor resi
* Cetak dokumen
* Log aktivitas

---

## **3. Modul Billing (PNBP)**

* Auto-generate **kode billing**
* Hitung tarif otomatis:

  * Antar area
  * Dokumen karantina
  * Berat/volume media
* PDF Billing format resmi seperti contoh Anda

---

## **4. Modul Pembayaran**

* Status: pending / paid / expired
* Upload bukti bayar
* Verifikasi petugas
* Integrasi online payment (opsional)

---

## **5. Modul Kuitansi Karantina**

* Auto-generate nomor kuitansi
* PDF kuitansi format resmi
* Komponen biaya sesuai PNBP

---

## **6. Modul Sertifikat Tumbuhan Antar Area**

* Nomor sertifikat auto-generate
* Template PDF sesuai contoh Anda
* Menampilkan:

  * Nama umum
  * Nama ilmiah
  * Jumlah
  * Bentuk media
  * Pengirim/Penerima
  * Area asal/tujuan
  * dll

---

## **7. Modul Resi Pengiriman**

* Input nomor resi
* Ekspedisi
* Tracking sederhana

---

# 🟦 **5. STRUKTUR DATABASE (FINAL SUDAD DIOPTIMALKAN)**

### **Tabel: pik (permohonan tindakan karantina)**

| Field             | Keterangan                                                                   |
| ----------------- | ---------------------------------------------------------------------------- |
| id                | PK                                                                           |
| nomor_pik         | kode unik                                                                    |
| nama_pengirim     |                                                                              |
| alamat_pengirim   |                                                                              |
| nama_penerima     |                                                                              |
| alamat_penerima   |                                                                              |
| jenis_media       | dagang                                                                       |
| nama_ilmiah       | opsional                                                                     |
| bentuk_media      |                                                                              |
| jumlah            |                                                                              |
| satuan            |                                                                              |
| kemasan           |                                                                              |
| area_asal         |                                                                              |
| area_tujuan       |                                                                              |
| alat_angkut       |                                                                              |
| tanggal_berangkat |                                                                              |
| status            | baru / diverifikasi / dibilling / menunggu_bayar / lunas / sertifikat_terbit |
| created_at        |                                                                              |

---

### **Tabel: billing**

| Field              | Keterangan               |
| ------------------ | ------------------------ |
| id                 | PK                       |
| pik_id             | FK                       |
| kode_billing       |                          |
| total              |                          |
| tanggal_billing    |                          |
| tanggal_kadaluarsa |                          |
| status             | pending / paid / expired |
| tanggal_bayar      |                          |
| bukti_pembayaran   | file                     |

---

### **Tabel: billing_items**

| billing_id | uraian | volume | tarif | satuan | jumlah |

---

### **Tabel: kuitansi**

| id | PK |
| billing_id | FK |
| nomor_kuitansi | auto number |
| total | |
| tanggal | |

---

### **Tabel: kuitansi_items**

| kuitansi_id | uraian | tarif | volume | total |

---

### **Tabel: sertifikat**

| id | PK |
| pik_id | FK |
| nomor_sertifikat | |
| file_pdf | |
| tanggal_terbit | |

---

### **Tabel: resi**

| sertifikat_id | resi | ekspedisi | tanggal |

---

# 🟦 **6. FLOW SISTEM (SEQUENCE DIAGRAM RINGKAS)**

```
User → Form PIK → Submit → Sistem simpan → Nomor PIK →
Petugas login → Verifikasi → Buat Billing →
User bayar → Petugas setujui pembayaran →
Sistem buat Kuitansi → Sistem buat Sertifikat →
Petugas input resi → Selesai
```

---

# 🟦 **7. DOKUMEN YANG DIHASILKAN SISTEM (PDF)**

## ✔ Billing PNBP

Format seperti contoh Anda:

* Kode Billing
* Total
* Daftar kuitansi
* Detail layanan
* Total akhir

## ✔ Kuitansi Karantina

* Nomor kuitansi
* Nama wajib bayar
* Rincian layanan
* Total

## ✔ Sertifikat Kesehatan Tumbuhan Antar Area

* Nomor sertifikat
* Media pembawa
* Pengirim/penerima
* Area asal/tujuan
* Tanggal terbit

Semua template dapat dibuat dalam **HTML → PDF**.

---

# 🟦 **8. REKOMENDASI TEKNOLOGI**

### Backend

* Laravel
* Node.js (Express/NestJS)

### PDF Generator

* DomPDF
* Laravel Snappy (wkhtmltopdf)
* Puppeteer (HTML → PDF dengan kualitas tinggi)

### Frontend

* Blade (Laravel)
* React/Vue (opsional)

### Database

* MySQL
* PostgreSQL

---

# 🟦 **9. APA YANG BISA SAYA SIAPKAN SELANJUTNYA UNTUK ANDA?**

Saya bisa buatkan:

### ✔ Wireframe landing page & dashboard petugas

### ✔ ERD (gambar diagram relasi tabel)

### ✔ Flowchart lengkap

### ✔ Template PDF (Billing, Kuitansi, Sertifikat)

### ✔ Format penomoran otomatis (Billing, Kuitansi, Sertifikat)

### ✔ API endpoint (Laravel/Node) lengkap

Tinggal beri tahu:
🔹 Mau dibuatkan **diagram ERD**,
🔹 atau **flowchart**,
🔹 atau **template PDF** dulu?
