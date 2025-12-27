<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary; // Wajib ada

class ReportController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'category' => 'required',
            'location_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        try {
            // 2. Upload ke Cloudinary
            // 'bukti-laporan' adalah nama folder di dashboard Cloudinary nanti
            $upload = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'bukti-laporan'
            ]);
            
            // Ambil URL aman (HTTPS) dari Cloudinary
            $imageUrl = $upload->getSecurePath();

            // 3. Simpan ke Database Neon
            Report::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'category' => $request->category,
                'location_name' => $request->location_name,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'image_path' => $imageUrl, // Simpan URL Cloudinary, bukan nama file lokal
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Laporan berhasil terkirim!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal upload: ' . $e->getMessage());
        }
    }
}
