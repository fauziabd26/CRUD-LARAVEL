<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index',compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.add', compact('kecamatan'));
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

        $data = new Kelurahan();
        $data->id =Uuid::uuid4()->getHex();
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->kec_id = $request->kec_id;
        $data->active = 1;
        // dd($data);
        $data->save();
        return redirect('kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelurahan $kelurahan,$id)
    {
        $kelurahan = Kelurahan::findOrfail($id);
        return view('kelurahan.edit',compact('kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelurahan $kelurahan,$id)
    {
        $data = Kelurahan::findOrFail($id);
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->update();
        return redirect()->route('kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelurahan $kelurahan,$id)
    {
        try{
            $kel = Kelurahan::find($id);
            $kel->delete();
            return redirect()->route('kelurahan');
        }catch(\throwable $th){
            return redirect()->route('kelurahan');
        }
    }
}
