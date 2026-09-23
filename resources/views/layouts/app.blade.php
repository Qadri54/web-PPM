<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Pusat Penjaminan Mutu - Poltekkes Kemenkes Medan' }}</title>
    <!-- Tailwind CSS & Plus Jakarta Sans Font -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(37, 99, 235, 0.1)',
                        'glow': '0 0 20px rgba(37, 99, 235, 0.4)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 text-slate-800 font-sans antialiased selection:bg-primary-500 selection:text-white">

    <!-- Memanggil Sub-Komponen Navbar -->
    <x-frontend.navbar />

    <main class="min-h-screen">
        <!-- Konten Utama Halaman -->
        {{ $slot }}
    </main>

    <!-- Memanggil Sub-Komponen Footer -->
    <x-frontend.footer />
    
    <script>
        // Mengganti sumber logo kemenkes agar diambil dari aset frontend nantinya.
        document.addEventListener('DOMContentLoaded', () => {
            const logoPath = "{{ asset('images/logo_kemenkes.png') }}";
            const logoEl = document.getElementById('logo_kemenkes');
            const logoFooterEl = document.getElementById('logo_footer');
            if(logoEl && !logoPath.includes('http')) { 
                logoEl.src = "https://ui-avatars.com/api/?name=PPM&background=2563eb&color=fff";
                if(logoFooterEl) logoFooterEl.src = "https://ui-avatars.com/api/?name=PPM&background=2563eb&color=fff";
            }
        });
    </script>
</body>
</html>
