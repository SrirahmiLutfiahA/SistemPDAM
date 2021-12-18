@include('user.includes.header')
@yield('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Form Pengaduan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Ajukan Pengaduan Anda Disini!</li>
            </ol>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops! </strong>Terjadi Kesalahan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Pelanggan</strong>
                <input type="text" name="nopelanggan" class="form-control" placeholder="Nomor Pelanggan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
            <div class="form-group">
                <strong>Nama Pelanggan</strong>
                <input type="text" name="nama" class="form-control" placeholder="{{ Auth::user()->name }}">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
            <div class="form-group">
                <strong>Alamat</strong>
                <textarea class="form-control" style="height:80px" name="alamat" ></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <br>
            <div class="form-group row">
                    <label for="kategori" class="col-md-4 col-form-label text-md-right">
                        <strong>Kategori</strong>
                            @error('kategori')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </label>
                    <div class="col-md-6">
                                <select name="kategori" id="kategori" required class="form-control select">
                                    <option value="Air Tidak Menyala">Air Tidak Menyala</option>
                                    <option value="Pipa Bocor">Pipa Bocor</option>
                                    <option value="Air Keruh">Air Keruh</option>
                                </select>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <br>
            <strong>Keterangan</strong>
            <textarea name="keterangan" class="block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >{!! old('description') !!}</textarea>
        </div>
            
            <div class="form-group">
                <br>
            <strong>Bukti Keluhan</strong>
                                <input type="file" class="form-control @error('fotoaduan') is-invalid @enderror" name="fotoaduan">
                            
                                <!-- error message untuk title -->
                                @error('fotoaduan')
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
        CKEDITOR.replace( 'keterangan' );
        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
    </script>

@include('user.includes.footer')