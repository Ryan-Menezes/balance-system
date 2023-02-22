<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HistoricController extends Controller
{
    private $totalPage = 2;

    public function index()
    {
        $historics = auth()->user()->historics()->with('userSender')->paginate($this->totalPage);

        return view('admin.historic.index', compact('historics'));
    }
}
