<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HistoricController extends Controller
{
    public function index()
    {
        $historics = auth()->user()->historics()->with('userSender')->get();

        return view('admin.historic.index', compact('historics'));
    }
}
