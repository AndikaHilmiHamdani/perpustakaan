@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Edit Anggota</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                <?php
                // $query = mysql_query("SELECT * FROM data_anggota WHERE id='$_GET[kd]'");
                // $data  = mysql_fetch_array($query);
                ?>
                <!-- </div> -->
                <div class="panel-body">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('add-admin.update',$addAdmin->model_id)}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                            <div class="col-sm-8">
                                <input name="mode_id" type="text" id="model_id" class="form-control" placeholder="Tidak perlu di isi" value="{{$addAdmin->users->name}}" autofocus="on" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="role_id" name="role_id">
                                    @foreach ($role as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="{{route('add-admin.index')}}" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;"></div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <!-- row end -->
</section><!-- /.content -->
@endsection