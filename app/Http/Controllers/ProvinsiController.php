<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.add');
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
            'kode'      => 'required|unique:t_provinsi,kode',
            'name'      => 'required',
        ],[
            'kode.required' => 'Kode Provinsi Tidak Boleh Kosong',
            'kode.unique'   => 'Kode Provinsi Sudah Dipakai',
            'name.required' => 'Nama Provinsi Tidak Boleh Kosong',
        ]);

        $data = new Provinsi();
        $data->id =Uuid::uuid4()->getHex();
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->active = 1;
        $data->save();
        return redirect('provinsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi,$id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Provinsi::findOrFail($id);
        $data->kode = $request->kode;
        $data->name = $request->name;
        // dd($data);
        $data->update();
        return redirect()->route('provinsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provinsi $provinsi, $id)
    {
        try{
            $provinsi = Provinsi::find($id);
            $provinsi->delete();
            return redirect('provinsi');
        }catch(\throwable $th){
            return redirect('provinsi');
        }
    }
}
