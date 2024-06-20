<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Exception;

class UserController extends Controller
{

    public function getAllUsers()
    {
        $dataUsers = User::where('role', 'USER')
            ->orderBy('name')
            ->paginate(5);

        return view('admin.users.index', compact('dataUsers'));
    }

    public function viewUser($userId)
    {
        $user = User::findOrFail($userId);
        return view('admin.users.detail', compact('user'));
    }

    public function createUser(Request $request)
    {
        try {

            $umur = $this->countUmur($request->tanggalLahir);
            $limit = $this->countLimit($request->luasLahan);

            $newUser = User::create([
                'id' => Str::uuid(),
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempatLahir,
                'tanggal_lahir' => $request->tanggalLahir,
                'umur' => $umur,
                'agama' => $request->agama,
                'no_telp' => $request->noTelp,
                'luas_lahan' => $request->luasLahan,
                'limit' => $limit,
                'password' => Hash::make($request->noTelp)
            ]);
            // var_dump($newUser);die();
            $newUser->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed create new User: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'User created!');
    }

    public function updateUser(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        try {
            $user->name = $request->name;
            $user->nik = $request->nik;
            $user->tempat_lahir = $request->tempatLahir;
            $user->agama = $request->agama;
            $user->no_telp = $request->noTelp;

            if ($user->tanggal_lahir != $request->tanggalLahir) {
                $user->tanggal_lahir = $request->tanggalLahir;
                $user->umur = $this->countUmur($request->tanggalLahir);
            }

            if ($user->luas_lahan != $request->luasLahan) {
                $user->luas_lahan = $request->luasLahan;
                $user->limit = $this->countLimit($request->luasLahan);
            }

            $user->save();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed update User detail: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'User updated!');
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        try {
            $pinjaman = Pinjaman::where('user_id', $user->id)
                ->where('status', '!=', 'Lunas')
                ->exists();

            if ($pinjaman) {
                throw new \Exception('User masih memiliki pinjaman aktif!');
            }

            $user->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed delete User: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'User deleted!');
    }

    public function countUmur($tanggalLahir)
    {
        $today = new DateTime();
        $diff = $today->diff(new DateTime($tanggalLahir));
        $age = $diff->y;
        return $age;
    }

    public function countLimit($luasLahan)
    {
        return (float) 123123;
    }

}
