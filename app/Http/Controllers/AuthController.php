<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $identifier = $request->username;

        // Mencari pengguna berdasarkan username atau email
        $user = User::where('email', $identifier)
            ->orWhere('username', $identifier)
            ->first();

        if (!$user || !Auth::attempt([
            'email' => $user->email,
            'password' => $request->password,
        ], $request->boolean('remember'))) {

            return back()
                ->withErrors([
                    'username' => 'Username/email atau password salah.',
                ])
                ->onlyInput('username');
        }

        // Memeriksa status akun
        if ($user->status !== 'aktif') {
            Auth::logout();

            return back()->withErrors([
                'username' => 'Akun kamu sedang tidak aktif.',
            ]);
        }

        // Memperbarui session
        $request->session()->regenerate();

        // Mencatat waktu login terakhir
        $user->update([
            'last_login_at' => now(),
        ]);

        return redirect()->intended('/akun')
            ->with('success', 'Berhasil login!');
    }

    // Halaman informasi akun
    public function profile()
    {
        return view('account.profile', [
            'user' => Auth::user()
        ]);
    }

    // Proses ganti password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[^a-zA-Z0-9]/',
            ],
        ]);

        $user = Auth::user();

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Password berhasil diperbarui!'
        );
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Kamu berhasil logout.');
    }
}
