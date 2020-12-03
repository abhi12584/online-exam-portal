@extends('portal.master')
@section('updatefor')

<!--examshow-->
<br>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            @foreach($data as $datas)
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$datas->title}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
 </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            @endforeach
          </div>
          <!-- ./col -->
          
         </div>
       </div>
     </section>


    <!--examend-->

@endsection
