<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $currentUser = Auth::user();
        return view('admin.karyawan_admin.karyawan_admin', compact('users', 'currentUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.karyawan')->with('success', 'User berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() == $user->id) {
            return redirect()->route('admin.karyawan')->with('error', 'Tidak bisa mengubah data user yang sedang login!');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:6',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        return redirect()->route('admin.karyawan')->with('success', 'User berhasil diubah');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (Auth::id() == $user->id) {
            return redirect()->route('admin.karyawan')->with('error', 'Tidak bisa menghapus user yang sedang login!');
        }
        $user->delete();
        return redirect()->route('admin.karyawan')->with('success', 'User berhasil dihapus');
    }
}
