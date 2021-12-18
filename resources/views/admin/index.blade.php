@include('admin.includes.header')
@yield('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <div class="container">
    <h3 align = "center">DATA PENGADUAN PELANGGAN</h3><br>
    <table id="example" class="table-responsive table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
                            <th><b>No</b></th>
                            <th><b>Tanggal Aduan</b></th>
                            <th><b>Tanggal Eksekusi</b></th>
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
        </thead>
        <tbody>
                            @php $id=0; @endphp

                            @foreach($pengaduan as $key => $value)
                            @php $id++; @endphp

                            
                            <!-- @php $path = Storage::URL('img/'.$value->path); @endphp -->
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->tgleksekusi}}</td>
                                <td>{{ $value->nopelanggan }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>{{ $value->keterangan }}</td>
                                <td>
                                    <img src="{{asset('storage/'.$value->fotoaduan)}}" width="96px">
                                   
                                </td>
                                <td>
                                    <!-- <p style="background-color:yellow">{{ $value->status }}</p> -->
                                    @if ($value->status == 'SELESAI')
                                        <a href="" class="btn btn-sm btn-success">SELESAI</a>
                                    @else
                                    <a href="" class="btn btn-sm btn-warning">DIAJUKAN KE PETUGAS</a>
                                    @endif
                                </td>
                                <td>{{ $value->balasan }}</td>
                                <td> 
                                    <img src="{{asset('storage/'.$value->fotobalasan)}}" width="96px">
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm" href="{{ route('aduan.edit',$value->id) }}">
                                        <i class="fa fa-edit" br></i>
                                    </a>
                                    <br>
                                    <form action="{{ route('aduan.destroy',$value->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" br></i>
                                        </button>
                                    </form>       
                                </td>
                            </tr>
                            @endforeach
        </tbody>
    </table>
         <!-- <div class="row justify-content-center">
            <div class="col-md-11">
                 <div class="card">
                    <div class="card-header">DAFTAR PENGADUAN</div>
                    <div class="card body">
                    <div class="table-responsive">
                        @csrf
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

                            @foreach($pengaduan as $key => $value)
                            @php $id++; @endphp
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{ $value->nopelanggan }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->alamat }}</td>
                                <td>{{ $value->kategori }}</td>
                                <td>{{ $value->keterangan }}</td>
                                <td>
                                    <img src="{{asset('/img/'.$value->fotoaduan)}}" width="96px">
                                </td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->balasan }}</td>
                                <td>
                                    <img src="{{asset('img/'.$value->fotobalasan)}}" width="96px">
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{route('aduan.edit', $value['id'])}}" role="button">Eksekusi</a>
                                    <a class="btn btn-danger" href="{{route('aduan.destroy', $value['id'])}}" role="button" onclick="return confirm('Apakah Anda yakin mengahapus data aduan ini ?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@include('admin.includes.footer')