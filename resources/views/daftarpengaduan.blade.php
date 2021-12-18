@section('content')
    <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-11">
                 <div class="card">
                    <div class="card-header">DAFTAR PENGADUAN</div>
                    <div class="card body">
                        <table class="table table-bordered" >
                        <tr>
                            <th><b>No</b></th>
                            <th><b>No Pelanggan</b></th>
                            <th><b>Nama</b></th>
                            <th><b>Alamat</b></th>
                            <th><b>Kategori</b></th>
                            <th><b>Keterangan</b></th>
                            <th><b>Foto</b></th>
                            <th><b>Status</b></th>
                            <th><b>Balasan</b></th>
                            <th><b>Foto Balasan</b></th>
                            <th><b>Action</b></th>
                        </tr>
                        <tr>
                            @php $id=0; @endphp
                            @foreach($data_menu as $value)
                            @php $id++; @endphp
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{ $value->nopelanggan }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>
                                    <img src="{{asset('img/'.$value->fotoaduan)}}" width="96px">
                                </td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->balasan }}</td>
                                <td>
                                    <img src="{{asset('img/'.$value->fotobalasan)}}" width="96px">
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection