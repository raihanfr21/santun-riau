<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SANTUN RIAU - Layanan Pengaduan Masyarakat</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'riau-green': '#047857',
                        'riau-gold': '#F59E0B', 
                        'riau-dark': '#064E3B',
                    },
                    fontFamily: {
                        'heading': ['"Playfair Display"', 'serif'],
                        'body': ['"Inter"', 'sans-serif'],
                    },
                    backgroundImage: {
                        'songket-pattern': "url('/assets/songket.png')",
                    }
                }
            }
        }
    </script>

    <style>
        .selembayung-top {
            clip-path: polygon(0 0, 100% 0, 100% 85%, 50% 100%, 0 85%);
        }
        #imageModal:not(.hidden) {
            animation: fadeIn 0.3s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="font-body bg-gray-50 text-gray-800">

    <nav class="bg-riau-dark text-white fixed w-full z-50 shadow-lg border-b-4 border-riau-gold">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Coat_of_arms_of_Riau.svg/960px-Coat_of_arms_of_Riau.svg.png" alt="Logo Riau" class="h-12 w-auto drop-shadow-md bg-white rounded-full p-1">
                <div>
                    <h1 class="font-heading font-bold text-xl tracking-wide text-riau-gold">SANTUN RIAU</h1>
                    <p class="text-xs text-gray-300 tracking-wider">Provinsi Riau Homeland of Melayu</p>
                </div>
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-semibold uppercase tracking-widest">
                <a href="#home" class="hover:text-riau-gold transition">Beranda</a>
                <a href="#tentang" class="hover:text-riau-gold transition">Tentang</a>
                <a href="#kategori" class="hover:text-riau-gold transition">Kategori</a>
                <a href="#lapor" class="px-4 py-2 bg-riau-gold text-riau-dark rounded-full hover:bg-yellow-400 transition">Buat Laporan</a>
            </div>
        </div>
    </nav>

    <section id="home" class="relative pt-32 pb-24 bg-riau-green selembayung-top text-white text-center overflow-hidden">
        <div class="absolute inset-0 bg-songket-pattern bg-cover bg-center blur-sm scale-105"></div>

        <div class="absolute inset-0 bg-black opacity-40"></div>
        
        <div class="container mx-auto px-6 relative z-10">
            <span data-aos="fade-down" data-aos-delay="100" class="inline-block py-1 px-3 border border-riau-gold text-riau-gold rounded-full text-xs font-bold tracking-widest mb-4 uppercase">Layanan Aspirasi Masyarakat</span>
            
            <h1 data-aos="zoom-in" data-aos-delay="300" class="font-heading text-4xl md:text-6xl font-bold mb-4 leading-tight">
                Bersama Membangun <br><span class="text-riau-gold">Bumi Lancang Kuning</span>
            </h1>
            
            <p data-aos="fade-up" data-aos-delay="500" class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Sampaikan aspirasi dan keluhan Anda untuk pembangunan Provinsi Riau yang lebih baik, transparan, dan terpercaya.
            </p>
            
            <div data-aos="fade-up" data-aos-delay="700">
                <a href="#lapor" class="inline-block bg-riau-gold text-riau-dark font-bold text-lg px-8 py-3 rounded-md shadow-lg hover:bg-yellow-400 hover:shadow-xl transition transform hover:-translate-y-1">
                    <i class="fas fa-bullhorn mr-2"></i> Laporkan Sekarang
                </a>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white relative z-20 -mt-10 mb-10">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-xl shadow-xl p-8 border-t-4 border-riau-gold max-w-4xl mx-auto flex flex-col md:flex-row justify-around items-center gap-8 text-center">
                
                <div class="group">
                    <div class="w-32 h-32 md:w-40 md:h-40 mx-auto mb-4 p-1 border-2 border-riau-gold rounded-full">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Gubernur_Riau_Abdul_Wahid.jpg/500px-Gubernur_Riau_Abdul_Wahid.jpg" 
                             alt="Gubernur Riau" 
                             class="w-full h-full object-cover rounded-full shadow-md group-hover:scale-105 transition duration-300">
                    </div>
                    <h3 class="font-heading text-xl font-bold text-riau-dark">Abdul Wahid, S.Pd.I., M.Si</h3>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Gubernur Riau</p>
                </div>

                <div class="hidden md:block w-px h-32 bg-gray-200"></div>

                <div class="group">
                    <div class="w-32 h-32 md:w-40 md:h-40 mx-auto mb-4 p-1 border-2 border-riau-gold rounded-full">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Wakil_Gubernur_Riau_Sofyan_Franyata_Hariyanto.jpg/500px-Wakil_Gubernur_Riau_Sofyan_Franyata_Hariyanto.jpg" 
                             alt="Wakil Gubernur Riau" 
                             class="w-full h-full object-cover rounded-full shadow-md group-hover:scale-105 transition duration-300">
                    </div>
                    <h3 class="font-heading text-xl font-bold text-riau-dark">Ir. H. S.F. Haryanto, M.T</h3>
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Wakil Gubernur Riau</p>
                </div>

            </div>
        </div>
    </section>

 <section id="tentang" class="py-20 container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <h2 class="font-heading text-3xl font-bold text-riau-dark mb-4 border-l-4 border-riau-gold pl-4">Tentang SANTUN Riau</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    <strong>SANTUN (Sistem Aduan Terpadu Nusa)</strong> adalah kanal resmi Pemerintah Provinsi Riau untuk menerima aspirasi dan pengaduan masyarakat secara daring.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Kami menjunjung tinggi nilai-nilai budaya Melayu dalam pelayanan publik. Aplikasi ini hadir untuk memangkas birokrasi dan mendekatkan pemerintah dengan rakyatnya.
                </p>
            </div>
            <div class="md:w-1/2 grid grid-cols-2 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-riau-green text-center">
                    <i class="fas fa-bolt text-4xl text-riau-gold mb-3"></i>
                    <h3 class="font-bold text-gray-800">Cepat</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-riau-green text-center">
                    <i class="fas fa-eye text-4xl text-riau-gold mb-3"></i>
                    <h3 class="font-bold text-gray-800">Transparan</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-riau-green text-center">
                    <i class="fas fa-shield-alt text-4xl text-riau-gold mb-3"></i>
                    <h3 class="font-bold text-gray-800">Aman</h3>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-riau-green text-center">
                    <i class="fas fa-users text-4xl text-riau-gold mb-3"></i>
                    <h3 class="font-bold text-gray-800">Mudah</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="kategori" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="font-heading text-3xl font-bold text-riau-dark mb-2">Kategori Laporan</h2>
            <p class="text-gray-500 mb-12">Jenis permasalahan yang dapat Anda laporkan</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-default">
                    <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-fire text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Karhutla</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-default">
                    <div class="w-16 h-16 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-road text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Infrastruktur</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-default">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Pendidikan</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition cursor-default">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hand-holding-medical text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Kesehatan</h3>
                </div>
            </div>
        </div>
    </section>

