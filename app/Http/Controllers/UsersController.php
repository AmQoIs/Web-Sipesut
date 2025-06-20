<?php

namespace App\Http\Controllers;

use App\Constants\Roles;
use App\Models\User;
use App\View\Components\UsersActionButton;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $users = User::query();

    //         return DataTables::of($users)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $actionBtn = '<div class="flex justify-center"><a href="' . route('pages.admin.users.users', ['id' => $row->id]) . '" class="rounded text-white bg-[#5383e9] px-4 py-2">Detail</a></div>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //         ;
    //     }

    //     return view('pages.admin.users.users');
    // }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('is_deleted', false);

            return DataTables::eloquent($users)
                ->addColumn('action', function ($user) {
                    $current = Auth::user();
                    if ($current) {
                        if (($current->id != $user->id) && ($user->role !== Roles::ADMIN_MUTLAK)) {
                            return '<div class="flex justify-start gap-2">
                            <a href="' . route('admin.users.edit', ['id' => $user->id]) . '" class="rounded text-white bg-[#5383e9] px-4 py-2">Edit</a>
                            <form id="del' . $user->id . '" action="' . route('admin.users.delete', ['id' => $user->id]) . '" method="POST">
                                ' . csrf_field() . '
                                <button type="button" class="text-white px-4 py-2 rounded flex gap-2 bg-error" id="sub' . $user->id . '" onClick="send(' . $user->id . ')">Delete</button>
                            </form>
                        </div>';
                        } else if (($user->role == Roles::ADMIN_MUTLAK) && ($current->id == $user->id)) {
                            return '<div class="flex justify-start gap-2">
                            <a href="' . route('admin.users.edit', ['id' => $user->id]) . '" class="rounded text-white bg-[#5383e9] px-4 py-2">Edit</a>';
                        } else if ($user->role != Roles::ADMIN_MUTLAK) {
                            return '<div class="flex justify-start gap-2">
                            <a href="' . route('admin.users.edit', ['id' => $user->id]) . '" class="rounded text-white bg-[#5383e9] px-4 py-2">Edit</a>';
                        }
                    }
                })->addColumn('role', function ($row) {
                    if ($row->role == Roles::ADMIN) {
                        return "<span class='px-3 bg-success text-success bg-opacity-10 rounded-lg text-center'>ADMIN</span>";
                    } else if ($row->role == Roles::ADMIN_MUTLAK) {
                        return "<span class='px-3 bg-red-600 text-orange bg-opacity-10 rounded-lg text-center'>ADMIN MUTLAK</span>";
                    } else {
                        return "<span class='px-2 bg-secondary text-secondary bg-opacity-10 rounded-lg text-center'>ANGGOTA</span>";
                    }
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }

        return view('pages.admin.users.users');
    }

    public function getCurrentUser()
    {
        $user = Auth::user();

        if ($user) {
            return $user;
        } else {
            return null;
        }
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'role' => 'required',
            'old' => 'required|max:255|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'new' => 'required|max:255|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'pangkat_kerja' => 'nullable|string'
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.max' => 'Email maksimal 255 karakter',
            'role.required' => 'Role harus diisi',
            'old.regex' => 'Password Baru harus memiliki minimal 8 karakter, 1 huruf kapital, 1 huruf kecil, dan 1 karakter khusus (@$!%*?&)',
            'old.required' => 'Password Lama wajib diisi',
            'new.regex' => 'Konfirmasi Password harus memiliki minimal 8 karakter, 1 huruf kapital, 1 huruf kecil, dan 1 karakter khusus (@$!%*?&)',
            'new.required' => 'Konfirmasi Baru harus diisi',
        ]);

        if ($request->old == $request->new) {
            if ($request->role == 1) {
                $role = Roles::ADMIN;
            } else {
                $role = Roles::ANGGOTA;
            }

            $password = Hash::make($request->old);

            User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => $password,
                'is_deleted' => false,
                'role' => $role,
                'pangkat_kerja' => $request->pangkat_kerja
            ]);

            return response()->json(['success' => true, 'message' => 'Berhasil menambahkan User.']);
        }
        return response()->json(['success' => false, 'message' => 'Password tidak sama dengan Konfirmasi Password'], 400);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'pangkat_kerja' => 'nullable|string'
        ]);

        $user = User::findOrFail($id);

        if ($user) {
            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->pangkat_kerja = $request->pangkat_kerja;
            if ($request->role && $user->role != Roles::ADMIN_MUTLAK) {
                if ($request->role == 1) {
                    $role = Roles::ADMIN;
                } else {
                    $role = Roles::ANGGOTA;
                }

                $user->role = $role;
            }
            $user->save();

            return response()->json(['success' => true, 'message' => 'Berhasil mengubah User.']);
        }

        return response()->json(['success' => false, 'message' => 'Gagal mengubah User.'], 400);
    }

    public function changePassword(Request $request, $id)
    {
        $lolos = $request->validate([
            'old' => ['required', 'max:255', 'string'],
            'new' => ['required', 'max:255', 'string
            ', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
        ], [
            'old.required' => 'Password Lama wajib diisi',
            'new.regex' => 'Password Baru harus memiliki minimal 8 karakter, 1 huruf kapital, 1 huruf kecil, dan 1 karakter khusus (@$!%*?&)',
            'new.required' => 'Password Baru harus diisi',
        ]);

        $user = User::findOrFail($id);
        $password = Hash::make($request->new);

        if ($user) {
            if (Hash::check($request->old, $user->password)) {
                $user->password = $password;
                $user->save();
                return response()->json(['success' => true, 'message' => 'Berhasil mengubah Password.']);
            }
            return response()->json(['success' => false, 'message' => 'Pastikan Password Lama sesuai'], 400);
        }

        return response()->json(['success' => false, 'message' => 'Terjadi kesalahan, Gagal mengubah Password.'], 400);
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::where('role', '!=', 'ADMIN_MUTLAK')->findOrFail($id);


        if ($user) {
            $user->is_deleted = true;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Berhasil menghapus User.']);
        }
        return response()->json(['success' => false, 'message' => 'Gagal menghapus User.']);
    }

    public function getAdmin()
    {
        $admin = User::where('role', 'ADMIN')->get();

        if ($admin) {
            return $admin;
        }
    }
}
