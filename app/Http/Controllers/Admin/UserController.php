<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request)
    {
        $data = $request->all();

        if ($data['password'] !== null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $update = auth()->user()->update($data);

        if (!$update) {
            return redirect()
                ->back()
                ->with('error', 'Falha ao tentar atualizar perfil!');
        }

        return redirect()
            ->back()
            ->with('success', 'Perfil atualizado com sucesso!');
    }
}
