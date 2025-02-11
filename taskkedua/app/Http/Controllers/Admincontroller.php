<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        return view('dashboard', compact('totalUsers', 'totalAdmins'));
    }

    public function indek()
    {
        return view('dashboard');
    }

    public function kelola(Request $request)
    {
        $search = $request->input('search');
    
        // Jika ada kata kunci pencarian, filter data user
        $users = User::where('username', 'like', '%' . $search . '%')
                     ->orWhere('email', 'like', '%' . $search . '%')
                     ->orWhere('no_hp', 'like', '%' . $search . '%')
                     ->orWhere('address', 'like', '%' . $search . '%')
                     ->orWhere('jurusan', 'like', '%' . $search . '%')
                     ->paginate(10);
    
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'Admin')->count();
    
        // Cek apakah hasil pencarian kosong
        $message = null;
        if ($search && $users->isEmpty()) {
            $message = "Data dengan kata kunci '$search' tidak ditemukan.";
        }
        return view('userkelola', compact('users', 'totalUsers', 'totalAdmins', 'message'));
    }
    
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:15',
            'address' => 'required|string|max:255', // Perbaiki ini
            'jurusan' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive',
        ],
        [
            'username.required' => 'Username is required.', // Custom error message
            'email.required' => 'Email is required.', // Custom error message
            'no_hp.required' => 'Phone number is required.', // Custom error message
            'address.required' => 'Address is required.',    // Custom error message
        ]
    );
        
    
        try {
            $user = User::findOrFail($id);
            $user->update([
                'username' => $request->username,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'address' => $request->address,
                'jurusan' => $request->jurusan,
                'status' => $request->status === 'Active' ? 1 : 0,
            ]);
            alert()->success('Success', 'User data updated successfully!');
            return redirect('/kelola');
        } catch (Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            alert()->error('Error', 'Failed to update user. Please try again.');
            return redirect('/kelola');
        }
    }
    

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        $request->session()->regenerate();

        $user = Auth::user();
        if ($user->status == 0) {
            Auth::logout();
            FacadesAlert::error('Account Inactive', 'Your account has been deactivated.');
            return redirect()->route('login');
        }

        $role = $user->role;
        if ($role === 'Admin') {
            FacadesAlert::success('Success', 'Welcome back, ' . $role);
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'User') {
            FacadesAlert::success('Success', 'Welcome back, ' . $role);
            return redirect()->route('user.dashboard');
        }
    }

    FacadesAlert::error('Login Failed', 'The provided credentials do not match our records.');
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|string|max:15|unique:users,no_hp',
            'address' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'password' => 'required|min:8|confirmed',
        ]);
        
        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'User',
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
                'address' => $request->address,
                'status' => 0,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully!',
                'user' => $user
            ], 201);
        } catch (Exception $e) {
            // Tangani error lainnya
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }


    public function createuser(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'no_hp' => 'required|string|max:15|unique:users,no_hp',
                'address' => 'required|string|max:255',
                'jurusan' => 'required|string|max:100',
                'password' => 'required|min:8|confirmed',
            ]);
    
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'User',
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
                'address' => $request->address,
                'status' => 0,
            ]);
    
            return response()->json(['success' => 'Akun berhasil dibuat. Silakan login.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flash('success', 'Anda telah logout.');
        return redirect()->route('login');
    }
    public function destroy($id)
{
    try {
        $user = User::find($id);
        if (!$user) {
            FacadesAlert::error('Error', 'User not found.');
            return redirect()->route('users.kelola');
        }

        $user->delete();
        FacadesAlert::success('Success', 'User deleted successfully!');
        return redirect()->route('users.kelola');
    } catch (Exception $e) {
        Log::error('Error deleting user: ' . $e->getMessage());
        FacadesAlert::error('Error', 'Failed to delete user. Please try again.');
        return redirect()->route('users.kelola');
    }
}

}
