@include('admin.includes.header')
@yield('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Eksekusi Keluhan Pelanggan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Balasan Keluhan</li>
            </ol>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>Terjadi Kesalahan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('aduan.update', $data_aduan['id']) }}"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')
     <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 

        <div class="form-group">
                <strong>Tanggal Eksekusi</strong>
                <input type="datetime-local" name="tgleksekusi" id="tgleksekusi" class="form-control"/>
        </div>

        <div class="form-group">
        <br>
            <strong>Status</strong>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror   
                    <div class="col-md-6">
                                <select name="status" id="status" required class="form-control select">
                                    <!-- <option value="BELUM DIPROSES">BELUM DIPROSES</option> -->
                                    <option value="DIAJUKAN KE PETUGAS">DIAJUKAN KE PETUGAS</option>
                                    <option value="SELESAI">SELESAI</option>
                                </select>
                    </div>
            </div>
            
        <div class="form-group">
            <br>
            <strong>Balasan</strong>
            <textarea name="balasan" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >{!! old('description') !!}</textarea>
        </div>
            
            <div class="form-group">
                <br>
            <strong>Bukti Proses Keluhan</strong>
                                <input type="file" class="form-control @error('fotobalasan') is-invalid @enderror" name="fotobalasan">
                            
                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror                         

                                <br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'balasan' );
        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        
</script>


@include('admin.includes.footer')