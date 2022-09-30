<form action="/provinsi/update{{$provinsi->id}}" method="post">
@method('PUT')    
@csrf
    <div class="row">
        <label for = "kode"> Kode Provinsi</label>
        <input type="text" name="kode" value=" {{$provinsi->kode}}">
    </div>
    <div class="row">
        <label for= "name"> Nama Provinsi</label>
        <input type="text" name="name" value=" {{$provinsi->name}}">
    </div>
    <input type="submit">
</form>