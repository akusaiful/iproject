<?php

namespace App\Http\Controllers;

use App\Http\Requests\MesyuaratRequest;
use App\Models\JenisMesyuarat;
use App\Models\Mesyuarat;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class MesyuaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProvider = new EloquentDataProvider(Mesyuarat::query());
        return view('mesyuarat.grid', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mesyuarat.create')->with('mesyuarat', new Mesyuarat());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MesyuaratRequest $request)
    {
        return redirect()->route('mesyuarat.show', Mesyuarat::create($request->all() + [
            'jenis_mesyuarat_id' => JenisMesyuarat::MESYUARAT_JPICT
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mesyuarat $mesyuarat)
    {
        return view('mesyuarat.show', compact('mesyuarat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesyuarat $mesyuarat)
    {
        return view('mesyuarat.edit', compact('mesyuarat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MesyuaratRequest $request, Mesyuarat $mesyuarat)
    {
        $mesyuarat->update($request->all());
        return redirect()->route('mesyuarat.show', $mesyuarat)->with('toast_success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesyuarat $mesyuarat)
    {
        $mesyuarat->delete();
        return redirect()->route('mesyuarat.index')->with('toast_success', 'Rekod berjaya dihapuskan');
    }
}
