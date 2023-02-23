<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index');
    }

    public function profileUpdate(UpdateProfileFormRequest $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if ($data['password'] !== null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $data['image'] = $user->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = $user->id . '-' . Str::kebab($user->name) . '-' . time();

            if ($user->image) {
                $name = $user->image;
            }

            $extension = $request->image->extension();
            $filename = "{$name}.{$extension}";

            $upload = $request->image->storeAs('users', $filename);

            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao tentar atualizar à imagem do perfil!');
            }

            $data['image'] = $filename;
        }

        $update = $user->update($data);

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
