<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function index()
    {
        $totalLaporan = Report::count();
        $pending = Report::where('status', 'pending')->count();
        $proses = Report::where('status', 'proses')->count();
        $selesai = Report::where('status', 'selesai')->count();

        $reports = Report::latest()->paginate(10);

        return view('admin.dashboard', compact('reports', 'totalLaporan', 'pending', 'proses', 'selesai'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $report->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }
    
    public function delete($id)
    {
        $report = Report::findOrFail($id);
        
        if ($report->image_path && file_exists(storage_path('app/public/' . $report->image_path))) {
            unlink(storage_path('app/public/' . $report->image_path));
        }

        $report->delete();
        
        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}