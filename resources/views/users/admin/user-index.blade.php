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
            <form action="{{route('admin.index')}}" method="POST">
              <form action="{{route('admin.index')}}" method="GET" role="search">
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
            @foreach($users as $user)
              <tbody>
                <tr>
                  <td>{{$user->id}}</td>
                  <td><a href="detail-anggota.php?hal=edit&kd={{$user->id}}"><span class="fa fa-user"></span>{{$user->name}}</a></td>
                  <td><?php //echo $data['jk']; ?>{{$user->email}}</td>
                  <td><?php //echo $data['kelas']; ?></td>
                  <td><?php //echo $data['ttl']; ?></td>
                  <td><?php //echo $data['alamat']; ?></td>
                  <td>
                    <center>
                      <div id="thanks">
                      <a onclick="return confirm ('Yakin hapus <?php //echo $data['nama']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Anggota" href="hapus-anggota.php?hal=hapus&kd=<?php //echo $data['id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                      <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="edit-anggota.php?hal=edit&kd=<?php //echo $data['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                      </div>
                    </center>
                  </td>
                </tr>
              </tbody>
              @endforeach
        </div>
      <?php
            //}
      ?>
      <!-- <div class="text-right" style="margin-top: 10px;">
        <a href="{{route('admin.index')}}" class="btn btn-sm btn-info">Refresh Anggota <i class="fa fa-refresh"></i></a> 
        <a href="{{route('admin.create')}}" class="btn btn-sm btn-warning">Tambah Anggota <i class="fa fa-arrow-circle-right"></i></a>
      </div> -->
      </tbody>
      </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
  <!-- row end -->
</section><!-- /.content -->
@endsection