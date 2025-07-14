<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    // Menampilkan form
    public function create()
    {
        return view('auth.register'); 
    }
    public function showLogin()
    {
        return view('auth.login');
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(value: $request->password),
            'role' => 'user',
        ]);

        return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Redirect berdasarkan role
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }
    
        return back()->with('error', 'Email atau password salah.');
    }
    
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function exportUserTransactionPdf()
{
    $transactions = Transaction::where('user_id', Auth::id())->get();

    $pdf = Pdf::loadView('user.transaction_pdf', compact('transactions'));

    return $pdf->download('transaksi_saya_' . Carbon::now()->format('Ymd_His') . '.pdf');
}
}


