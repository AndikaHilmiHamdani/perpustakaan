@extends('users.admin.layout')
@section('content')
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="panel">
        <header class="panel-heading">
          <b>Data Admin</b>

        </header>
        <!-- <div class="box-header"> -->
        <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">
          <div class="box-tools m-b-15">
            <form action="{{route('add-admin.index')}}" method="POST">
              <form action="{{route('add-admin.index')}}" method="GET" role="search">
                <div class="input-group">
                  <input id="term" type='text' class="form-control input-sm pull-right" style="width: 150px;" name='term' placeholder='Cari berdasarkan User ID dan Username' required />
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </form>
          </div>
          <table id="example" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>
                  <center>No </center>
                </th>
                <th>
                  <center>Nama </center>
                </th>
                <th>
                  <center>Jabatan </center>
                </th>
                <th>
                  <center>Tools</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $nourut = 0; ?>
              @foreach($addAdmin as $addAdmin)
              <?php $nourut++; ?>
              <tr>
                <td>{{$nourut}}</td>
                <td><a href=""><span class="fa fa-user"></span>{{$addAdmin->users->name}}</a></td>
                <td><?php //echo $data['jk']; 
                    ?>{{$addAdmin->roles->name}}</td>
                <td>
                  <center>
                    <div id="thanks">
                      <form action="{{route('add-admin.destroy',$addAdmin->model_id)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" disabled><span class="glyphicon glyphicon-trash"></button>
                        <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="{{route('add-admin.edit',$addAdmin->model_id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                      </form>
                    </div>
                  </center>
                </td>
              </tr>
            </tbody>
            @endforeach
        </div>
        </tbody>
        </table>
        <div class="d-flex">
          
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
  <!-- row end -->
</section><!-- /.content -->
@endsection