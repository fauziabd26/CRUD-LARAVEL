<a href="kelurahan_add">Tambah</a>
<table>
    <thead class="table">
        <tr>
            <th>NO</th>
            <th>Kode</th>
            <th>Nama Kelurahan</th>
            <th>Nama Kecamatan</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php $no =1;?>
    <tbody>
        @foreach ($kelurahan as $data)
        <tr>
                
            <td>{{$no++}}</td>
            <td>{{$data->kode}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->kecamatan->name}}</td>
            <td>{{$data->active}}</td>
            <td>
                <a href="/kelurahan/edit{{$data->id}}">Edit</a>
                <a href="{{route('kel_del', $data->id)}}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>