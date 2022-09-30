<form action="/pegawai/update{{$pegawai->id}}" method="post">
@method('PUT')    
@csrf
    
    <div class="row">
        <label for= "name"> Nama Pegawai</label>
        <input type="text" name="name" value=" {{$pegawai->name}}">
    </div>
    <div class="row">
        <label for= "name"> Tempat Lahir</label>
        <input type="text" name="tmpt_lahir" value=" {{$pegawai->tmpt_lahir}}">
    </div>
    <div class="row">
        <label for= "name"> Tanggal Lahir</label>
        <input type="text" name="tgl_lahir" value=" {{$pegawai->tgl_lahir}}">
    </div>
    <div class="row">
        <label for= "name"> Jenis Kelamin</label>
        <input type="text" name="jk" value=" {{$pegawai->jk}}">
    </div>
    <div class="row">
        <label for= "name"> Agama</label>
        <input type="text" name="agama" value=" {{$pegawai->agama}}">
    </div>
    <div class="row">
        <label for= "name"> Alamat</label>
        <input type="text" name="alamat" value=" {{$pegawai->alamat}}">
    </div>
    <div class="row">
        <label for= "name"> Nama Kelurahan</label>
        <select name="kel_id">
            <option selected disabled> Pilih Kelurahan
                @foreach ($kelurahan as $data)
                    <option value="{{$data->id}}" {{$data->id == $pegawai->kel_id ?  'selected' : ''}}>{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <div class="row">
        <label for= "name"> Nama Kecamatan</label>
        <select name="kec_id">
            <option selected disabled> Pilih Kecamatan
                @foreach ($kecamatan as $data)
                    <option value="{{$data->id}}" {{$data->id == $pegawai->kec_id ?  'selected' : ''}}>{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <div class="row">
        <label for= "name"> Nama Provinsi</label>
        <select name="prov_id">
            <option selected disabled> Pilih Provinsi
                @foreach ($provinsi as $data)
                    <option value="{{$data->id}}" {{$data->id == $pegawai->prov_id ?  'selected' : ''}}>{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <input type="submit">
</form>