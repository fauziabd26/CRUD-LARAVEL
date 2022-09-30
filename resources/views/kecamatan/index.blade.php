<a href="kecamatan_add">Tambah</a>
<table>
    <thead class="table">
        <tr>
            <th>NO</th>
            <th>Kode</th>
            <th>Nama Kecamatan</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php $no =1;?>
    <tbody>
        @foreach ($kecamatan as $data)
        <tr>
                
            <td>{{$no++}}</td>
            <td>{{$data->kode}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->active}}</td>
            <td>
                <a href="/kecamatan/edit{{$data->id}}">Edit</a>
                <a href="{{route('kec_del', $data->id)}}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>