<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginField => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('message', 'Berhasil login');
        }

        return redirect()->back()->withErrors([
            'login' => 'Login atau password salah.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        return redirect()->route('login')->with('success', 'Successfully logged out.');
    }

    public function index()
    {
        $users = User::with('role')->get();
        return view('dashboard.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/users'), $imageName);
            $validate['image'] = $imageName;
        }

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect()->route('users.index')->with('success', 'Berhasil menambah pengguna');
    }


    public function edit($id)
    {
        $user = User::with('role')->findOrFail($id);
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('images/users/' . $user->image))) {
                unlink(public_path('images/users/' . $user->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/users'), $imageName);
            $validate['image'] = $imageName;
        }

        if (!empty($request->password)) {
            $validate['password'] = bcrypt($request->password);
        } else {
            unset($validate['password']);
        }

        $user->update($validate);

        return redirect()->route('users.index')->with('success', 'Berhasil memperbarui pengguna');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        if ($user->image && file_exists(public_path('images/users/' . $user->image))) {
            unlink(public_path('images/users/' . $user->image));
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Berhasil menghapus pengguna');
    }
}
