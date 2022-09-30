<form action="/kelurahan/update{{$kelurahan->id}}" method="post">
@method('PUT')    
@csrf
    <div class="row">
        <label for = "kode"> Kode Kelurahan</label>
        <input type="text" name="kode" value=" {{$kelurahan->kode}}">
    </div>
    <div class="row">
        <label for= "name"> Nama Kelurahan</label>
        <input type="text" name="name" value=" {{$kelurahan->name}}">
    </div>
    <input type="submit">
</form>