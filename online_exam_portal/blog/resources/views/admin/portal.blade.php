@extends('admin.master')
@section('manage_exam')
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="htmltps://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('backend/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- pace-progress -->
    <!--<link rel="stylesheet" href="plugins/pace-progress/themes/black/pace-theme-flat-top.css">-->
  </head>
  <body class="hold-transition sidebar-mini pace-primary">
    <!--========================================wrapper main section=============================================-->
    <!-- Content Wrapper. Contains page content -->
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if(session('addcat'))
            
            <p class="alert alert-success" role="alert">{{session('addcat','Category Add Successfully')}}</p>
            
            @endif
            @if(session('editcat'))
            
            <p class="alert alert-success" role="alert">{{session('editcat','Category Edit Successfully')}}</p>
            
            @endif
            @if(session('deletecat'))
            
            <p class="alert alert-danger" role="alert">{{session('deletecat','Category Edit Successfully')}}</p>
            
            @endif
            <h1>Category</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div> -->
          
          <div class="ml-auto mr-2">
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addcat">Add Now</button>
          </div>
        </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Password</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Category</th>
                      <th scope="col">Exam</th>
                      <th scope="col" style="width: 80px;">Status</th>
                      <th scope="col" style="width: 125px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!--  -->
                    <tr>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row"></th>
                      <th scope="row" style="text-align-last: center;"><input type="checkbox" name="status" checked></th>
                      <th scope="row">
                        <!-- <a href="{{url('/')}}" style="padding:inherit;color: #0779f9;"><i  class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="View"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                        <a data-editcatdata="" data-editcatid="" type="button" class="btn" data-toggle="modal" data-target="#editcat" style="border: none;background:none;color: green;"><i  class="fas fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a  data-deletename="" data-deleteid="" class="btn"  data-toggle="modal" data-target="#deletemodal" style="border: none;background:none;color:red;"><i  class="far fa-trash-alt" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Delete"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      </th>
                    </tr>
                    <!--  -->
                  </tbody>
                </table>
              </div>
              <!-- /.card -->
            </section>
            <!-- /.content -->
            <!-- delete Category modal -->
            <!-- Modal -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodal" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deletemodal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="a">
                    <form action="{{url('admin/delete')}}" method="post">
                      @csrf
                      <table class="table table-hover">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category Name</th>
                          </tr>
                        </thead>
                        <tbody>
                          <th scope="row">
                          <input class="form-control" type="text" name="name" id="deleteingid" disabled></th>
                          <th scope="row">
                          <input class="form-control" type="text" name="name" id="deleteingname" disabled></th>
                        </tbody>
                      </table>
                      <input type="hidden" name="id" value="" id="deleteingid">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Are You sure!</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.delete Category modal -->
            <!-- edit Category modal -->
            <!-- Modal -->
            <div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="editcat" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editcat">Category Edit Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{url('admin/editcat')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="" id="editcatid">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" type="text" name="name" id="catname">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.edit Category modal -->
            
            <!-- add Category modal -->
            <!-- Modal -->
            <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="addcat" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addcat">Category Add Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{url('/admin/catsaving')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" id="catname">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="text" name="name" id="catname">
                      </div>
                      
                      <div class="form-group">
                        <label>Mobile</label>
                        <input class="form-control" type="text" name="name" id="catname">
                      </div>
                      <div class="form-group">
                        <label>Exam</label>
                        <input class="form-control" type="text" name="name" id="catname">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button onclick="document.getElementById('reset').value=''" type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                    <form>
                    </div>
                  </div>
                </div>
                <!-- /.add Category modal -->
                
                <br>
                <!--===========================================/.main section==========================================-->
                <!--=========================================/.footer section=========================================-->
                <!-- jQuery -->
                <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <!-- AdminLTE App -->
                <script>
                
                $('#editcat').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var editing = button.data('editcatdata')
                var editid = button.data('editcatid') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-body #catname').val(editing)
                modal.find('.modal-body #editcatid').val(editid)
                })
                </script>
                <script>
                
                $('#deletemodal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var  id = button.data('deleteid')
                var name = button.data('deletename') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.a #deleteingid').val(id)
                modal.find('.a #deleteingname').val(name)
                })
                </script>
              </body>
            </html>
            @endsection