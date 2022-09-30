<form action="provinsi" method="post">
    @csrf
    <div class="row">
        <label for = "kode"> Kode Provinsi</label>
        <input type="text" name="kode">
    </div>
    <div class="row">
        <label for= "name"> Nama Provinsi</label>
        <input type="text" name="name">
    </div>
    <button type="sumbit">Save</button>
</form>