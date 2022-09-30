<a href="pegawai_add">Tambah</a>
<table>
    <thead class="table">
        <tr>
            <th>NO</th>
            <th>Nama Pegawai</th>
            <th>Tempat Lahir</th>
            <th>Tgl Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Nama Kelurahan</th>
            <th>Nama Kecamatan</th>
            <th>Nama Provinsi</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php $no =1;?>
    <tbody>
        @foreach ($pegawai as $data)
        <tr>
                
            <td>{{$no++}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->tmpt_lahir}}</td>
            <td>{{$data->tgl_lahir}}</td>
            <td>{{$data->jk}}</td>
            <td>{{$data->agama}}</td>
            <td>{{$data->alamat}}</td>
            <td>{{$data->kelurahan->name}}</td>
            <td>{{$data->kecamatan->name}}</td>
            <td>{{$data->provinsi->name}}</td>
            <td>
                <a href="/pegawai/edit{{$data->id}}">Edit</a>
                <a href="{{route('kel_del', $data->id)}}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>