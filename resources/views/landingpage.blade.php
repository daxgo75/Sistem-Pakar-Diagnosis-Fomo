<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diagnosis FOMO</title>
    <meta name="description"
        content="Diagnosis tingkat FOMO (Fear of Missing Out) Anda secara akurat dengan sistem pakar kami. Temukan solusi untuk mengatasi kecemasan sosial digital.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        teal: {
                            50: '#f0fdfa',
                            100: '#ccfbf1',
                            200: '#99f6e4',
                            300: '#5eead4',
                            400: '#2dd4bf',
                            500: '#14b8a6',
                            600: '#0d9488',
                            700: '#0f766e',
                            800: '#115e59',
                            900: '#134e4a',
                        },
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                        blue: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #0d9488 0%, #1d4ed8 50%, #4c1d95 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #0d9488 0%, #1d4ed8 50%, #4c1d95 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <!-- Navbar Modern -->
    <nav class="fixed w-full z-50 px-6 py-4 bg-white/90 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 rounded-full gradient-bg flex items-center justify-center">
                    <i class="fas fa-brain text-white text-lg"></i>
                </div>
                <h1 class="text-2xl font-bold text-gradient">Diagnosis FOMO</h1>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="nav-link font-medium text-slate-600 hover:text-blue-600 transition">Beranda</a>
                <a href="#features" class="nav-link font-medium text-slate-600 hover:text-blue-600 transition">Fitur</a>
                <a href="#about" class="nav-link font-medium text-slate-600 hover:text-blue-600 transition">Tentang</a>
            </div>
            <div>
                <a href="/login"
                    class="px-5 py-2.5 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-full transition">Masuk</a>
                <a href="/register"
                    class="ml-2 px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-md shadow-blue-200">Daftar
                </a>
            </div>
        </div>
    </nav>

    <!-- Aktif Link Styling -->
    <style>
        .nav-link.active {
            color: #2563eb;
            font-weight: 600;
        }
    </style>

    <!-- Script to Handle Active State and Persist After Reload -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll(".nav-link");

            function activateLinkByHash() {
                const currentHash = window.location.hash;
                navLinks.forEach(link => {
                    link.classList.remove("active");
                    if (link.getAttribute("href") === currentHash) {
                        link.classList.add("active");
                    }
                });
            }

            // Inisialisasi saat halaman dimuat
            activateLinkByHash();

            // Event saat klik menu
            navLinks.forEach(link => {
                link.addEventListener("click", function() {
                    navLinks.forEach(l => l.classList.remove("active"));
                    this.classList.add("active");
                });
            });

            // Event saat hash berubah karena manual scroll atau klik langsung
            window.addEventListener("hashchange", activateLinkByHash);
        });
    </script>

    <!-- Hero Section dan Animasi -->
    <section id="home" class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div class="animate__animated animate__fadeInLeft">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-slate-900 leading-tight mb-6">
                    Kenali Tingkat <span class="text-gradient">FOMO</span> Anda
                </h1>
                <p class="text-lg text-slate-600 mb-8">
                    Sistem ini membantu mendiagnosis tingkat Fear of Missing Out (FOMO) dengan akurat. Temukan
                    solusi untuk mengurangi kecemasan sosial digital anda.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="/login"
                        class="px-8 py-4 bg-blue-600 text-white rounded-full font-medium hover:bg-blue-700 transition text-center">
                        Mulai Diagnosis Sekarang <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#how-it-works"
                        class="px-8 py-4 border border-slate-300 rounded-full font-medium hover:bg-slate-50 transition text-center">
                        <i class="fas fa-play-circle mr-2 text-blue-600"></i> Cara Kerja
                    </a>
                </div>
            </div>
            <div class="animate__animated animate__fadeInRight relative">
                <img src="{{ asset('images/fomo.png') }}" alt="FOMO Illustration"
                    class="w-full max-w-lg mx-auto floating">
                <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-blue-100 opacity-70"></div>
                <div class="absolute -top-6 -right-6 w-24 h-24 rounded-full bg-teal-100 opacity-70"></div>
            </div>
    </section>

    <!-- Bagaimana Sistem Bekerja -->
    <section id="how-it-works" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-4">CARA
                    KERJA</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Diagnosis FOMO dalam 3 Langkah Sederhana
                </h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Temukan tingkat FOMO anda dengan proses yang mudah
                    dan cepat.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-50 p-8 rounded-xl hover:shadow-md transition">
                    <div
                        class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-2xl font-bold mb-6">
                        1</div>
                    <h3 class="text-xl font-bold mb-3">Daftar Akun</h3>
                    <p class="text-slate-600">Buat akun gratis untuk memulai proses diagnosis dan menyimpan hasil
                        diagnosis.
                    </p>
                </div>
                <div class="bg-slate-50 p-8 rounded-xl hover:shadow-md transition">
                    <div
                        class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-2xl font-bold mb-6">
                        2</div>
                    <h3 class="text-xl font-bold mb-3">Jawab Pertanyaan</h3>
                    <p class="text-slate-600">Jawab pertanyaan sesuai yang anda alami sekarang.
                    </p>
                </div>
                <div class="bg-slate-50 p-8 rounded-xl hover:shadow-md transition">
                    <div
                        class="w-16 h-16 rounded-full gradient-bg flex items-center justify-center text-white text-2xl font-bold mb-6">
                        3</div>
                    <h3 class="text-xl font-bold mb-3">Dapatkan Hasil</h3>
                    <p class="text-slate-600">Sistem akan menganalisis dan memberikan diagnosis lengkap dengan
                        rekomendasi.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Unggulan -->
    <section id="features" class="py-20 px-6 bg-blue-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-4">FITUR
                    UNGGULAN</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Mengapa Memilih Sistem Kami?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl feature-card transition duration-300">
                    <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mb-6">
                        <i class="fas fa-bolt text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Diagnosis Cepat</h3>
                    <p class="text-slate-600">Hanya butuh 5 menit untuk menyelesaikan kuesioner dan mendapatkan hasil
                        akurat.</p>
                </div>
                <div class="bg-white p-8 rounded-xl feature-card transition duration-300">
                    <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mb-6">
                        <i class="fas fa-user-shield text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Privasi Terjamin</h3>
                    <p class="text-slate-600">Data Anda dienkripsi dan tidak akan pernah dibagikan ke pihak ketiga.</p>
                </div>
                <div class="bg-white p-8 rounded-xl feature-card transition duration-300">
                    <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mb-6">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Analisis Mendalam</h3>
                    <p class="text-slate-600">Menggabungkan kecanggihan teknologi dengan pemahaman mendalam tentang
                        psikologi manusia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 gradient-bg text-white">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Mengurangi FOMO Anda?</h2>
            <p class="text-xl mb-8 opacity-90">Mulai perjalanan anda menuju hubungan yang lebih sehat dengan media
                sosial hari ini.</p>
            <a href="/register"
                class="inline-block px-8 py-4 bg-white text-blue-600 rounded-full font-bold hover:bg-slate-100 transition shadow-lg">
                Daftar Sekarang - Gratis <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- FAQ -->
    <section id="about" class="py-20 px-6 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <span
                    class="inline-block px-4 py-1 bg-blue-100 text-blue-600 rounded-full text-sm font-medium mb-4">TENTANG
                    KAMI</span>
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-lg text-slate-600">Temukan jawaban untuk pertanyaan umum tentang sistem kami.</p>
            </div>

            <div class="space-y-4">
                <div class="border border-slate-200 rounded-xl overflow-hidden transition-all duration-300">
                    <button
                        class="faq-toggle w-full px-6 py-4 text-left font-medium text-slate-800 bg-slate-50 hover:bg-slate-100 transition flex justify-between items-center">
                        <span>Apa itu FOMO?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div
                        class="faq-content px-6 py-0 bg-white text-slate-600 max-h-0 overflow-hidden transition-all duration-300">
                        <div class="pb-4 pt-0">
                            FOMO (Fear of Missing Out) adalah kecemasan sosial yang muncul dari kekhawatiran akan
                            melewatkan pengalaman berharga yang dialami orang lain, terutama yang terlihat di media
                            sosial. Fenomena ini banyak dialami oleh generasi remaja akibat kecanduan media sosial, di
                            mana mereka merasa harus selalu terhubung dan mengetahui apa yang dilakukan orang lain. FOMO
                            dapat menyebabkan stres, kecemasan, dan perilaku kompulsif dalam memeriksa perangkat
                            digital.</div>
                    </div>
                </div>

                <div class="border border-slate-200 rounded-xl overflow-hidden transition-all duration-300">
                    <button
                        class="faq-toggle w-full px-6 py-4 text-left font-medium text-slate-800 bg-slate-50 hover:bg-slate-100 transition flex justify-between items-center">
                        <span>Bagaimana sistem ini mendiagnosis FOMO?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div
                        class="faq-content px-6 py-0 bg-white text-slate-600 max-h-0 overflow-hidden transition-all duration-300">
                        <div class="pb-4 pt-0">
                            Sistem kami menggunakan kuesioner berbasis penelitian psikologi yang divalidasi untuk
                            mengukur
                            berbagai aspek FOMO. Jawaban Anda dianalisis oleh algoritma pakar yang dikembangkan bersama
                            dengan
                            psikolog untuk memberikan diagnosis yang akurat.
                        </div>
                    </div>
                </div>

                <div class="border border-slate-200 rounded-xl overflow-hidden transition-all duration-300">
                    <button
                        class="faq-toggle w-full px-6 py-4 text-left font-medium text-slate-800 bg-slate-50 hover:bg-slate-100 transition flex justify-between items-center">
                        <span>Apakah hasil diagnosis ini menggantikan konsultasi dengan psikolog?</span>
                        <i class="fas fa-chevron-down transition-transform duration-300"></i>
                    </button>
                    <div
                        class="faq-content px-6 py-0 bg-white text-slate-600 max-h-0 overflow-hidden transition-all duration-300">
                        <div class="pb-4 pt-0">
                            Hasil ini hanya digunakan sebagai alat skrining awal dan bukan pengganti diagnosis dari
                            tenaga profesional. Jika hasil menunjukkan tingkat FOMO yang cukup tinggi, sebaiknya anda
                            mempertimbangkan untuk berbicara dengan psikolog agar bisa mendapatkan bantuan dan dukungan
                            yang tepat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-6 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 FOMO Expert System.
            </p>
        </div>
    </footer>


    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-8 right-8 w-12 h-12 rounded-full gradient-bg text-white shadow-lg hidden items-center justify-center">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script>
        // Back to Top Button
        const backToTopButton = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
                backToTopButton.classList.add('flex');
            } else {
                backToTopButton.classList.add('hidden');
                backToTopButton.classList.remove('flex');
            }
        });

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // FAQ Accordion
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const faqItem = button.closest('.border');
                const content = faqItem.querySelector('.faq-content');
                const icon = button.querySelector('i');

                // Close all other open FAQs
                document.querySelectorAll('.faq-content').forEach(item => {
                    if (item !== content && item.style.maxHeight) {
                        item.style.maxHeight = null;
                        item.previousElementSibling.querySelector('i').style.transform =
                            'rotate(0deg)';
                        item.previousElementSibling.classList.remove('bg-slate-100');
                    }
                });

                // Toggle current FAQ
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.style.transform = 'rotate(0deg)';
                    button.classList.remove('bg-slate-100');
                } else {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                    button.classList.add('bg-slate-100');
                }
            });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