<section id="lapor" class="py-20 bg-riau-dark bg-songket-pattern relative">
        <div class="container mx-auto px-6 relative z-10">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden max-w-4xl mx-auto flex flex-col md:flex-row">
                
                <div class="md:w-1/3 bg-riau-gold p-8 flex flex-col justify-center items-center text-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Coat_of_arms_of_Riau.svg/960px-Coat_of_arms_of_Riau.svg.png" alt="Logo Riau" class="w-24 h-auto mb-6 drop-shadow-md">
                    <h3 class="font-heading text-2xl font-bold text-riau-dark mb-2">Takkan Melayu Hilang di Bumi</h3>
                    <p class="text-sm text-riau-dark font-medium">Partisipasi Anda adalah wujud cinta pada negeri.</p>
                </div>

                <div class="md:w-2/3 p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Formulir Pengaduan</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                            <strong class="font-bold">Terima Kasih!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="Cth: Budi Santoso" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Email Aktif</label>
                                <input type="email" name="email" placeholder="email@contoh.com" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Nomor HP / WA</label>
                                <input type="tel" name="phone" placeholder="0812..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green" required>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-600 mb-1">Kategori Laporan</label>
                                <select name="category" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green bg-white">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    <option value="karhutla">Kebakaran Hutan (Karhutla)</option>
                                    <option value="infrastruktur">Jalan / Jembatan Rusak</option>
                                    <option value="banjir">Banjir & Lingkungan</option>
                                    <option value="kesehatan">Layanan Kesehatan</option>
                                    <option value="pungli">Pungutan Liar (Pungli)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Lokasi Kejadian</label>
                            <div class="flex gap-2">
                                <input type="text" name="location_name" id="locationInput" placeholder="Nama Jalan / Desa / Kecamatan" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green">
                                <button type="button" onclick="getLocation()" class="bg-gray-200 text-gray-700 px-3 py-2 rounded-lg hover:bg-gray-300 transition text-sm flex items-center gap-1">
                                    <i class="fas fa-map-marker-alt"></i> <span class="hidden md:inline">Ambil GPS</span>
                                </button>
                            </div>
                            
                            <input type="hidden" name="latitude" id="latInput">
                            <input type="hidden" name="longitude" id="longInput">
                            
                            <p id="geoStatus" class="text-xs text-riau-green mt-1 italic hidden">Koordinat berhasil diambil!</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Detail Laporan</label>
                            <textarea name="description" rows="4" placeholder="Jelaskan masalah secara rinci..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-riau-green" required></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-600 mb-1">Bukti Foto / Dokumen (Opsional)</label>
                            <input type="file" name="image" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-riau-green file:text-white hover:file:bg-green-700 cursor-pointer">
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, PDF. Maks 5MB.</p>
                        </div>

                        <button type="submit" class="w-full bg-riau-green text-white font-bold py-3 rounded-lg hover:bg-green-700 transition shadow-lg transform active:scale-95">
                            KIRIM LAPORAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="pantau" class="py-20 bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl font-bold text-riau-dark mb-2">Pantau Laporan</h2>
                <p class="text-gray-500">Transparansi tindak lanjut laporan masyarakat terkini.</p>
            </div>

