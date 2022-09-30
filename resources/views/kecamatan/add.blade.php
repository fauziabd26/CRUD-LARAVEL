<form action="kecamatan" method="post">
    @csrf
    <div class="row">
        <label for = "kode"> Kode Kecamatan</label>
        <input type="text" name="kode">
    </div>
    <div class="row">
        <label for= "name"> Nama Kecamatan</label>
        <input type="text" name="name">
    </div>
    <button type="sumbit">Save</button>
</form>