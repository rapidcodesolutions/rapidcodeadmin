@extends('admin.layouts.master')

@section('button')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add Team</button>
@endsection
@section('maincontent')
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{ route('saveteam') }}" enctype="multipart/form-data">
          @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="service" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="service" name="name" placeholder="Name" required>
                    </div>
                  </div>                
                  <div class="form-group row">
                    <label for="designation" class="col-sm-2 col-form-label">Position</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="designation" name="designation" placeholder="Position" required>
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="designation" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" name="image" placeholder="Name" required>
                    </div>
                  </div>   
                  <div class="form-group row">
                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="link" name="link" placeholder="Link" required>
                    </div>
                  </div>                
                </div>
                <!-- /.card-body -->
                <div>
                  <button type="submit" style="margin-left: 15px;" class="btn btn-info toastrDefaultSuccess" >Save</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Team List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Created Date</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($team as $data)
                  <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->designation}}</td>
                    <td>{{$data->link}}</td>
                    <td><img width="150" height="120" src="{{url('/public/images/',$data->image)}}" alt=""></td>
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
  $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
  });
  if($("#service").val()!==""){
   
      toastr.success('Successfully Created!')
    
                  
            }
    // if(!empty($("#category").val())) {
     

   
  });
    // }
   
 
  
</script>
@endpush