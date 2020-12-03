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
            @if(session('Added'))
            
            <p class="alert alert-success" role="alert">{{session('Added','Exam added Successfully')}}</p>
            
            @endif
            @if(session('Edit'))
            
            <p class="alert alert-success" role="alert">{{session('Edit','Exam edited Successfully')}}</p>
            
            @endif
            @if(session('Delete'))
            
            <p class="alert alert-danger" role="alert">{{session('Delete','Exam Deleted Successfully')}}</p>
            
            @endif
            <h1>Manage Exam</h1>
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
                <h3 class="card-title">Manage Your Exam</h3>
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
                      <th scope="col">Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Exam Date</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @foreach($data as $datas)
                  <tbody>
                    <!--  -->
                    
                    <tr>
                      <th scope="row">{{$datas->id}}</th>
                      <th scope="row">{{$datas->title}}</th>
                      <th scope="row">{{$datas->cat}}</th>
                      <th scope="row" >{{$datas->examdate}}</th>
                      <th scope="row"><input type="checkbox" name="status" checked></th>
                      <th scope="row">
                        <a data-examtitle="{{$datas->title}}" data-examcat="{{$datas->cat}}" data-examdate="{{$datas->examdate}}" data-examid="{{$datas->id}}" type="button" class="btn" data-toggle="modal" data-target="#editexam" style="border: none;background:none;color: green;"><i  class="fas fa-edit" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="Edit"></i></a>
                        <a  data-deletename="{{$datas->title}}" data-deletecat="{{$datas->cat}}" data-deleteid="{{$datas->id}}" class="btn"  data-toggle="modal" data-target="#deletemodal" style="border: none;background:none;color:red;"><i  class="far fa-trash-alt" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Delete"></i></a>
                      </th>
                    </tr>
                    
                    <!--  -->
                  </tbody>
                  @endforeach
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
                    <form action="{{url('admin/exam_delete')}}" method="post">
                      @csrf
                      <table class="table table-hover">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                          </tr>
                        </thead>
                        <tbody>
                          <th scope="row">
                          <input class="form-control" type="text"  id="deleteingid" disabled></th>
                          <th scope="row">
                          <input class="form-control" type="text"  id="deleteingname" disabled></th>
                          <th scope="row">
                          <input class="form-control" type="text"  id="deletecat" disabled></th>
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
            <div class="modal fade" id="editexam" tabindex="-1" role="dialog" aria-labelledby="editcat" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editcat">Exam Edit Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{url('admin/exam_edit')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="" id="exam_id">
                      <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" id="exam_name">
                      </div>

                      <div class="form-group">
                        <div class="form-group">
                        <label>Exam Category</label>
                        <select class="form-control" name="cat" id="exam_cat">
                          @foreach($catdata as $catdatas)
                          <option>{{$catdatas->name}}</option>
                          @endforeach
                        </select>
                      </div>

                      </div>
                      <div class="form-group">
                        <label>Exam Date</label>
                        <input class="form-control" type="date" name="examdate" id="exam_date">
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
                    <form action="{{url('/admin/examsaving')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" id="reset">
                      </div>
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat">
                          <option disabled selected>Select</option>
                          @foreach($catdata as $catdatas)
                          <option>{{$catdatas->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Exam Date</label>
                        <input type="date" name="examdate" class="form-control" id="reset">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button onclick="remove()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Add Now</button>
                    </div>
                    <form>
                    </div>
                  </div>
                </div>
                <!-- /.add Category modal -->
                <script>
                function remove()
                {
                document.getElementById('reset').value='';
                }
                </script>
                
                <br>
                <!--===========================================/.main section==========================================-->
                <!--=========================================/.footer section=========================================-->
                <!-- jQuery -->
                <script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                <!-- AdminLTE App -->
                <script>
                $('#editexam').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var examid = button.data('examid')
                var examtitle = button.data('examtitle')
                var examcat = button.data('examcat')
                var examdate = button.data('examdate')
                
                var editid = button.data('editcatid') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-body #exam_id').val(examid)
                modal.find('.modal-body #exam_name').val(examtitle)
                modal.find('.modal-body #exam_cat').val(examcat)
                modal.find('.modal-body #exam_date').val(editid)
                modal.find('.modal-body #exam_date').val(examdate)
                })
                </script>

                <script>
                $('#deletemodal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var  id = button.data('deleteid')
                var name = button.data('deletename')
                var cat = button.data('deletecat') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.a #deleteingid').val(id)
                modal.find('.a #deleteingname').val(name)
                modal.find('.a #deletecat').val(cat)
                })
                </script>
              </body>
            </html>
            @endsection