<div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-riau-dark text-white text-sm uppercase tracking-wider">
                                <th class="p-4 font-semibold">Tanggal</th>
                                <th class="p-4 font-semibold">Pelapor</th>
                                <th class="p-4 font-semibold">Kategori</th>
                                <th class="p-4 font-semibold w-1/3">Isi Laporan</th>
                                <th class="p-4 font-semibold">Bukti</th>
                                <th class="p-4 font-semibold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                            @forelse($reports as $report)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 text-gray-500">
                                    {{ $report->created_at->format('d M Y') }}
                                </td>

                                <td class="p-4">
                                    <div class="font-bold text-gray-800">
                                        {{ substr($report->name, 0, 3) }}xxx
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        <i class="fas fa-phone-alt text-riau-gold mr-1"></i> 
                                        {{ substr($report->phone, 0, 7) }}xxxx
                                    </div>
                                </td>

                                <td class="p-4">
                                    <span class="px-2 py-1 rounded text-xs font-bold uppercase 
                                        {{ $report->category == 'karhutla' ? 'bg-red-100 text-red-700' : 
                                          ($report->category == 'infrastruktur' ? 'bg-gray-200 text-gray-700' : 'bg-blue-100 text-blue-700') }}">
                                        {{ $report->category }}
                                    </span>
                                </td>

                                <td class="p-4">
                                    {{ Str::limit($report->description, 80) }}
                                </td>

                                <td class="p-4">
                                    @if($report->image_path)
                                        <button onclick="openGallery('{{ asset('storage/'.$report->image_path) }}')" 
                                                class="text-riau-green hover:text-riau-dark font-semibold text-xs flex items-center gap-1 border border-riau-green px-2 py-1 rounded hover:bg-green-50 transition">
                                            <i class="fas fa-eye"></i> Lihat Foto
                                        </button>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Tidak ada</span>
                                    @endif
                                </td>

                                <td class="p-4 text-center">
                                    @if($report->status == 'pending')
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700 border border-yellow-200">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif($report->status == 'proses')
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 border border-blue-200">
                                            <i class="fas fa-tools mr-1"></i> Proses
                                        </span>
                                    @elseif($report->status == 'selesai')
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                            <i class="fas fa-check-circle mr-1"></i> Selesai
                                        </span>
                                    @else
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">
                                            <i class="fas fa-times-circle mr-1"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-gray-500 italic">
                                    Belum ada laporan yang masuk.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 bg-gray-50 border-t border-gray-200">
                    {{ $reports->links() }}
                </div>
            </div>
            
            <p class="text-center text-xs text-gray-400 mt-6">
                * Demi privasi, Nama, Nomor HP, dan Email pelapor disamarkan oleh sistem.
            </p>
        </div>
    </section>

    <footer class="bg-gray-900 text-white pt-16 pb-6 border-t-8 border-riau-gold">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between gap-8 mb-12">
                <div class="md:w-1/3">
                    <h3 class="font-heading text-2xl font-bold text-riau-gold mb-4">SANTUN RIAU</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Dikelola oleh Pemerintah Provinsi Riau.
                    </p>
                </div>
                
                <div class="md:w-1/3">
                    <h4 class="font-bold text-lg mb-4 text-white border-b border-gray-700 inline-block pb-1">Kontak Kami</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-riau-gold"></i>
                            <span>Jl. Jenderal Sudirman No. 460, Pekanbaru, Riau 28126</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-riau-gold"></i>
                            <span>pengaduan@riau.go.id</span>
                        </li>
                    </ul>
                </div>

                <div class="md:w-1/3">
                    <h4 class="font-bold text-lg mb-4 text-white border-b border-gray-700 inline-block pb-1">Jam Operasional</h4>
                    <table class="text-sm text-gray-400 w-full">
                        <tr><td class="py-1">Senin - Kamis</td><td class="text-right text-white">08:00 - 16:00 WIB</td></tr>
                        <tr><td class="py-1">Jumat</td><td class="text-right text-white">08:00 - 16:30 WIB</td></tr>
                        <tr><td class="py-1 text-riau-gold">Sabtu - Minggu</td><td class="text-right text-riau-gold">Libur</td></tr>
                    </table>
                </div>
            </div>
            <div class="text-center border-t border-gray-800 pt-6">
                <p class="text-xs text-gray-500">&copy; 2025 Raihan Fathurrahman. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-95 flex items-center justify-center p-4 backdrop-blur-sm">
        
        <button onclick="closeGallery()" class="absolute top-5 right-5 text-white text-4xl hover:text-gray-300 focus:outline-none transition">
            &times;
        </button>
    
        <button onclick="changeImage(-1)" class="absolute left-4 md:left-10 text-white text-4xl p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition focus:outline-none z-10">
            <i class="fas fa-chevron-left"></i>
        </button>
    
        <div class="relative max-w-5xl max-h-[85vh] flex flex-col items-center">
            <img id="modalImage" src="" alt="Bukti Laporan" class="max-h-[80vh] w-auto rounded-lg shadow-2xl border-2 border-gray-800 object-contain">
            <p class="text-gray-300 mt-4 text-sm tracking-widest uppercase bg-black bg-opacity-50 px-4 py-1 rounded-full">
                <i class="fas fa-camera mr-2"></i> Bukti Laporan Warga
            </p>
        </div>
    
        <button onclick="changeImage(1)" class="absolute right-4 md:right-10 text-white text-4xl p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition focus:outline-none z-10">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <script>

        function getLocation() {
            const btn = document.querySelector('button[onclick="getLocation()"]');
            if (navigator.geolocation) {
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        function showPosition(position) {
            const lat = position.coords.latitude;
            const long = position.coords.longitude;
            const btn = document.querySelector('button[onclick="getLocation()"]');
            
            document.getElementById('locationInput').value = `Lat: ${lat}, Long: ${long}`;
            document.getElementById('latInput').value = lat;
            document.getElementById('longInput').value = long;
            document.getElementById('geoStatus').classList.remove('hidden');
            
            btn.innerHTML = '<i class="fas fa-check"></i> Sukses';
            btn.classList.add('bg-green-100', 'text-green-700');
        }

        function showError(error) {
            const btn = document.querySelector('button[onclick="getLocation()"]');
            btn.innerHTML = '<i class="fas fa-map-marker-alt"></i> Ambil GPS';
            alert("Gagal mengambil lokasi. Pastikan GPS aktif.");
        }

        const galleryImages = [
            @foreach($reports as $r)
                @if($r->image_path)
                    "{{ asset('storage/'.$r->image_path) }}",
                @endif
            @endforeach
        ];

        let currentImageIndex = 0;
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');

        function openGallery(imageUrl) {
            currentImageIndex = galleryImages.indexOf(imageUrl);
            
            if (currentImageIndex !== -1) {
                modalImg.src = imageUrl;
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            }
        }

        function closeGallery() {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function changeImage(direction) {
            if (galleryImages.length === 0) return;

            currentImageIndex += direction;

            if (currentImageIndex >= galleryImages.length) {
                currentImageIndex = 0; 
            } else if (currentImageIndex < 0) {
                currentImageIndex = galleryImages.length - 1; 
            }

            modalImg.style.opacity = 0;
            setTimeout(() => {
                modalImg.src = galleryImages[currentImageIndex];
                modalImg.style.opacity = 1;
            }, 100);
        }

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeGallery();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (modal.classList.contains('hidden')) return;
            
            if (e.key === 'ArrowLeft') changeImage(-1);
            if (e.key === 'ArrowRight') changeImage(1);
            if (e.key === 'Escape') closeGallery();
        });
    </script>
</body>
</html>