<?php

namespace App\Http\Controllers;

use App\Models\JenisMesyuarat;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class JenisMesyuaratController extends Controller
{
    public function grid()
    {
        $dataProvider = new EloquentDataProvider(JenisMesyuarat::query());
        return view('jenismesyuarat.grid', [
            'dataProvider' => $dataProvider
        ]);
    }
}
