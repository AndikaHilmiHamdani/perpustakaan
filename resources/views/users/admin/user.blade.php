@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Input Anggota</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                <!-- </div> -->
                <div class="panel-body">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('admin.store')}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">name</label>
                            <div class="col-sm-8">
                                <input name="name" type="text" id="name" class="form-control" placeholder="name" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">email</label>
                            <div class="col-sm-8">
                                <input name="email" class="form-control" id="email" type="email" placeholder="email" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">password</label>
                            <div class="col-sm-8">
                                <input name="password" class="form-control" id="password" type="password" placeholder="password" required />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="input-anggota.php" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;"></div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    @endsection