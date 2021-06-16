@extends('users.admin.layout')
@section('content')
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="panel">
        <header class="panel-heading">
          <b>Data Anggota</b>

        </header>
        <!-- <div class="box-header"> -->
        <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">
          <div class="box-tools m-b-15">
            <form action="/admin/search" method="GET" role="search">
              <div class="input-group">
                <input id="term" type='text' value="{{ old('cari') }}" class="form-control input-sm pull-right" style="width: 150px;" name='search' placeholder='Cari berdasarkan User ID dan Username' required />
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default" value="CARI" type="submit"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
          <table id="example" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>
                  <center>No </center>
                </th>
                <th>
                  <center>Id </center>
                </th>
                <th>
                  <center>Nama </center>
                </th>
                <th>
                  <center>email</center>
                </th>
                <th>
                  <center>Kelas </center>
                </th>
                <th>
                  <center>Tempat Lahir </center>
                </th>
                <th>
                  <center>Alamat </center>
                </th>
                <th>
                  <center>Tools</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php $nourut = 0; ?>
              @foreach($users as $user)
              <?php $nourut++; ?>
              <tr>
                <td>{{$nourut}}</td>
                <td>{{$user->id}}</td>
                <td><a href="{{route('admin.show',$user->id)}}"><span class="fa fa-user"></span>{{$user->name}}</a></td>
                <td><?php //echo $data['jk']; 
                    ?>{{$user->email}}</td>
                <td><?php //echo $data['kelas']; 
                    ?></td>
                <td><?php //echo $data['ttl']; 
                    ?></td>
                <td><?php //echo $data['alamat']; 
                    ?></td>
                <td>
                  <center>
                    <div id="thanks">
                      <form action="{{route('admin.destroy',$user->id)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit"><span class="glyphicon glyphicon-trash"></button>
                        <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="{{route('admin.edit',$user->id)}}"><span class="glyphicon glyphicon-edit"></span></a>
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
          {{ $users->appends(request()->term)->links('pagination::bootstrap-4') }}
        </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
  <!-- row end -->
</section><!-- /.content -->
@endsection