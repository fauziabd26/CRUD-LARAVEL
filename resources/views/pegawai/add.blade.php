<form action="pegawai" method="post">
    @csrf
    <div class="row">
        <label for= "name"> Nama Pegawai</label>
        <input type="text" name="name">
    </div>
    <div class="row">
        <label for= "name"> Tempat Lahir</label>
        <input type="text" name="tmpt_lahir">
    </div>
    <div class="row">
        <label for= "name"> Tanggal Lahir</label>
        <input type="date" name="tgl_lahir">
    </div>
    <div class="row">
        <label for= "name"> Jenis Kelamin</label>
        <input type="text" name="jk">
    </div>
    <div class="row">
        <label for= "name"> Agama</label>
        <input type="text" name="agama">
    </div>
    <div class="row">
        <label for= "name"> Alamat</label>
        <input type="text" name="alamat">
    </div>
    <div class="row">
        <label for= "name"> Nama Kelurahan</label>
        <select name="kel_id">
            <option selected disabled> Pilih Kelurahan
                @foreach ($kelurahan as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <div class="row">
        <label for= "name"> Nama Kecamatan</label>
        <select name="kec_id">
            <option selected disabled> Pilih Kecamatan
                @foreach ($kecamatan as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <div class="row">
        <label for= "name"> Nama Provinsi</label>
        <select name="prov_id">
            <option selected disabled> Pilih Provinsi
                @foreach ($provinsi as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>                    
                @endforeach
            </option>
        </select>
    </div>
    <button type="sumbit">Save</button>
</form>