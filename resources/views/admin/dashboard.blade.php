<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SANTUN RIAU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'riau-green': '#047857',
                        'riau-gold': '#F59E0B', 
                        'riau-dark': '#064E3B',
                    }
                }
            }
        }
    </script>
    <style>
        #detailModal { transition: opacity 0.3s ease; }
        #detailModal.hidden { pointer-events: none; opacity: 0; }
        #detailModal:not(.hidden) { opacity: 1; pointer-events: auto; }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-riau-dark text-white flex flex-col shadow-2xl hidden md:flex">
            <div class="h-16 flex items-center justify-center border-b border-green-800 bg-riau-green">
                <h1 class="text-xl font-bold tracking-wider">ADMIN SANTUN</h1>
            </div>
            
            <nav class="flex-1 px-2 py-4 space-y-2">
                <a href="#" class="flex items-center px-4 py-3 bg-riau-gold text-riau-dark rounded-lg font-bold">
                    <i class="fas fa-home w-6"></i> Dashboard
                </a>
                <a href="/" target="_blank" class="flex items-center px-4 py-3 text-gray-300 hover:bg-green-800 rounded-lg transition mt-8 border-t border-green-800">
                    <i class="fas fa-external-link-alt w-6"></i> Lihat Website
                </a>
            </nav>

            <div class="p-4 border-t border-green-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-sm transition text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-y-auto overflow-x-hidden relative">
            
            <header class="h-16 bg-white shadow flex items-center justify-between px-6 md:hidden">
                <span class="font-bold text-lg text-riau-dark">SANTUN Dashboard</span>
                <button><i class="fas fa-bars text-xl"></i></button>
            </header>

            <div class="p-6 md:p-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ringkasan Laporan</h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-riau-dark flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Masuk</p>
                            <h3 class="text-3xl font-bold text-gray-800">{{ $totalLaporan }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-riau-dark">
                            <i class="fas fa-folder text-xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Perlu Verifikasi</p>
                            <h3 class="text-3xl font-bold text-yellow-600">{{ $pending }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600">
                            <i class="fas fa-clock text-xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Sedang Dikerjakan</p>
                            <h3 class="text-3xl font-bold text-blue-600">{{ $proses }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                            <i class="fas fa-tools text-xl"></i>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Selesai</p>
                            <h3 class="text-3xl font-bold text-green-600">{{ $selesai }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="font-bold text-gray-700">Data Laporan Masuk</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-100 text-gray-500 uppercase tracking-wider font-bold">
                                <tr>
                                    <th class="px-6 py-3">Tanggal</th>
                                    <th class="px-6 py-3">Pelapor</th>
                                    <th class="px-6 py-3">Lokasi</th>
                                    <th class="px-6 py-3">Detail Masalah</th> <th class="px-6 py-3 text-center">Status Aksi</th>
                                    <th class="px-6 py-3 text-center">Hapus</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($reports as $report)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $report->created_at->format('d/m/Y') }} <br>
                                        <span class="text-xs text-gray-400">{{ $report->created_at->format('H:i') }} WIB</span>
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-800">{{ $report->name }}</div>
                                        <div class="text-xs text-blue-600">{{ $report->phone }}</div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="text-gray-800 font-medium">{{ Str::limit($report->location_name, 15) }}</div>
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="inline-block px-2 py-0.5 rounded text-xs font-bold mb-2
                                            {{ $report->category == 'karhutla' ? 'bg-red-100 text-red-600' : 'bg-gray-200 text-gray-600' }}">
                                            {{ ucfirst($report->category) }}
                                        </span>
                                        <br>
                                        <button onclick='openDetailModal(@json($report))' class="text-riau-green hover:text-green-800 font-semibold text-xs border border-riau-green px-3 py-1 rounded hover:bg-green-50 transition flex items-center gap-1">
                                            <i class="fas fa-eye"></i> Lihat Detail
                                        </button>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('admin.update', $report->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-xs font-bold cursor-pointer focus:outline-none focus:ring-2 focus:ring-riau-green
                                                {{ $report->status == 'pending' ? 'bg-yellow-100 text-yellow-700 border-yellow-300' : '' }}
                                                {{ $report->status == 'proses' ? 'bg-blue-100 text-blue-700 border-blue-300' : '' }}
                                                {{ $report->status == 'selesai' ? 'bg-green-100 text-green-700 border-green-300' : '' }}
                                                {{ $report->status == 'ditolak' ? 'bg-red-100 text-red-700 border-red-300' : '' }}">
                                                <option value="pending" {{ $report->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="proses" {{ $report->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                <option value="ditolak" {{ $report->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                                            </select>
                                        </form>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('admin.delete', $report->id) }}" method="POST" onsubmit="return confirm('Hapus laporan ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="p-8 text-center text-gray-400">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4 bg-gray-50 border-t">
                        {{ $reports->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="detailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden backdrop-blur-sm p-4">
        <div class="bg-white w-full max-w-2xl rounded-xl shadow-2xl overflow-hidden transform transition-all scale-100">
            <div class="bg-riau-dark px-6 py-4 flex justify-between items-center">
                <h3 class="text-white font-bold text-lg"><i class="fas fa-file-alt mr-2"></i> Detail Laporan</h3>
                <button onclick="closeDetailModal()" class="text-white hover:text-gray-300 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="p-6 max-h-[80vh] overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Informasi Pelapor</h4>
                            <p class="font-bold text-gray-800 text-lg" id="modalName">-</p>
                            <p class="text-sm text-gray-600 flex items-center gap-2 mt-1">
                                <i class="fas fa-envelope text-riau-gold"></i> <span id="modalEmail">-</span>
                            </p>
                            <p class="text-sm text-gray-600 flex items-center gap-2 mt-1">
                                <i class="fas fa-phone text-riau-gold"></i> <span id="modalPhone">-</span>
                            </p>
                        </div>

                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Lokasi Kejadian</h4>
                            <p class="text-gray-800 font-medium" id="modalLocation">-</p>
                            <a id="modalMapsLink" href="#" target="_blank" class="text-riau-green text-sm hover:underline flex items-center gap-1 mt-1">
                                <i class="fas fa-map-marked-alt"></i> Buka di Google Maps
                            </a>
                        </div>

                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-1">Kategori</h4>
                            <span id="modalCategory" class="px-3 py-1 rounded-full text-xs font-bold bg-gray-200 text-gray-700">
                                -
                            </span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Deskripsi Masalah</h4>
                            <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100 text-gray-700 text-sm leading-relaxed" id="modalDescription">
                                -
                            </div>
                        </div>

                        <div id="modalImageContainer" class="hidden">
                            <h4 class="text-xs font-bold text-gray-400 uppercase mb-2">Bukti Lampiran</h4>
                            <a id="modalImageLink" href="#" target="_blank">
                                <img id="modalImage" src="" class="w-full h-48 object-cover rounded-lg border hover:opacity-90 transition">
                            </a>
                            <p class="text-xs text-gray-400 mt-1 italic">*Klik gambar untuk memperbesar</p>
                        </div>
                        <div id="modalNoImage" class="hidden text-gray-400 text-sm italic border p-4 rounded-lg text-center bg-gray-50">
                            Tidak ada bukti foto dilampirkan.
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 px-6 py-3 flex justify-end">
                <button onclick="closeDetailModal()" class="px-4 py-2 bg-gray-300 text-gray-700 font-bold rounded hover:bg-gray-400 transition">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDetailModal(report) {
            document.getElementById('modalName').innerText = report.name;
            document.getElementById('modalEmail').innerText = report.email;
            document.getElementById('modalPhone').innerText = report.phone;
            document.getElementById('modalLocation').innerText = report.location_name;
            document.getElementById('modalDescription').innerText = report.description;
            document.getElementById('modalCategory').innerText = report.category.toUpperCase();
            
            if(report.latitude && report.longitude) {
                document.getElementById('modalMapsLink').href = `https://www.google.com/maps/search/?api=1&query=${report.latitude},${report.longitude}`;
                document.getElementById('modalMapsLink').classList.remove('hidden');
            } else {
                document.getElementById('modalMapsLink').classList.add('hidden');
            }

            const imgContainer = document.getElementById('modalImageContainer');
            const noImg = document.getElementById('modalNoImage');
            const img = document.getElementById('modalImage');
            const imgLink = document.getElementById('modalImageLink');

            if (report.image_path) {
                const imageUrl = `/storage/${report.image_path}`;
                img.src = imageUrl;
                imgLink.href = imageUrl;
                imgContainer.classList.remove('hidden');
                noImg.classList.add('hidden');
            } else {
                imgContainer.classList.add('hidden');
                noImg.classList.remove('hidden');
            }

            document.getElementById('detailModal').classList.remove('hidden');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDetailModal();
            }
        });
    </script>

</body>
</html>