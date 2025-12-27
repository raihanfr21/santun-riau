<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; 

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->paginate(5);
        
        return view('welcome', compact('reports'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:5024',
        ]);

        try {
            // Upload langsung ke Cloudinary
            $upload = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'bukti-laporan'
            ]);
            
            $imageUrl = $upload->getSecurePath();

            Report::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'category' => $request->category,
                'location_name' => $request->location_name,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'description' => $request->description,
                'image_path' => $imageUrl,
                'status' => 'pending',
            ]);

        return redirect()->back()->with('success', 'Laporan berhasil dikirim! Petugas kami akan segera menindaklanjuti.');
    }
}
