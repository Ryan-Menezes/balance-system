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
        $data = $request->except('_token');
        $historics = $historic->search($data, $this->totalPage);
        $types = $historic->type();

        return view('admin.historic.index', compact('historics', 'types', 'data'));
    }
}
