<?php

namespace App\Http\Controllers\Master;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = User::findOrFail(Auth::user()->id);
        return view('Admin.profiladmin', [
            'profil' => $profil
        ]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user =  user::findOrFail($id);
        $data = [
            'name' => $request->name,
            'eamil' => $request->email
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return redirect()->back()->with('success', 'Berhasil Update');
    }
}
