# 🧠 Sistem Pakar Diagnosis FOMO (Fear Of Missing Out) Generasi Remaja

Proyek ini merupakan **sistem pakar berbasis web** yang digunakan untuk mendiagnosis tingkat *FOMO (Fear of Missing Out)* pada generasi remaja.  
Sistem ini menerapkan **metode Forward Chaining** dan **Certainty Factor (CF)** untuk menghasilkan diagnosis yang lebih akurat berdasarkan gejala yang diinput oleh pengguna.

---

## 🚀 Fitur Utama

- 🔍 **Diagnosis Forward Chaining**  
  Menggunakan aturan berbasis penalaran maju untuk menentukan hasil diagnosis dari data gejala yang diberikan.

- 📊 **Diagnosis Certainty Factor**  
  Menghitung tingkat keyakinan terhadap diagnosis menggunakan metode *certainty factor*.

- 👤 **Dashboard User**  
  Menampilkan hasil diagnosis, riwayat, dan informasi terkait tingkat FOMO pengguna.

- 🏠 **Landing Page Interaktif**  
  Tampilan awal dengan informasi singkat tentang sistem dan cara penggunaannya.

---

## 🖼️ Tampilan Aplikasi

### 🏠 Landing Page
![Landing Page](https://github.com/user-attachments/assets/48817ccc-da10-49eb-abb1-b99dcf6b7415)

---

### 📊 Dashboard User
![Dashboard User](https://github.com/user-attachments/assets/c41d302c-a251-4438-9daf-813e1aa505ec)

---

### 🧩 Form Diagnosis Forward Chaining
![Form Forward Chaining](https://github.com/user-attachments/assets/9d04f068-54ab-4d29-a32e-db349b908055)

---

### 🧮 Form Diagnosis Certainty Factor
![Form Certainty Factor](https://github.com/user-attachments/assets/285ad454-a754-4407-82e7-ca846a10439a)

---

## ⚙️ Instalasi & Menjalankan Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal:

```bash
# 1. Duplikat file konfigurasi environment
cp .env.example .env

# 2. Install dependensi Node.js dan PHP
npm install
composer install

# 3. Jalankan migrasi database
php artisan migrate

# 4. Jalankan server Laravel
php artisan serve

# 5. Jalankan Vite (untuk asset dan frontend)
npm run dev
