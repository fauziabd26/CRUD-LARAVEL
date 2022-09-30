<form action="/kecamatan/update{{$kecamatan->id}}" method="post">
@method('PUT')    
@csrf
    <div class="row">
        <label for = "kode"> Kode Kecamatan</label>
        <input type="text" name="kode" value=" {{$kecamatan->kode}}">
    </div>
    <div class="row">
        <label for= "name"> Nama Kecamatan</label>
        <input type="text" name="name" value=" {{$kecamatan->name}}">
    </div>
    <input type="submit">
</form>