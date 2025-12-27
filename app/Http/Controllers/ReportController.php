<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Tambahkan ini agar upload jalan

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru dengan paginasi
        $reports = Report::latest()->paginate(5);
        
        return view('welcome', compact('reports'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email',
            'phone'         => 'required',
            'category'      => 'required',
            'location_name' => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required',
            'description'   => 'required',
            'image'         => 'required|image|file|max:5024',
        ]);

        try {
            // 2. Upload langsung ke Cloudinary
            $upload = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'bukti-laporan'
            ]);
            
            $imageUrl = $upload->getSecurePath();

            // 3. Simpan ke Database
            Report::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'category'      => $request->category,
                'location_name' => $request->location_name,
                'latitude'      => $request->latitude,
                'longitude'     => $request->longitude,
                'description'   => $request->description,
                'image_path'    => $imageUrl,
                'status'        => 'pending',
            ]);

            return redirect()->back()->with('success', 'Laporan berhasil dikirim! Petugas kami akan segera menindaklanjuti.');

        } catch (\Exception $e) {
            // Jika gagal, kembalikan dengan pesan error
            return redirect()->back()->with('error', 'Gagal mengirim laporan: ' . $e->getMessage());
        }
    }
}
