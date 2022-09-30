<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::with('kecamatan','kelurahan','provinsi')->get();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $provinsi = Provinsi::all();
        return view('pegawai.add', compact('kecamatan','kelurahan','provinsi'));
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
            'name'          => 'required',
            'tmpt_lahir'    => 'required',
            'tgl_lahir'     => 'required',
            'jk'            => 'required',
            'agama'         => 'required',
            'alamat'        => 'required',
            'kel_id'        => 'required',
            'kec_id'        => 'required',
            'prov_id'       => 'required',
        ],[
            'name.required'         => 'Nama Kecamatan Tidak Boleh Kosong',
            'tmpt_lahir.required'   => 'Tempat Lahir Tidak Boleh Kosong',
            'tgl_lahir.required'    => 'Tanggal Lahir Tidak Boleh Kosong',
            'jk.required'           => 'Jenis Kelamin Tidak Boleh Kosong',
            'agama.required'        => 'Agama Tidak Boleh Kosong',
            'alamat.required'       => 'Alamat Tidak Boleh Kosong',
            'kel_id.required'       => 'Nama KeLurahan Tidak Boleh Kosong',
            'kec_id.required'       => 'Nama Kecamatan Tidak Boleh Kosong',
            'prov_id.required'      => 'Nama Provinsi Tidak Boleh Kosong',
        ]);

        $data = new Pegawai();
        $data->id =Uuid::uuid4()->getHex();
        $data->name = $request->name;
        $data->tmpt_lahir = $request->tmpt_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->kel_id = $request->kel_id;
        $data->kec_id = $request->kec_id;
        $data->prov_id = $request->prov_id;
        // dd($data);
        $data->save();
        return redirect('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai, $id)
    {
        $pegawai = Pegawai::findOrfail($id);
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $provinsi = Provinsi::all();
        
        return view('pegawai.edit',compact('pegawai','kecamatan','kelurahan','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai, $id)
    {
        $data = Pegawai::findOrFail($id);
        $data->name = $request->name;
        $data->tmpt_lahir = $request->tmpt_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->kel_id = $request->kel_id;
        $data->kec_id = $request->kec_id;
        $data->prov_id = $request->prov_id;
        // dd($data);
        $data->update();
        return redirect()->route('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai,$id)
    {
        try{
            $peg = Pegawai::find($id);
            $peg->delete();
            return redirect()->route('pegawai');
        }catch(\throwable $th){
            return redirect()->route('pegawai');
        }
    }
}
