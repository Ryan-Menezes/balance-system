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
        dd('OK');
    }
}
