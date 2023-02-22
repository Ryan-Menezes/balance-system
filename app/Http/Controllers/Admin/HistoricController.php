<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Historic;

class HistoricController extends Controller
{
    private $totalPage = 2;

    public function index(Request $request, Historic $historic)
    {
        $historics = auth()->user()->historics()->with('userSender')->paginate($this->totalPage);
        $types = $historic->type();

        return view('admin.historic.index', compact('historics', 'types'));
    }
}
