<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pengaduan PDAM Tirta Lestari Tuban</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="container">
        <table border="1" class="table table-bordered" align="center" rules="all">
            <tr>
                <td><center>
                    <img src="{{'/img/logo.png'}}" style="width:40%;"> 
                </td>   
                <td><center><strong>
                    <font size="4" face="times new roman">PERUSAHAAN UMUM DAERAH AIR MINUM</font><br>
                    <font size="4" face="times new roman">"TIRTA LESTARI"</font><br>
                    <font size="4" face="times new roman">KABUPATEN TUBAN</font><br>
                    <font size="3" face="times new roman">Jalan Dr. Wahidin Sudiro H No. 34 Tuban</font><br>
</strong>
                </td>    
                <!-- <td><center>
                    <img src="{{'/img/logo.png'}}" style="width:50%;"> 
                </td>        -->
            </tr>  
        </table><br>

		<h3> <center> <strong><font size="5" face="times new roman">LAPORAN ADUAN PELANGGAN</font></strong><br></h3><br>
		<table class="table table-bordered" align="center" rules="all">
            <tr>
                            <th><b>No</b></th>
                            <th><b>Nama</b></th>
                            <th><b>No Pelanggan</b></th>
                            <th><b>Alamat</b></th>
                            <th><b>Kategori</b></th>
                            <th><b>Tanggal Aduan</b></th>
                            <th><b>Tanggal Eksekusi</b></th>
                            <th><b>Status</b></th>
                        </tr>
                @php $id=0; @endphp

                @foreach($data_aduan as $key => $value)
                @php $id++; @endphp
            <tr>
                            <td>{{$id}}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->nopelanggan }}</td>
                            <td>{{ $value->alamat }}</td>
                            <td>{{ $value->kategori }}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->tgleksekusi}}</td>
                            <td>{{ $value->status }}</td>
            </tr>
            @endforeach
            
        </table>
	</div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
