<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class PinjamanController extends Controller
{
    public function getAllPinjamanUser()
    {
        $user = Auth::user();

        $pinjamans = Pinjaman::where('user_id', $user->id)
            ->orderBy('created_at')
            ->paginate(5);
        return view('pinjaman.index', compact('user', 'pinjamans'));
    }

    public function createPinjaman(Request $request)
    {
        try {
            // $cleanNumber = preg_replace('/\D/', '', $request->mileage);
            $newPinjaman = Pinjaman::create([
                'id' => Str::uuid(),
                'user_id' => Auth::user()->id,
                'no_rek' => $request->noRek,
                'tenor' => $request->tenor,
                'total_pinjaman' => $request->totalPinjaman,
                'status' => 'PENDING'
            ]);
            $newPinjaman->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to ajukan Pinjaman: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Success ajukan Pinjaman!');
    }

    public function updateStatusPinjaman(Request $request, $pinjamanId)
    {
        try {
            $pinjaman = Pinjaman::findOrFail($pinjamanId);
            $pinjaman->status = strtoupper($request->status);
            $pinjaman->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to ' . $request->status . ' Pinjaman: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Success ' . $request->status . ' Pinjaman!');
    }

    public function viewPinjaman($pinjamanId)
    {
        try {
            $pinjaman = Pinjaman::findOrFail($pinjamanId);
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('pinjaman.detail', compact('user', 'pinjaman'));
    }
}
