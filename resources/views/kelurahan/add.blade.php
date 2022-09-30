<form action="kelurahan" method="post">
    @csrf
    <div class="row">
        <label for = "kode"> Kode Kelurahan</label>
        <input type="text" name="kode">
    </div>
    <div class="row">
        <label for= "name"> Nama Kelurahan</label>
        <input type="text" name="name">
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
    <button type="sumbit">Save</button>
</form>