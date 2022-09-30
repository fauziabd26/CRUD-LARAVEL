<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index',compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode'      => 'required|unique:t_kecamatan,kode',
            'name'      => 'required',
        ],[
            'kode.required' => 'Kode Kecamatan Tidak Boleh Kosong',
            'kode.unique'   => 'Kode Kecamatan Sudah Dipakai',
            'name.required' => 'Nama Kecamatan Tidak Boleh Kosong',
        ]);

        $data = new Kecamatan();
        $data->id =Uuid::uuid4()->getHex();
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->active = 1;
        $data->save();
        return redirect('kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan,$id)
    {
        $kecamatan = Kecamatan::findOrfail($id);
        return view('kecamatan.edit',compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kecamatan::findOrFail($id);
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->update();
        return redirect()->route('kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan, $id)
    {
        try{
            $kec = Kecamatan::find($id);
            $kec->delete();
            return redirect('kecamatan');
        }catch(\throwable $th){
            return redirect('kecamatan');
        }
    }
}
