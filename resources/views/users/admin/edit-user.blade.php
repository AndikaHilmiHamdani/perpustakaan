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
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('admin.update',$users->id)}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ID Anggota</label>
                            <div class="col-sm-8">
                                <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" value="{{$users->id}}" autofocus="on" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">name</label>
                            <div class="col-sm-8">
                                <input name="name" type="text" id="name" class="form-control" placeholder="name" value="{{$users->name}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input name="email" type="email" id="email" class="form-control" placeholder="Ex : 00123" value="{{$users->email}}" required />
                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                            </div>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-sm-8">
                                <input name="kelas" class="form-control" id="kelas" type="text" placeholder="Kelas" value="<?php //echo $data['kelas']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tempat Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input name="ttl" class="form-control" id="ttl" type="text" placeholder="Tempat Tanggal Lahir" value="<?php //echo $data['ttl']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <input name="alamat" class="form-control" id="alamat" type="text" placeholder="Alamat" value="<?php //echo $data['alamat']; ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                            <div class="col-sm-8">
                                <span class="help-block">Silahkan memilih foto untuk update atau mengedit data, tekan tombol batal untuk kembali.</span>
                                <img src="<?php //echo $data['foto']; ?>" height="250" width="250" alt="Foto Anggota" style="margin-bottom: 10px;" /><br />
                                <input name="name_file" id="name_file" type="file" />
                            </div>
                        </div> -->
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="{{route('admin.index')}}" class="btn btn-sm btn-danger">Batal </a>
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