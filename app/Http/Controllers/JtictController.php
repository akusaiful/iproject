<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesyuaratRequest;
use App\Models\JenisMesyuarat;
use App\Models\Mesyuarat;
use Illuminate\Http\Request;

class JtictController extends MesyuaratController
{
    const TYPE = JenisMesyuarat::MESYUARAT_JTICT;

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesyuaratRequest $request)
    {
        return redirect()->route('mesyuarat.show', Mesyuarat::create($request->all() + [
            'jenis_mesyuarat_id' => self::TYPE
        ]));
    }
}
