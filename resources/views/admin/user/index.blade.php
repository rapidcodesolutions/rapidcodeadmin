@extends('admin.layouts.master')


@section('maincontent')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">User List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($user as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->created_at}}
                    </td>
                    <td>
                    <button class="btn-primary">EDIT</button>
                    
                 
                  <button class=" btn-danger" type="submit">Delete</button>
                </form>
                    
                    </td>
                  </tr>
                 @endforeach
                  
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection
@push('jsfile')
<script type="text/javascript">
$(document).ready(function () {

    function name() {
        return "ok";
    }
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
  });

    // }
   
 
  
</script>
@endpush