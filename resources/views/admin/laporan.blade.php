@include('admin.includes.header')
@yield('content')

<div class="content">
    <div class="card card-info card outline">
        <div class="card-header">
            <h3>Cetak Laporan Pengaduan</h3>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <input type="date" name="tglAwal" id="tglAwal" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <input type="date" name="tglAkhir" id="tglAkhir" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <a href="" 
                onclick="this.href = '/print/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value" 
                target="_blank" class="btn btn-primary col-md-12">Cetak Laporan
                    <i class="fas fa-print"></i>    
                </a>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')