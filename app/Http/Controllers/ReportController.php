<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
// Pastikan baris facade di bawah ini ada!
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; 

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(5);
        return view('welcome', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|max:5024', // buat nullable agar opsional
        ]);

        $imagePath = null;

        // JURUS CLOUDINARY (Ganti store local yang bikin error)
        if ($request->hasFile('image')) {
            try {
                // Upload ke Cloudinary, bukan ke storage Vercel
                $upload = Cloudinary::upload($request->file('image')->getRealPath(), [
                    'folder' => 'bukti-laporan'
                ]);
                // Ambil link URL gambarnya
                $imagePath = $upload->getSecurePath();
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal upload gambar: ' . $e->getMessage());
            }
        }

        // Simpan ke Database Neon
        Report::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'category' => $request->category,
            'location_name' => $request->location_name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'image_path' => $imagePath, // Berisi URL Cloudinary jika ada gambar
            'status' => 'pending', 
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}
