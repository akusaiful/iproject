<?php

namespace App\Http\Controllers;

use App\Models\JenisPermohonan;
use App\Models\Mohon;
use Illuminate\Http\Request;

class MohonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('mohon.index', [
            'senaraiPermohonan' => Mohon::paginate(config('paginator.record_per_page'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mohon $mohon)
    {
        return view('mohon.show', compact('mohon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mohon $mohon)
    {
        return view('mohon.edit')
            ->with('mohon', $mohon)
            ->with('jenisPermohonan', JenisPermohonan::all());           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mohon $mohon)
    {
        // validation
        $request->validate([
            'tajuk' => 'required|min:10|max:250',
            'tujuan' => 'required',
            'objektif' => 'required',
            'latar_belakang' => 'required'
        ], [
            'required' => 'Medan :attribute diperlukan',
            'latar_belakang.required' => 'Latar belakang sangat2 lah diperlukan, sila lah isi',
            'min' => 'Alahai tulis la panjang sikit'
        ]);

        // save
        $mohon->update($request->all());

        return redirect()->route('mohon.show', $mohon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mohon $mohon)
    {
        $mohon->delete();
        return redirect()->back()->with('success', 'Rekod berjaya dihapuskan');
    }
}
