@include('admin.includes.header')
@yield('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <div class="container">
    <h3 align = "center">DATA PELANGGAN</h3><br>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
                <tr>
                            <th><b>No</b></th>
                            <th><b>Nama</b></th>
                            <th><b>Email</b></th>
                            
                </tr>
        </thead>
        <tbody>
                           @php $id=0; @endphp

                           @foreach($users as $key => $value)
                           @php $id++; @endphp
                           
                           <tr>
                              <td>{{$id}}</td>
                              <td>{{$value->name}}</td>
                              <td>{{$value->email}}</td>

                              </tr>
                            @endforeach
                            
        </tbody>
    </table>
      
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