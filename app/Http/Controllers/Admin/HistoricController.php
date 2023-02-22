<?php

namespace App\Http\Controllers\Admin;

use App\Models\Historic;
use App\Http\Controllers\Controller;

class HistoricController extends Controller
{
    public function index()
    {
        $historics = auth()->user()->historics;

        return view('admin.historic.index', compact('historics'));
    }
}
