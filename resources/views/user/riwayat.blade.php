@include('user.includes.header')
@yield('content')

<html>
    <head>
        <title>Riwayat Pengaduan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
<div id="layoutSidenav_content">
    <main>
    <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-11">
                 <div class="card">
                    <div class="card-header">
                    <h1 class="mt-4">Monitoring Pengaduan</h1>
                    <div class="card body">
                        <table class="table table-bordered" >
                        <tr>
                            <th><b>No</b></th>
                            <th><b>Tanggal Aduan</b></th>
                            <th><b>Status</b></th>
                            <td><b>Keterangan</td>
                            <td><b>Balasan</td>
                            <th><b>Foto Balasan</th>

                        </tr>
                        <tr>
                            @php $id=0; @endphp
                            @foreach ($pengaduan as $value)
                            @if ($value->user->id == Auth::user()->id)
                            @php $id++; @endphp
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->status}}</td>
                                <td>{{ $value->keterangan }}</td>
                                <td>{{ $value->balasan }}</td>
                                <td> <img src="{{asset('storage/'.$value->fotobalasan)}}" width="96px"> </td>
                                                   
                                
                                </td>
                            </tr>
                            @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
   
  </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>



@include('user.includes.footer')