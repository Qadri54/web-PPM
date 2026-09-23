<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo_kemenkes.png') }}">
    <title>{{ $title ?? 'Pusat Penjaminan Mutu - Poltekkes Kemenkes Medan' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 text-slate-800 font-sans antialiased selection:bg-primary-500 selection:text-white">

    <!-- Memanggil Sub-Komponen Navbar -->
    <x-frontend.navbar />

    <main class="w-full min-h-screen flex flex-col">
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
